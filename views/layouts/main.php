<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

//doesn't provide auto reload
//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <!--    TODO remove this crutch -->
    <link rel="stylesheet" href="<?= Url::to('@web/dist/css/app.css') ?>">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <?= $content ?>
</div>

<?php $this->endBody() ?>
<!-- TODO crutch)-->
<script src="<?= Url::to('@web/dist/js/app.js') ?>"></script>
</body>
</html>
<?php $this->endPage() ?>
