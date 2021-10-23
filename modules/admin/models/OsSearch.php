<?php

namespace app\modules\admin\models;

use app\modules\admin\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Os;

/**
 * OsSearch represents the model behind the search form of `backend\models\Os`.
 */
class OsSearch extends Os
{
    /**
     * @var mixed|null
     */
    public $otryad;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'anonce', 'text', 'id_user', 'otryad'], 'safe'],
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
        $query = Os::find()->where(['id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
    }
        if(Yii::$app->user->can('regstab')) {
            $query = Os::find()->where(['id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('mehan')) {
            $query = Os::find()->where(['stabs' => '1', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('udgu')) {
            $query = Os::find()->where(['stabs' => '2', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('ggpi')) {
            $query = Os::find()->where(['stabs' => '3', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('egida')) {
            $query = Os::find()->where(['stabs' => '4', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
            $query->joinWith(['os']);
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
                ->andFilterWhere(['like', 'text', $this->text])
                ->andFilterWhere(['like', user::tableName() . '.name', $this->otryad])
                ->andFilterWhere(['like', 'id_user', $this->id_user]);

            return $dataProvider;
        }
    }
