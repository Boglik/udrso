<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * NewsSearch represents the model behind the search form of `app\os\models\News`.
 */
class PravlenieSearch extends Pravlenie
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'dolznost', 'images', 'stab'], 'safe'],
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
//    {if(Yii::$app->user->can('admin')) {
    {
        $query = Pravlenie::find();
//    }
//        if(Yii::$app->user->can('regstab')) {
//            $query = Pravlenie::find();
//        }
//        if(Yii::$app->user->can('mehan')) {
//            $query = Pravlenie::find()->where(['stab' => '1'])->orderBy('id DESC');
//        }
//        if(Yii::$app->user->can('udgu')) {
//            $query = Pravlenie::find()->where(['stab' => '2'])->orderBy('id DESC');
//        }
//        if(Yii::$app->user->can('ggpi')) {
//            $query = Pravlenie::find()->where(['stab' => '3'])->orderBy('id DESC');
//        }
//        if(Yii::$app->user->can('egida')) {
//            $query = Pravlenie::find()->where(['stab' => '4'])->orderBy('id DESC');
//        }

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

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'dolznost', $this->dolznost])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'stab', $this->stab]);

        return $dataProvider;
    }
}
