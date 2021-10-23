<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Question;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

use yii\grid\GridView;
use yii\widgets\ListView;

/**
 * SquadSearch represents the model behind the search form of `app\models\Squad`.
 */
class UstavSearch extends Squad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['id'], 'integer'],
            [['question'], 'safe'],
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
    {if(Yii::$app->user->can('admin')) {
        $query = Question::find();
    }
        if(Yii::$app->user->can('regstab')) {
            $query = Question::find();
        }
        if(Yii::$app->user->can('mehan')) {
            $query = Question::find()->where(['stabs' => '1'])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('udgu')) {
            $query = Question::find()->where(['stabs' => '2'])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('ggpi')) {
            $query = Question::find()->where(['stabs' => '3'])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('egida')) {
            $query = Question::find()->where(['stabs' => '4'])->orderBy('id DESC');
        }
        $query->joinWith(['mehan']);
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

        $query->andFilterWhere(['like', 'question', $this->question]);

        return $dataProvider;
    }
}
