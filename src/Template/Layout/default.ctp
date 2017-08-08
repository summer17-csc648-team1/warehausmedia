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
  <title><?= $this->fetch('title') ?></title>
  <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

  <nav class="top-bar expanded" data-topbar role="navigation">
          <?php  $homepage = "/pages/home"; ?>
          <?php  $currpage = $_SERVER['REQUEST_URI']; ?>
          <?php  if($homepage == $currpage){ ?>

          <?php  }
          else{ ?>
            <ul class="title-area large-3 medium-4 columns">
            <li class="name">
            <h1><a href="/pages/home">WAREHAUS</a></h1>
            </li>
            </ul>
          <?php  }?>



        <div class="top-bar-section">
        <ul class="right">
          <li><a href="/pages/about">ABOUT US</a></li>
          <li><a href="/pages/message">MESSAGE</a></li>
          <li><a href="/media/add">UPLOAD</a></li>
            <?php if($this->request->session()->read('Auth')) { ?>
                <li><a href="/users/logout">LOGOUT</a></li>
            <?php }

            else{ ?>
                <li><a href="/pages/register">REGISTER</a></li>
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
