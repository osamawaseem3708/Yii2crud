
<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'My Login';
?>
<div class="site-index">
        <h3 class="" style="color: #0f6674;text-align: center">LOGIN HERE </h3>
<br>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <br>
    <div class="container" style="width: 50%;border: solid 1px; "><br>
        <form method="POST" autocomplete="off">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" required class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" required class="form-control" id="inputPassword3">
                    </div>
                </div>

                 <center>
                <button type="submit" class="btn btn-primary">Sign in</button>
                 </center>
        </form><br>
    </div>

<!--    Ending Site Index-->
</div>
