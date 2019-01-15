<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property int $state_id
 * @property string $state_name
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state_id', 'state_name'], 'required'],
            [['state_id'], 'integer'],
            [['state_name'], 'string', 'max' => 30],
            [['state_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'Status',
            'state_name' => 'State Name',
        ];
    }
}
