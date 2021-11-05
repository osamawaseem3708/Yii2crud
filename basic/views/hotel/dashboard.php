
<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>
<?php if (Yii::$app->session->hasFlash('rooms_created')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('rooms_created') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('assign')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('assign') ?>
    </div>
<?php endif; ?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/yii/basic/web/css/hotel.css">
</head>
<body id="dashboard">
<div class="container" >
    <div class="row" style="column-count: 3;column-gap: 40px;">
        <div class="col-md-3 blocks" >
            <label><a href="/yii/basic/web/hotel/rooms">Add Rooms</a></label>
        </div>
        <div class="col-md-3 blocks">
            <label><a href="/yii/basic/web/hotel/viewrooms">Book Rooms</a></label>
        </div>
        <div class="col-md-3 blocks">
            <label><a href="/yii/basic/web/hotel/allrooms">View Rooms</a></label>
        </div>
    </div>
    <br><br>
    <div class="row" style="column-count: 3;column-gap: 40px;">
        <div class="col-md-3 blocks" >
            <label><a href="/yii/basic/web/site/index">POSTS CRUD YII2</a></label>
        </div>
        <div class="col-md-3 blocks">
            <label><a href="/yii/basic/web/posts/index">CRUD USING GII</a></label>
        </div>
        <div class="col-md-3 blocks">
            <label><a href="#"></a></label>
        </div>
    </div>
</div>
</body>
</html>