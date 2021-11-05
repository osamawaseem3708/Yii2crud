<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\posts;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $posts=Yii::$app->db->createCommand('select * from posts')->queryAll();
        return $this->render('index',['posts'=>$posts]);
    }

    public function actionMylogin()
    {
        $posts=Yii::$app->db->createCommand('select * from posts')->queryAll();
        return $this->render('mylogin',['posts'=>$posts]);
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

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionMylogout()
    {
       session_unset();
       session_destroy();
       return $this->redirect(['/users/mylogin']);
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHelloworld()
    {
        return "Hello world";
    }
}
