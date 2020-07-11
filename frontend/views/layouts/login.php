<?php
/**
 * Created by PhpStorm.
 * User: hadise
 * Date: 4/18/2018
 * Time: 4:11 AM
 */
use frontend\assets\AppAsset;
use frontend\assets\AppAssetLogin;


AppAssetLogin::register($this);
?>
<?php $this->beginPage() ?>
<?php $url= Yii::$app->urlManager;?>
<!DOCTYPE html>
<html lang="IR-fa">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vinton</title>



    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>
<body>

<?= $content?>


<?php $this->endBody() ?>

</body>
<?php $this->endPage() ?>
</html>