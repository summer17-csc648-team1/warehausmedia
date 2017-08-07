<?php
use Cake\Routing\Router;
$this->layout = 'default';
$this->Html->css('home.css')
?>

<!DOCTYPE html>
<html>
    <head></head>

    <body>
    <div class="content">
        <div>
            <h1> <b><?php echo $user['Username']; ?> </b></h1>
        </div>


        <div>
            <table>
                <tr>
                    <td>
                        <b>Messages to me: </b>
                    </td>
                    <td>
                        <table>
                            <?php foreach ($messages as $msg): ?>
                                <tr>
                                    <td><?php echo $msg['Message']; ?></td>
                                </tr>
                            <?php endforeach;?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <table>
                <tr>
                    <td>
                        <b>My images: </b>
                    </td>
                    <td>
                        <table>
                            <?php foreach ($images as $img): ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo Router::fullBaseUrl()?>/media/detail/<?php echo $img['MediaID']?>">
                                            <img style="width: 400px;" src="<?php echo $this->request->webroot.$img['FileLocation']?>">
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </body>
</html>
