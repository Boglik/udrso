<?php

namespace app\modules\kabinet\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\kabinet\models\Zayavka;

/**
 * ZayavkaSearch represents the model behind the search form of `app\models\Zayavka`.
 */
class ZayavkaSearch extends Zayavka
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'text', 'docs','data','status'], 'safe'],
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
        $query = Zayavka::find()->where(['id_user' => Yii::$app->user->id])->orderBy('id DESC');

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

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'text', $this->data])
                ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'docs', $this->docs]);

        return $dataProvider;
    }
}
