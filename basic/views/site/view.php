
<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'View Page';
?>
<div class="site-index">
        <h3 class="" style="color: #0f6674;text-align: center">VIEW A POST!</h3>
<br>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

<?php if(isset($post)){
    foreach ($post as $singlepost){
    ?>

    <div class="container">
        <form method="POST">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" disabled required name="title" value="<?php echo $singlepost['title']; ?>" placeholder="PHP etc....">
                </div>

            </div>
            <div class="form-group" style="width: 50%">
                <label for="inputAddress">Description</label>
                <textarea type="text" disabled class="form-control"  name="description"  required placeholder="Description"><?php  echo $singlepost['description']; ?>
                </textarea>
            </div>
            </div>


                <div class="form-group" style="width: 50%">
                    <label for="inputState">Category</label>
                    <select id="inputState" disabled class="form-control" required name="category">
                        <option>Choose...</option>

                        <option value="MVC-Framework" <?php if($singlepost['category']=="MVC-Framework") echo "selected" ?>>MVC-Framework </option>
                        <option value="CMS" <?php if($singlepost['category']=="CMS") echo "selected" ?>>CMS </option>
                        <option value="Programming language" <?php if($singlepost['category']=="Programming Language") echo "selected" ?>>Programming Language </option>
                    </select>
                </div>


            <a href="/yii/basic/web/site/index" class="btn btn-primary">Cancel</a>
        </form>
    </div>
<?php }} ?>
<!--    Ending Site Index-->
</div>
