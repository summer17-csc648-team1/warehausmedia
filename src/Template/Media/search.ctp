<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

$this->layout = 'default';
$title = 'Search Results';

$categories = TableRegistry::get('Categories')->find('all');
foreach ($categories as $category) {
  $category_array[$category->CategoryID] = $category->Category;
}
$this->set(compact('category_array'))
?>

<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <?= $this->Html->css('home.css') ?>
    </head>

    <body>
        <div class="content">
            <h2>Search Results</h2>
            <?php if(empty($results)){?>
                <p>
                  No results found with that query.
                </p>
            <?php }?>
            <?php foreach ($results as $item): ?>
            <table>
                <tr>
                    <td>
                        <a href="/media/detail/<?php echo $item['MediaID'];?>">
                            <img src="<?php echo $this->request->webroot.$item['FileLocation'];?>"/>
                        </a>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <h3><?php echo $item['Title'];?></h3>
                            </tr>
                            <tr>
                                <a href="/media/detail/<?php echo $item['MediaID'];?>"><button>Details</button></a>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <?php endforeach; ?>
            <!-- <?php debug($results); ?> -->
        </div>
    </body>
</html>
