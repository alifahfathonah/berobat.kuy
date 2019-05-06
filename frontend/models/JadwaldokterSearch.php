<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Jadwaldokter;

/**
 * JadwaldokterSearch represents the model behind the search form of `frontend\models\Jadwaldokter`.
 */
class JadwaldokterSearch extends Jadwaldokter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jadwalID', 'dokterID', 'jadwalKuota'], 'integer'],
            [['jadwalWaktu', 'jadwalRuangan'], 'safe'],
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
        $query = Jadwaldokter::find();

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
            'jadwalID' => $this->jadwalID,
            'dokterID' => $this->dokterID,
            'jadwalKuota' => $this->jadwalKuota,
        ]);

        $query->andFilterWhere(['like', 'jadwalWaktu', $this->jadwalWaktu])
            ->andFilterWhere(['like', 'jadwalRuangan', $this->jadwalRuangan]);

        return $dataProvider;
    }
}