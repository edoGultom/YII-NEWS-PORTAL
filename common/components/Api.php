<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\helpers\Inflector;


class Api extends Component {

    public function validateFormData($body, $reqbody){
        $dataBody = array_keys($body);
        foreach($dataBody as $field)
        {
            if(!in_array($field, $reqbody)){
                $message = "Body Yang anda kirim ".json_encode($body)." \nHarus sesuai dengan salah satu : ".json_encode($reqbody);
                    throw new \yii\web\HttpException(406, $message);
            }
        }

        return true;
    }
} 