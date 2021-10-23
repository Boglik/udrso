<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Viezd;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ViezdSearch represents the model behind the search form of `app\models\Viezd`.
 */
class ViezdSearch extends Squad
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
    public function search($params, $id)
    {
        $query = Squad::find()
		->where(['id_user' => $id, 'chelina' => 'да'])->orderBy('id DESC');
                if(Yii::$app->user->can('admin')) {
            $query->andWhere(['chelina' => 'да']);
        }
        if(Yii::$app->user->can('regstab')) {
            $query->andWhere(['chelina' => 'да']);
        }
        if(Yii::$app->user->can('mehan')) {
            $query->andWhere(['stabs' => '1', 'chelina' => 'да']);
        }
        if(Yii::$app->user->can('udgu')) {
            $query->andWhere(['stabs' => '2', 'chelina' => 'да']);
        }
        if(Yii::$app->user->can('ggpi')) {
            $query->andWhere(['stabs' => '3', 'chelina' => 'да']);
        }
        if(Yii::$app->user->can('egida')) {
            $query->andWhere(['stabs' => '4', 'chelina' => 'да']);
        }
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
