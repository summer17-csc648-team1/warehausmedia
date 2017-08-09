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
            <ul class="title-area large-3 medium-4 columns">

                <h2>Messages</h2>
            </ul>

            <table style="width:50%">
                <tr>
                    <th>From:</th>
                    <th>Message:</th>
                </tr>

                <?php foreach ($messages as $msg): ?>
                    <tr>
                        <td>
                            <?php
                                $users = \Cake\ORM\TableRegistry::get('users');
                                $user1 = $users->find('all')->select()->where(['UserID'=>$msg['User1']]);
                                foreach ($user1 as $sender){
                                    echo $sender['Username'];
                                }
                            ?>
                        </td>
                        <td><?php echo $msg['Message']; ?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
        <br><br>
        <div>

            <ul class="title-area large-3 medium-4 columns">
                <h2>My Images</h2>
            </ul>

            <td>
                <table style="width:50%">
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
        </div>
        </div>
        
<!--        <div>-->
<!--            <h1> <b>--><?php //echo $user['Username']; ?><!-- </b></h1>-->
<!--        </div>-->
<!---->
<!---->
<!--        <div>-->
<!--            <table>-->
<!--                <tr>-->
<!--                    <td>-->
<!--                        <b>Messages to me: </b>-->
<!--                    </td>-->
<!--                    <td>-->
<!--                        <table>-->
<!--                            --><?php //foreach ($messages as $msg): ?>
<!--                                <tr>-->
<!--                                    <td>--><?php //echo $msg['Message']; ?><!--</td>-->
<!--                                </tr>-->
<!--                            --><?php //endforeach;?>
<!--                        </table>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            </table>-->
<!--        </div>-->
<!---->
<!---->
<!---->
<!--        <div>-->
<!--            <table>-->
<!--                <tr>-->
<!--                    <td>-->
<!--                        <b>My images: </b>-->
<!--                    </td>-->
<!--                    <td>-->
<!--                        <table>-->
<!--                            --><?php //foreach ($images as $img): ?>
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <a href="--><?php //echo Router::fullBaseUrl()?><!--/media/detail/--><?php //echo $img['MediaID']?><!--">-->
<!--                                            <img style="width: 400px;" src="--><?php //echo $this->request->webroot.$img['FileLocation']?><!--">-->
<!--                                        </a>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            --><?php //endforeach;?>
<!--                        </table>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->
    </body>
</html>
