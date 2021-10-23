<?php

namespace app\modules\kabinet\models;

use Yii;

/**
 * This is the model class for table "meropriyatia".
 *
 * @property int $id
 * @property string $title
 * @property string $anonce
 * @property string|null $text
 * @property string $data
 * @property string $dataend
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
            [['title', 'anonce'], 'required'],
            [['title', 'anonce', 'text', 'data','dataend'], 'string'],
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
            'data' => 'Дата начала мероприятия',
            'dataend' => 'Дата конца мероприятия',
            'text' => 'Полный текст',
        ];
    }
}
