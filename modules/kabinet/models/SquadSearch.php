<?php

namespace app\modules\kabinet\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\kabinet\models\Squad;

/**
 * SquadSearch represents the model behind the search form of `os\models\Squad`.
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
            [['name', 'data_rozhdenia', 'familia', 'inn', 'snils', 'otchestvo', 'pol', 'forma_obuchenia',
                'mesto_uchebi', 'tip_uchebi', 'nomer_udostoverenia', 'ustav',
                'telefon', 'dolznost', 'vznos','chelina', 'mesto_raboti', 'note','id_squad'
            ], 'safe'],
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
    {   // строка отвечающиая за вывод только СВОИХ заявок
        $query = Squad::find()->where(['id_user' => Yii::$app->user->id])->orderBy('id DESC');

        // строка отвечающиая за вывод только СВОИХ заявок

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

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'data_rozhdenia', $this->data_rozhdenia])
            ->andFilterWhere(['like', 'familia', $this->familia])
            ->andFilterWhere(['like', 'inn', $this->inn])
//            ->andFilterWhere(['like', 'snils', $this->snils])
            ->andFilterWhere(['like', 'otchestvo', $this->otchestvo])
            ->andFilterWhere(['like', 'forma_obuchenia', $this->forma_obuchenia])

            ->andFilterWhere(['like', 'pol', $this->pol])
            ->andFilterWhere(['like', 'mesto_uchebi', $this->mesto_uchebi])
            ->andFilterWhere(['like', 'tip_uchebi', $this->tip_uchebi])
            ->andFilterWhere(['like', 'nomer_udostoverenia', $this->nomer_udostoverenia])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'dolznost', $this->dolznost])
            ->andFilterWhere(['like', 'vznos', $this->vznos])
            ->andFilterWhere(['like', 'ustav', $this->ustav])
            ->andFilterWhere(['like', 'mesto_raboti', $this->mesto_raboti])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'id_squad', $this->id_squad])
        ->andFilterWhere(['like', 'chelina', $this->chelina]);

        return $dataProvider;
    }
}
