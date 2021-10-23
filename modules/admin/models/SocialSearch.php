<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Social;
use app\modules\admin\models\User;

use Yii;
use yii\base\BaseObject;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SocialSearch represents the model behind the search form of `backend\models\Social`.
 */
class SocialSearch extends Social
{
    public $otryad;
    /**
     * @var mixed|null
     */
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'data'], 'integer'],
            [['title', 'anonce', 'text','otryad','note','status'], 'safe'],
        ];
    }
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
     */
    public function search($params)
    {if(Yii::$app->user->can('admin')) {
        $query = Social::find()->where(['id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
    }
        if(Yii::$app->user->can('regstab')) {
            $query = Social::find()->where(['id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('mehan')) {
            $query = Social::find()->where(['stabs' => '1', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('udgu')) {
            $query = Social::find()->where(['stabs' => '2', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('ggpi')) {
            $query = Social::find()->where(['stabs' => '3', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('egida')) {
            $query = Social::find()->where(['stabs' => '4', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
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

        $query->andFilterWhere(['like', 'lider', $this->lider])
            ->andFilterWhere(['like', 'members', $this->members])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'annotation', $this->annotation])
                  ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', user::tableName().'.name', $this->otryad]);
        return $dataProvider;
    }
}
