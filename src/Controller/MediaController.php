<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Media Controller
 *
 * @property \App\Model\Table\MediaTable $Media
 *
 * @method \App\Model\Entity\Media[] paginate($object = null, array $settings = [])
 */
class MediaController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function initialize() {
        parent::initialize();
        $this->Auth->allow('index', 'search', 'view');
    }

    public function index() {
        $media = $this->paginate($this->Media);

        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    /**
     * View method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null) {
        $media = $this->Media->get($id, [
            'contain' => []
        ]);

        $this->set('media', $media);
        $this->set('_serialize', ['media']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Auth->user();
        $this->set('userid', $user['UserID']);

        $category_array = array();
        //get Categories
        $categories = TableRegistry::get('Categories')->find('all');
        foreach ($categories as $category) {
            $category_array[$category->CategoryID] = $category->Category;
        }
        $this->set(compact('category_array'));

        $media = $this->Media->newEntity();

        if ($this->request->is('post')) {
            $media = $this->Media->patchEntity($media, $this->request->getData());
            $destination = 'Images/'; //webroot folder
            $filename = $media['upload']['name'];
            $filetype = $media['upload']['type'];
            if ($filetype == 'image/jpg' || $filetype == 'image/jpeg' || $filetype == 'image/png') {
                if (move_uploaded_file($media['upload']['tmp_name'], WWW_ROOT . $destination . $filename)) {
                    $media->FileLocation = 'Images/' . $filename; //store reference in db
                    $media->ThumbnailLocation = 'Images/' . 'Tb-' . $filename;
                    $media->Format = explode("/", $filetype)[1];
                    $this->createThumbnail(WWW_ROOT . $media->FileLocation, WWW_ROOT . $media->ThumbnailLocation, 180, 180);
                }
                if ($this->Media->save($media)) {
                    $this->Flash->success(__('The media has been saved.'));
                    return $this->redirect($this->Auth->redirectUrl("/media/detail/" . $media->MediaID));
                } else {
                    $this->Flash->error(__('The media could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('Sorry, we only support .jpg and .png file types'));
            }
        }
        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $media = $this->Media->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $media = $this->Media->patchEntity($media, $this->request->getData());
            if ($this->Media->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect();
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $media = $this->Media->get($id);
        if ($this->Media->delete($media)) {
            $this->Flash->success(__('The media has been deleted.'));
        } else {
            $this->Flash->error(__('The media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //This code was pulled from stackoverflow by Josh. The following method resizes the photo before upload.
    function createThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $background = false) {
        list($original_width, $original_height, $original_type) = getimagesize($filepath);
        if ($original_width > $original_height) {
            $new_width = $thumbnail_width;
            $new_height = intval($original_height * $new_width / $original_width);
        } else {
            $new_height = $thumbnail_height;
            $new_width = intval($original_width * $new_height / $original_height);
        }
        $dest_x = intval(($thumbnail_width - $new_width) / 2);
        $dest_y = intval(($thumbnail_height - $new_height) / 2);

        if ($original_type === 1) {
            $imgt = "ImageGIF";
            $imgcreatefrom = "ImageCreateFromGIF";
        } else if ($original_type === 2) {
            $imgt = "ImageJPEG";
            $imgcreatefrom = "ImageCreateFromJPEG";
        } else if ($original_type === 3) {
            $imgt = "ImagePNG";
            $imgcreatefrom = "ImageCreateFromPNG";
        } else {
            return false;
        }

        $old_image = $imgcreatefrom($filepath);
        $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height); // creates new image, but with a black background
        // figuring out the color for the background
        if (is_array($background) && count($background) === 3) {
            list($red, $green, $blue) = $background;
            $color = imagecolorallocate($new_image, $red, $green, $blue);
            imagefill($new_image, 0, 0, $color);
            // apply transparent background only if is a png image
        } else if ($background === 'transparent' && $original_type === 3) {
            imagesavealpha($new_image, TRUE);
            $color = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
            imagefill($new_image, 0, 0, $color);
        }

        imagecopyresampled($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
        $imgt($new_image, $thumbpath);
        return file_exists($thumbpath);
    }

    public function getDetail(){
        $param = $this->request->getParam('pass');
        $id = $param[(int) 0];

        $detail = $this->Media->find('byID', [
            'id' => $id
        ]);

        $this->set(['detail' => $detail]);
    }

    public function search(){
        $data = $this->request->getData();
        $category = $data['Media']['CategoryID'];
        $search_input = $data['search_input'];

        $results = $this->Media->find('byTitle', [
            'category' => $category,
            'search_input' => $search_input
        ]);

        $this->set('results', $results->toArray());
    }
}
