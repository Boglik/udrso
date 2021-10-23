<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SquadSearch represents the model behind the search form of `app\models\Squad`.
 */
class OtryadSearch extends Squad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['id'], 'integer'],
            [['name', 'familia', 'data_rozhdenia', 'passport', 'inn',
                'mesto_uchebi', 'tip_uchebi', 'nomer_udostoverenia',
                'telefon', 'dolznost', 'vznos', 'chelina','note','otryad', 'ustav'], 'safe'],
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
        $query = Squad::find()->where(['id_user' => $id])->orderBy('id DESC');
        if(Yii::$app->user->can('mehan')) {
$query = Squad::find()->where(['id_user' => $id])->andWhere(['stabs' => '1'])->orderBy('id DESC');
        }
               if(Yii::$app->user->can('udgu')) {
$query = Squad::find()->where(['id_user' => $id])->andWhere(['stabs' => '2'])->orderBy('id DESC');
                }
                        if(Yii::$app->user->can('ggpi')) {
$query = Squad::find()->where(['id_user' => $id])->andWhere(['stabs' => '3'])->orderBy('id DESC');
                        }
                         if(Yii::$app->user->can('egida')) {
$query = Squad::find()->where(['id_user' => $id])->andWhere(['stabs' => '4'])->orderBy('id DESC');
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

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'familia', $this->familia])
            ->andFilterWhere(['like', 'otchestvo', $this->otchestvo])
            ->andFilterWhere(['like', 'data_rozhdenia', $this->data_rozhdenia])
            ->andFilterWhere(['like', 'pol', $this->pol])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'seria_passporta', $this->seria_passporta])
            ->andFilterWhere(['like', 'mesto_uchebi', $this->mesto_uchebi])
            ->andFilterWhere(['like', 'tip_uchebi', $this->tip_uchebi])
            ->andFilterWhere(['like', 'nomer_udostoverenia', $this->nomer_udostoverenia])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'dolznost', $this->dolznost])
            ->andFilterWhere(['like', 'chelina', $this->chelina])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'ustav', $this->ustav])
            ->andFilterWhere(['like', 'vznos', $this->vznos]);
//            ->andFilterWhere(['like', 'stabs', $this->stabs])
//            ->andFilterWhere(['like', 'napr', $this->napr])
//            ->andFilterWhere(['like', user::tableName().'.name', $this->otryad]);

        return $dataProvider;
    }

}
