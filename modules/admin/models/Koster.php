<?php

namespace app\modules\admin\models;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $anonce
 * @property string|null $text
 */
class Koster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{koster}}';
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title'], 'required'],
            [['images'], 'image', 'extensions' => ['png', 'jpg', 'jpeg']],
            [['files'], 'file', 'extensions' => ['pdf']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'images' => 'Изображение',
            'files' => 'Pdf файл',
        ];
    }

    public static function getAll() //вывод данных на главную страницу
    {
           $data = self::find()->limit(4)->orderBy('id DESC')->all();
           return $data;
    }

        
    public static function getKoster() //Вывод данных на страницу Костра
    {
           $data = self::find()->orderBy('id DESC')->all();
           return $data;
    }
}
