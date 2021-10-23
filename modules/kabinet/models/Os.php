<?php

namespace app\modules\kabinet\models;

use Yii;

/**
 * This is the model class for table "os".
 *
 * @property int $id
 * @property string $title
 *  @property string $anonce
 * @property string $text

 * @property string $id_user
 * @property string stabs_zayavka
 * @property string stab_name
 * @property string napr
 */
class Os extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{os}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['title', 'anonce', 'text'], 'string'],
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
            'text' => 'Текст',
            'anonce' => 'Короткий текст',
        ];
    }
}
