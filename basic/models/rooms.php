<?php
namespace app\models;
use yii\db\ActiveRecord;

class rooms extends ActiveRecord
{
   private Integer $rid;
    private String $room_num;
    private String $hotel_id;
    private String $rsize;
    private String $rdescription;
    private String $status;

    public function  rules()
    {
        return [
            [['room_num','hotel_id','rsize','rdescription','status'],'required']
        ];
    }
}

?>