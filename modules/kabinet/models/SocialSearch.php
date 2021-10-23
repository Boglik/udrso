<?php

namespace app\modules\kabinet\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * socialSearch represents the model behind the search form of `os\models\social`.
 */
class SocialSearch extends Social
{
    const STAB_MEHAN = 0; //механ
    const STAB_UDGU = 1; //удгу
    const STAB_GGPI = 2;
    const STAB_EGIDA = 3;
    const BEZ_STABA = 4;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
        //            ['status', 'default', 'value' => self::STAB_MEHAN],
        //            ['status', 'in', 'range' => [self::STAB_MEHAN, self::STAB_UDGU, self::STAB_GGPI, self::STAB_EGIDA, self::BEZ_STABA]],
            [['id', 'data'], 'integer'],
            [['lider', 'members', 'members','annotation','status'], 'safe'],
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
        $query = Social::find()->where(['id_user' => Yii::$app->user->id])->orderBy('id DESC');

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
            'id_user' => $this->id_user,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'lider', $this->lider])
            ->andFilterWhere(['like', 'members', $this->members])
            ->andFilterWhere(['like', 'data', $this->data])
                            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'annotation', $this->annotation]);

        return $dataProvider;
    }
}
