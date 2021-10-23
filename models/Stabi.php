<?php

namespace app\models;

use yii\behaviors\SluggableBehavior;


/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
  * @property string|null $text
    * @property string|null $images
 */
class Stabi extends \yii\db\ActiveRecord
{
    
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'alias',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{blog-stab}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'images'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Заголовок',
            'images' => 'Изображение',
            'text' => 'Текст',
        ];
    }

    public function getRoute()
{
    return ['site/view', 'id'=>$this->id, 'slug'=>$this->slug];
}

public function getUrl()
{
    return \yii\helpers\Url::to($this->getRoute());
}

    public static function getStabMehan() {
        $id = 4;
    //запрос
        $data = Stabi::find()->where('id = :id', [':id' => $id])->one();


        return $data;
    }
    public static function getStabUdgu() {
        $id = 2;
    //запрос
        $data = Stabi::find()->where('id = :id', [':id' => $id])->one();
        return $data;
    }

    public static function getStabGgpi() {
        $id = 3;
    //запрос
        $data = Stabi::find()->where('id = :id', [':id' => $id])->one();
        return $data;
    }
    public static function getStabEgida() {
        $id = 1;
    //запрос
        $data = Stabi::find()->where('id = :id', [':id' => $id])->one();
        return $data;
    }

}
