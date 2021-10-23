<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Question;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * questionSearch represents the model behind the search form of `backend\models\Question`.
 */
class questionSearch extends Question
{
    public $qName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_ustav'], 'integer'],
            [['qName', 'id_user', 'question', 'question_1', 'question_2', 'question_3', 'question_4', 'question_5', 'question_6', 'question_7', 'question_8', 'question_9', 'question_10', 'question_11', 'question_12', 'question_13', 'question_14', 'question_15'], 'safe'],
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
        $query = Question::find()->orderBy('id DESC');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['qName'] = [
            'asc' => [Squad::tableName().'.id_ustav' => SORT_ASC],
            'desc' => [Squad::tableName().'.id_ustav' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_ustav' => $this->id_ustav,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'question_1', $this->question_1])
            ->andFilterWhere(['like', 'question_2', $this->question_2])
            ->andFilterWhere(['like', 'question_3', $this->question_3])
            ->andFilterWhere(['like', 'question_4', $this->question_4])
            ->andFilterWhere(['like', 'question_5', $this->question_5])
            ->andFilterWhere(['like', 'question_6', $this->question_6])
            ->andFilterWhere(['like', 'question_7', $this->question_7])
            ->andFilterWhere(['like', 'question_8', $this->question_8])
            ->andFilterWhere(['like', 'question_9', $this->question_9])
            ->andFilterWhere(['like', 'question_10', $this->question_10])
            ->andFilterWhere(['like', 'question_11', $this->question_11])
            ->andFilterWhere(['like', 'question_12', $this->question_12])
            ->andFilterWhere(['like', 'question_13', $this->question_13])
            ->andFilterWhere(['like', 'question_14', $this->question_14])
            ->andFilterWhere(['like', 'question_15', $this->question_15]);

        return $dataProvider;
    }
}
