<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\users;

class UsersController extends Controller
{

//    public function actionIndex()
//    {
//        $posts=Yii::$app->db->createCommand('select * from posts')->queryAll();
//        return $this->render('index',['posts'=>$posts]);
//    }

    public function actionMylogin()
    {

        if(!empty($_POST))
        {
            $email=$_POST['email'];
            $password=md5($_POST['password']);
            $user=Yii::$app->db->createCommand("SELECT * FROM `users` where email='$email' and password='$password'")->queryAll();
            if($user)
            {
                $_SESSION['uemail'] = $email;
                yii::$app->session->setflash('success', "login successfully");
                $this->layout=false;
                return $this->redirect(['/hotel/dashboard']);
            }
            else
            {
                yii::$app->session->setflash('error2', "invalid username or password");
            }
        }
        $this->layout=false;
        return $this->render('mylogin');
    }

    public function actionSignup()
    {

        if(!empty($_POST))
        {
            $email=$_POST['email'];
            $password=md5($_POST['password']);
            $user=Yii::$app->db->createCommand("SELECT * FROM `users` where email='$email' and password='$password'")->queryAll();
            if($user)
            {
                $_SESSION['uemail'] = $email;
                yii::$app->session->setflash('success', "login successfully");
                return $this->redirect(['/site/index']);
            }
            else
            {
                yii::$app->session->setflash('error2', "invalid username or password");
            }
        }
        $this->layout=false;
        return $this->render('signup');
    }

    public function actionMsignup()
    {
        $model= new users();
        unset($_POST['_csrf']);
            if(!empty($_POST))
            {
                if(!is_numeric(($_POST['firstname'])) && !is_numeric(($_POST['lastname'])))
                {
                    $model->firstname =($_POST['firstname']);
                    $model->lastname =($_POST['lastname']);
                    $model->email =$_POST['email'];
                    $model->password =md5($_POST['password']);
                    $model->status="Active";
                    $model->role="Customer";
                    if($model->validate())
                    {
                        $model->save();
                        yii::$app->session->setflash('success_user', "User Created Successfully");
                        return $this->redirect(['site/index']);
                    }
                    else{
                       print_r($model->getErrors());
                       exit();
                    }
                }

            }



//        $model->firstname = !is_numeric($_POST['firstname']);
//        $model->lastname =!is_numeric($_POST['lastname']);
//        $model->email =$_POST['email'];
//        $model->password =$_POST['password'];
//        if(!empty($_POST))
//        {
//            $email=$_POST['email'];
//            $password=md5($_POST['password']);
//            $user=Yii::$app->db->createCommand("SELECT * FROM `users` where email='$email' and password='$password'")->queryAll();
//            if($user)
//            {
//                $_SESSION['uemail'] = $email;
//                yii::$app->session->setflash('success', "login successfully");
//                return $this->redirect(['/site/index']);
//            }
//            else
//            {
//                yii::$app->session->setflash('error2', "invalid username or password");
//            }
//        }

        return $this->render('msignup');
    }



    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    public function actionLogout()
    {

    }

    public function actionCreate()
    {
        if(!empty($_POST)){

            $title=$_POST['title'];
            $desc=$_POST['description'];
            $cat=$_POST['category'];
            $posts = Yii::$app->db->createCommand("insert into posts(title,description,category) values('$title','$desc','$cat')")
                ->execute();
             echo $posts;
             if($posts)
             {
                 Yii::$app->session->setFlash('success', "Data Inserted Successfully.");
                return $this->redirect('index');
             }

        }

        return $this->render('create');
    }


    public function actionEdit($id)
    {
        if(!empty($_POST)){
            $title=$_POST['title'];
            $desc=$_POST['description'];
            $cat=$_POST['category'];
            $updated_post = Yii::$app->db->createCommand("UPDATE posts set title='$title', description='$desc' ,category='$cat' WHERE id='$id'")
                ->execute();

            if($updated_post)
            {
                Yii::$app->session->setFlash('success', "Data Updated Successfully.");
                return $this->redirect('index');
            }
        }
        $posts=Yii::$app->db->createCommand("select * from posts where id='$id'")->queryAll();
        return $this->render('edit',['post'=>$posts]);
    }
    public function actionDelete($id,$title)
    {
        echo "<script>alert('Are you Sure You Want to Delete This Post')</script>";
        $deleted_post = Yii::$app->db->createCommand("Delete from posts WHERE id='$id'")
                ->execute();
            if($deleted_post)
            {
                Yii::$app->session->setFlash('success', "Post with title ".$title." Deleted Successfully.");
                return $this->redirect('index');
            }

    }

    public function actionView($id)
    {
        $posts=Yii::$app->db->createCommand("select * from posts where id='$id'")->queryAll();
        return $this->render('view',['post'=>$posts]);

    }

}
