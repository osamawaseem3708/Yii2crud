<?php
namespace app\models;
use yii\db\ActiveRecord;

class assign_room extends ActiveRecord
{
    private Integer $id;
   private Integer $rid;
    private String $cname;

    private Integer $no_of_days;
    private Integer $no_of_person;
    private Integer $price;
    private String $status;

    public function  rules()
    {
        return [
            [['cname','no_of_days','price','status','no_of_person'],'required']
        ];
    }
}

?>