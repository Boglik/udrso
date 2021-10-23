<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Zakaz;

/**
 * ZakazSearch represents the model behind the search form of `app\models\Zakaz`.
 */
class ZakazSearch extends Zakaz
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
        $query = Zakaz::find()->where(['id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
    }
        if(Yii::$app->user->can('regstab')) {
            $query = Zakaz::find()->where(['id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('mehan')) {
            $query = Zakaz::find()->where(['stabs' => '1', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('udgu')) {
            $query = Zakaz::find()->where(['stabs' => '2', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('ggpi')) {
            $query = Zakaz::find()->where(['stabs' => '3', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        if(Yii::$app->user->can('egida')) {
            $query = Zakaz::find()->where(['stabs' => '4', 'id_user' => Yii::$app->request->get('id')])->orderBy('id DESC');
        }
        $query->joinWith(['mehan']);
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

        $query->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'chelinka', $this->chelinka])
            ->andFilterWhere(['like', 'znachki', $this->znachki])
            ->andFilterWhere(['like', 'atributika', $this->atributika])
            ->andFilterWhere(['like', 'primechania', $this->primechania])
            ->andFilterWhere(['like', 'text_primechania', $this->text_primechania])
            ->andFilterWhere(['like', 'status_zakaza', $this->status_zakaza])
            ->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'stabs', $this->stabs])
            ->andFilterWhere(['like', 'napr', $this->napr]);

        return $dataProvider;
    }
}
