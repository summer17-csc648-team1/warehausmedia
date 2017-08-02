<?php
/**
 * Created by PhpStorm.
 * User: raymondlf
 * Date: 7/31/17
 * Time: 3:42 PM
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
$this->layout = false;
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: black;
        }
        li a {
            float: right;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        li a:hover:not(.active) {
            color: white;
            background-color: black;
        }
        img {
            width:600px;
        }
        h3 {
            margin-left: 50px;
            margin-top: 50px;
            margin:0;
            padding:0;
        }
        table {
            margin:0;
            padding:0;
        }
        th, td {
            margin:0;
            padding:0;
        }
        .logo {
            float: left;
            position: relative;
            margin: 0;
            padding: 0;
            diaplay: block;
            color: white;
            background-color: red;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .active {
            color: white;
            background-color: red;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="site.css">
</head>

<body class="detail">



<ul>

    <li><a class="logo" href="home.ctp">WAREHAUS</a></li>
    <li><a href="register.ctp">REGISTER</a></li>
    <li><a href="login.ctp">LOGIN</a></li>
    <li><a href="upload.ctp">UPLOAD</a></li>
    <li><a href="contact.ctp">CONTACT</a></li>
    <li><a href="about.ctp">ABOUT US</a></li>

</ul>

<div style="margin-left: 5%; margin-top: 5%">
    <div>
        <div style="float: left;">
            <img id="preview" src="<?php echo $this->request->webroot; ?>img/testImg.jpg" >
        </div>

        <div style="float: left; margin-left: 10%;">
            <table>

                <?php
                if(empty($detail)){
                    echo '$detail is empty';
                }
                else{
                    debug($detail);
                }

                ?>

                <!--
                <tr>
                    <h1 id="title">Test Image</h1>
                </tr>
                <tr>
                    <p id="category"> <b>Category: </b> <?php echo "Games";?></p>
                </tr>
                <tr>
                    <p id="price"><b>Price: </b> <?php echo "$1.00"; ?></p>
                </tr>
                <tr>
                    <p id="owner"><b>Owner: </b> <?php echo "AUserName"?></p>
                    <a href="#"><button >Contact Owner</button></a>
                </tr>
                -->
            </table>

        </div>
    </div>
    <div style="clear: both;">
        <hr>
        <h3>Description</h3>
        <p id="description"><?php echo "Here is the description of the picture provided by the seller." ?></p>
    </div>
</div>

</body>
</html>