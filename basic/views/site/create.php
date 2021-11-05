
<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Create Post';
?>
<div class="site-index">
        <h3 class="" style="color: #0f6674;text-align: center">CREATE A NEW POST!</h3>
<br>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>



    <div class="container">
        <form method="POST" autocomplete="off">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" required name="title" placeholder="PHP etc....">
                </div>

            </div>
            <div class="form-group" style="width: 50%">
                <label for="inputAddress">Description</label>
                <textarea type="text" class="form-control" id="inputAddress" name="description" required placeholder="PHP Known as HyperText Preprocessor"></textarea>
            </div>
            </div>


                <div class="form-group" style="width: 50%">
                    <label for="inputState">Category</label>
                    <select id="inputState" class="form-control" required name="category">
                        <option selected>Choose...</option>

                        <option value="MVC-Framework">MVC-Framework </option>
                        <option value="CMS">CMS </option>
                        <option value="Programming language">Programming Language </option>
                    </select>
                </div>

            <button type="submit" class="btn btn-success">Create Post</button>
            <a href="/yii/basic/web/site/index" class="btn btn-primary">Cancel</a>
        </form>
    </div>

<!--    Ending Site Index-->
</div>
