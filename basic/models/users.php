<?php
namespace app\models;
use yii\db\ActiveRecord;

class users extends ActiveRecord
{
    private $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private $DOB;
    private $Gender;
    private $status;
    private $role;
    public function  rules()
    {
        return [
            [['firstname','lastname','email','password'],'required'],
           [['firstname','lastname'],'string','message'=>"Name Can only be of Type String"],
            [['email'],'email','message'=>"Name Can only be of Type String"]
        ];
    }
}

?>