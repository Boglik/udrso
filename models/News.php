<?php

namespace app\models;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $anonce
 * @property string|null $text
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{blog}}';
    }


    public static function getBlog() //вывод данных на главную страницу
    {
           $data = self::find()->limit(4)->orderBy('id DESC')->all();
           return $data;
    }

    public static function getAll() //вывод данных на главную страницу
    {

           $data = self::find()->orderBy('id DESC')->all();
           return $data;
    }
    public static function getArticle()
    {
        $model = self::find()->where(['alias' => $slug])->all();
        return $model;
    }
    public static function getDocument()
    {   $id_category = 10;
        $model = self::find()->where('id_category = :id_category', [':id_category' => $id_category])->one();
        return $model;
    }
}
