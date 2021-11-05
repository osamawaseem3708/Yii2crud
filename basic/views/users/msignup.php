
<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Sign Up';
?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/yii/basic/web/css/hotel.css">
</head>
<body id="body">
        <h3 class="" id="model_here">SIGN UP HERE VIA MODEL</h3>
<br>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error2')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Invalid!</h4>
            <?= Yii::$app->session->getFlash('error2') ?>
        </div>
    <?php endif; ?>

    <div class="container" id="contatiner_signup"><br>
        <form method="POST" autocomplete="off" id="myform">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label lbl_class">First Name</label>
                <div class="col-sm-10">
                    <input type="text" name="firstname" required class="form-control" placeholder="John...." id="inputEmail3">

                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label lbl_class">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" name="lastname" required placeholder="Abraham" class="form-control" id="inputEmail3">
                </div>
            </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label lbl_class">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" required placeholder="abc@email.com" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label lbl_class">Password</label>
                    <div class="col-sm-10">
                        <input type="password"  name="password" required placeholder="password" class="form-control" id="password">
                    </div>
                </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label lbl_class">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="cpassword" required placeholder="password" onblur="validate()" class="form-control" id="cpassword">
                </div>
                <label id="msg" style="color: red;text-align: center" ></label>
            </div>

                 <center>
                <button type="submit" class="btn btn-primary">Sign Up</button>
                 </center>
        </form><br>
        <label id="lbl_class">Already A User <a href="/yii/basic/web/users/mylogin">Login Here</a> </label>
    </div>

<!--    Ending Site Index-->
</div>
<script>
    function validate()
    {
        var pass=document.getElementById("password").value;
        var cpass=document.getElementById("cpassword").value;
        if(pass!=cpass)
        {
            document.getElementById("msg").innerText="Password Doesnot Match";
            console.log('not matched');
        }
        else {
            document.getElementById('msg').innerText="";
        }
    }

</script>
</body>
</html>
