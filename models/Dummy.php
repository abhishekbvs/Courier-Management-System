<?php
namespace app\models;

use yii\base\Model;
use Yii;

class Dummy extends Model
{
    public $otp;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['otp', 'required'],
            ['otp', 'string', 'min' => 2, 'max' => 255],
        ];
    }

}
