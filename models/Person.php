<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $email
 * @property string $roll_no
 * @property string $name
 * @property string $phone
 *
 * @property Courier[] $couriers
 * @property User $user
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'phone'], 'required'],
            [['email', 'roll_no', 'name', 'phone'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['roll_no'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'roll_no' => 'Roll No',
            'name' => 'Name',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouriers()
    {
        return $this->hasMany(Courier::className(), ['roll_no' => 'roll_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['username' => 'email']);
    }
}
