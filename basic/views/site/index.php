
<?php
use yii\helpers\html;
/* @var $this yii\web\View */

$this->title = 'Post';
if(isset($_SESSION['uemail']))
{
    header('location:users/mylogin');
}
?>
<?php if (Yii::$app->session->hasFlash('success_user')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('success_user') ?>
    </div>
<?php endif; ?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="site-index" style="margin-top: -8%;">

    <h3 class="" style="color: #0f6674;text-align: center">MY FIRST CRUD IN YII 2.0 APPLICATION!</h3>


<div class="row" style="margin-bottom: 2%" >
    <span><?= Html::a('Create New Post',['/site/create'],['class' =>'btn btn-primary'])?></span>
</div>
    <div class="body-content">

        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
<!--                    <th scope="col">Id</th>-->
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($posts)>0){
                    foreach ($posts as $post){?>

                <tr class="table-active">
<!--                    <td>--><?php //echo $post['id']?><!--</td>-->
                    <td><?php echo $post['title']?></td>
                    <td><?php echo $post['description']?></td>
                    <td><?php echo $post['category']?></td>
                    <td><a href="/yii/basic/web/site/edit?id=<?php echo $post['id']?>">
                            <i class="fa fa-edit" aria-hidden="true" style="height: 15%;width: 14%"></i>
                        </a>
                        &nbsp;
                        <a href="/yii/basic/web/site/delete?id=<?php echo $post['id']?>&title=<?php echo $post['title']?>">
                            <i class="fa fa-trash-alt" aria-hidden="true" style="height: 15%;width: 14%"></i>
                        </a>
                        &nbsp;
                        <a href="/yii/basic/web/site/view?id=<?php echo $post['id']?>" >
                            <i class="fa fa-file" aria-hidden="true" style="height: 15%;width: 18%"></i>
                        </a></td>
                </tr>
                <?php }}
                else{ ?>
                <tr><td colspan="4">No Data Found.....</td></tr>
                <?php }
                ?>

                </tbody>
            </table>
        </div>

    </div>
</div>
