<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Courier;

/**
 * CourierSearch represents the model behind the search form of `app\models\Courier`.
 */
class CourierSearch extends Courier
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'state_id'], 'integer'],
            [['parcel_id', 'roll_no', 'date_time', 'service', 'otp'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Courier::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'state_id' => $this->state_id,
        ]);

        $query->andFilterWhere(['like', 'parcel_id', $this->parcel_id])
            ->andFilterWhere(['like', 'roll_no', $this->roll_no])
            ->andFilterWhere(['like', 'date_time', $this->date_time])
            ->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'otp', $this->otp]);

        return $dataProvider;
    }
}
