<?php

namespace app\modules\kabinet\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\kabinet\models\Meropriyatia;

/**
 * MeropriyatiaSearch represents the model behind the search form of `os\models\Meropriyatia`.
 */
class MeropriyatiaSearch extends Meropriyatia
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'anonce', 'text', 'data','dataend'], 'safe'],
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
        $query = Meropriyatia::find()->orderBy('id DESC');

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'anonce', $this->anonce])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'dataend', $this->dataend])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
