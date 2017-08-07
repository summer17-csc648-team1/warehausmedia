<?php

use Cake\Routing\Router;

$this->layout = 'default';
$this->Html->css('home.css')
?>

<!DOCTYPE html>
<html>
<head>
</head>

<body class="detail">

<?php foreach ($detail as $target): ?>
<div class="content">
    <table>
        <tr id="image_and_detail">
            <td><img id="preview" src="<?php echo $this->request->webroot.$target['FileLocation']?>"></td>
            <td>
                <div style="float: left; margin-left: 10%;">
                    <table>
                        <tr>
                            <h1 id="title"><?php echo $target['Title']?></h1>
                        </tr>
                        <tr>
                            <p id="category"> <b>Category: </b> <?php echo $target['_matchingData']['Categories']['Category'];?></p>
                        </tr>
                        <tr>
                            <p id="price"><b>Price: </b> <?php echo '$'.$target['Price']; ?></p>
                        </tr>
                        <tr>
                            <p id="owner"><b>Owner: </b> <?php echo $target['_matchingData']['Users']['Username']?></p>
                            <a href="<?php echo Router::fullBaseUrl()?>/messages/sendToUser/<?php echo $target['MediaID'];?>/<?php echo $target['user_id'];?>"><button >Contact Owner</button></a>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        <tr id="description">
            <td>
                <div style="clear: both;">
                    <hr>
                    <h3>Description</h3>
                    <p id="description"><?php echo $target['Description'] ?></p>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php endforeach;?>
</body>
</html>
