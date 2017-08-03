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
$title = 'Home';
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
  <title>
    <?= $title ?>
  </title>

  <?= $this->Html->css('home.css') ?>
</head>

<header>
  <div>
    <h1>CSC 648 | Team One</h1>
  </div>
  <div>
    <h2>For demonstration purposes only</h2>
  </div>
</header>

<body>
  <div class="content">
    <h3>Search by Title</h3>
    <?= $this->Form->create(); ?>
    <?= $this->Form->input('category', array(
          'label' => 'Category',
          'type' => 'select',
          'options' => h($category_array),
          'empty' => false
        )); ?>
    <?= $this->Form->input('search_input', array(
          'label' => 'Title'
    )); ?>
    <?= $this->Form->button('Search',  array(
            'formaction' => Router::url(
              array('controller' => 'Media',
                    'action' => 'searchByTitle',
                    'category' => 'category',
                    'title' => 'search_input')))); ?>
    <?= $this->Form->end(); ?>
  </div>
</body>
</html>
