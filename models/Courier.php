<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courier".
 *
 * @property int $id
 * @property string $parcel_id
 * @property string $roll_no
 * @property string $date_time
 * @property int $state_id
 * @property string $service
 * @property string $otp
 *
 * @property Person $rollNo
 */
class Courier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parcel_id', 'roll_no', 'service'], 'required'],
            [['parcel_id', 'roll_no'], 'string', 'max' => 100],
            [['roll_no'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['roll_no' => 'roll_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parcel_id' => 'Parcel ID',
            'roll_no' => 'Roll No',
            'date_time' => 'Date Time',
            'state_id' => 'Status',
            'service' => 'Service',
            'otp' => 'Otp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRollNo()
    {
        return $this->hasOne(Person::className(), ['roll_no' => 'roll_no']);
    }
}
