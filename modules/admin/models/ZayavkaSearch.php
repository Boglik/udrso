<?php

namespace app\modules\admin\models;

use app\modules\admin\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Zayavka;

/**
 * ZayavkaSearch represents the model behind the search form of `app\models\Zayavka`.
 */
class ZayavkaSearch extends Zayavka
{
    public $otryad;
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Описание',
            'docs' => 'Прикрепленный файл',
			'items' => 'Показано',
            'otryad' => 'Отряд',
            'status' => 'status'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'text','otryad','data', 'status'], 'safe'], //здесь указываем правила для поля
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
        $query = Zayavka::find()->where(['id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
    }
        if(Yii::$app->user->can('regstab')) {
            $query = Zayavka::find()->where(['id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('mehan')) {
            $query = Zayavka::find()->where(['stabs' => '1', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('udgu')) {
            $query = Zayavka::find()->where(['stabs' => '2', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('ggpi')) {
            $query = Zayavka::find()->where(['stabs' => '3', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('egida')) {
            $query = Zayavka::find()->where(['stabs' => '4', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        $query->joinWith(['zayavka']);

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'data', $this->status]);
        return $dataProvider;
    }
}
