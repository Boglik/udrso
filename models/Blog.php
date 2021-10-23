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
class Blog extends \yii\db\ActiveRecord
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
        return '{{blog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'images'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
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

    public static function getJournal() //Вывод данных на страницу Костра
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();

        $data = self::find()->where(['id_napravlenie' => '1'])->orderBy(['username' => SORT_ASC])->all();

        return $data;
    }

}
