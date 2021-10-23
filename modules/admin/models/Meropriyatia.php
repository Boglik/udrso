<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "meropriyatia".
 *
 * @property int $id
 * @property string $title
 * @property string $anonce
 * @property string|null $text
 * @property string|null $data
 * @property string|null $dataend
 */
class Meropriyatia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{meropriyatia}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'anonce', 'text','data'], 'required'],
            [['title', 'anonce', 'text', 'data', 'dataend'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'anonce' => 'Анонс',
            'text' => 'Полный текст',
            'data' => 'Дата начала мероприятия',
            'dataend' => 'Дата конца мероприятия',
        ];
    }

}
