
<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'All Rooms';
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/yii/basic/web/css/hotel.css">
</head>
<?php if (Yii::$app->session->hasFlash('release')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Released!</h4>
        <?= Yii::$app->session->getFlash('release') ?>
    </div>
<?php endif; ?>
<body id="dashboard">
<h2 style="text-align: center;color: white">Available Room</h2>
<div class="container" id="tbl_background">
<table class="table" id="">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Room #</th>
        <th scope="col">Hotel Name</th>
        <th scope="col">Room Size</th>
        <th scope="col">Room Description</th>
        <th scope="col">Room Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count=1;
    foreach ($data as $singledata){
        ?>
    <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $singledata['room_num'] ?></td>
        <td><?php echo $singledata['hotel_id'] ?></td>

        <td><?php echo $singledata['rsize'] ?></td>
        <td><?php echo $singledata['rdescription'] ?></td>
        <td><?php echo $singledata['status'] ?></td>
        <form method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="hidden" value="<?php echo $singledata['rid']; ?>" name="rid">
        <td><button class="btn btn-primary">Release </button> </td>
        </form>
    </tr>
    <?php $count++; }
    ?>
    </tbody>
</table>
</div>
</body>
</html>