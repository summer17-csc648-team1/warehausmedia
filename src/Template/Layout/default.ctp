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

?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title') ?></title>

        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('base.css') ?>
        <?= $this->Html->css('cake.css') ?>
        <?= $this->Html->css('home.css') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>

    <body>
        <nav class="top-bar expanded" data-topbar role="navigation">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h1><a href="/pages/home">WAREHAUS</a></h1>
                </li>
            </ul>

            <div class="top-bar-section">
                <ul class="right">
                    <li><a href="/media/add">UPLOAD</a></li>
                    <?php if($this->request->session()->read('Auth')) { ?>
                        <li><a href="/users/logout">LOGOUT</a></li>
                    <?php }
                    else{ ?>
                        <li><a href="/users/add">REGISTER</a></li>
                        <li><a href="/users/login">LOGIN</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <div class="container clearfix">
            <?= $this->fetch('content') ?>
        </div>

        <footer></footer>
    </body>
</html>
