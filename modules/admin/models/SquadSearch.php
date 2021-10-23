<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Squad;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SquadSearch represents the model behind the search form of `app\models\Squad`.
 */
class SquadSearch extends Squad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['id'], 'integer'],
            [['data_rozhdenia', 'inn',
                'mesto_uchebi', 'tip_uchebi', 'nomer_udostoverenia',
                'telefon', 'dolznost', 'vznos', 'ustav', 'chelina','note','otryad','napr'], 'safe'],
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
        $query = Squad::find()->where(['chelina' => 'да'])->orderBy('id DESC'); // если указали getRole то здесь вписывается role;
        // add conditions that should always apply here

        //указываем, что нужно выводить только свои записи
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

        $query->andFilterWhere(['like', 'data_rozhdenia', $this->data_rozhdenia])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'mesto_uchebi', $this->mesto_uchebi])
            ->andFilterWhere(['like', 'tip_uchebi', $this->tip_uchebi])
            ->andFilterWhere(['like', 'nomer_udostoverenia', $this->nomer_udostoverenia])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'dolznost', $this->dolznost])
            ->andFilterWhere(['like', 'chelina', $this->chelina])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'vznos', $this->vznos])
            ->andFilterWhere(['like', 'ustav', $this->ustav])
            ->andFilterWhere(['like', 'napr', $this->napr]);

        return $dataProvider;
    }
}
