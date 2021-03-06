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
        <title><?= $title ?></title>
        <?= $this->Html->css('home.css') ?>
    </head>

    <body>
        <div class="container" text-align="center">
            <h1> WAREHAUS</h1>
            <div style="width: 100%; overflow: hidden;">
                <div style="text-align: center; width: 90%; padding: 0 0 0 10%; margin: 0; height: 25px; overflow: hidden;">
                    <p>CSC 648/848 Team 1</p>
                    <p>(For Demonstration Purposes only)</p>
                </div>
            </div>
        </div>

        <div style="padding: 100px; width: 100%; align: center;" >
            <h3>Search</h3>
            <?php echo $this->Form->create(null, [
                'url' => ['controller' => 'Media', 'action' => 'search']
            ]); ?>
            <span style="width: 25%; float: left; display: inline-block;"><?php echo $this->Form->input('Media.CategoryID', array(
                  'label' => 'Category',
                  'type' => 'select',
                  'options' => h($category_array),
                  'empty' => false
            )); ?></span>
            <span style="width: 75%; display: inline-block;"><?php echo $this->Form->input('search_input', array(
                  'label' => 'Title'
            )); ?>
            <div style="float: right;">
              <?php echo $this->Form->button('Search'); ?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </body>
</html>
