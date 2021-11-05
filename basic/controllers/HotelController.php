<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\users;
use app\models\rooms;
use app\models\assign_room;

class HotelController extends Controller
{

    public function actionDashboard(){
        return $this->render('dashboard');
    }

    public function actionRooms()
    {
        $model= new rooms();

        if(!empty($_POST))
        {
            $model->room_num=$_POST['room_num'];
            $model->hotel_id=$_POST['hotel_id'];
            $model->rsize=$_POST['rsize'];
            $model->rdescription=$_POST['rdescription'];
            $model->status=$_POST['status'];
            if($model->validate()){
            $model->save();
            yii::$app->session->setflash('rooms_created', "New Room Created Successfully");
            return $this->redirect('dashboard');
            }
        }
        return $this->render('rooms');
    }

    public function actionViewrooms()
    {
        $data = rooms::find()->where(['status'=>'Active'])->all();
        return $this->render('viewrooms',['data'=>$data]);
    }

    public function actionBookroom($rid)
    {
        $model= new assign_room();
        if(!empty($_POST))
        {
            $model->rid=$rid;
            $model->cname=$_POST['cname'];
            $model->no_of_person=$_POST['no_of_person'];
            $model->no_of_days=$_POST['days'];
            $model->date=$_POST['date'];
            $model->time=$_POST['time'];
            $model->price=$_POST['price'];
            $model->status='Assign';
            print_r($model);
            if($model->validate())
            {
                echo "called";
                $model->save();
                Yii::$app->db->createCommand()->update('rooms', ['status'=>'Assign'], ['rid'=>$rid])
                    ->execute();
                yii::$app->session->setflash('assign', "Room Assign to ".$_POST['cname']." Successfully");
                return $this->redirect('dashboard');
            }
            else
            {
                print_r($model->getErrors());
            }

        }
       return $this->render('bookroom');
    }

    public function actionAllrooms()
    {
        $data = rooms::find()->all();

            if(!empty($_POST))
            {
                $rid=$_POST['rid'];
            Yii::$app->db->createCommand()->update('rooms', ['status'=>'Active'], ['rid'=>$rid])
                ->execute();
            yii::$app->session->setflash('release', "Room Released Successfully");
                $data = rooms::find()->all();
            return $this->render('allrooms',['data'=>$data]);
            }
        return $this->render('allrooms',['data'=>$data]);
    }


}
