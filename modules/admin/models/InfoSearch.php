<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\User;

/**
 * ZakazSearch represents the model behind the search form of `app\models\Zakaz`.
 */
class InfoSearch extends User
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['data', 'chelinka', 'znachki', 'atributika', 'primechania', 'text_primechania',
                'status_zakaza', 'id_user', 'stabs', 'napr','otryad'], 'safe'],
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
        $query = User::find()->where(['id' => Yii::$app->request->get('id')])->orderBy('id DESC');
    }
        if(Yii::$app->user->can('regstab')) {
            $query = User::find()->where(['id' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('mehan')) {
            $query = User::find()->where(['stabs' => '1', 'id' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('udgu')) {
            $query = User::find()->where(['stabs' => '2', 'id' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('ggpi')) {
            $query = User::find()->where(['stabs' => '3', 'id' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('egida')) {
            $query = User::find()->where(['stabs' => '4', 'id' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        // $query->joinWith(['user']);
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

        $query->andFilterWhere(['like', 'info', $this->info]);

        return $dataProvider;
    }
}
