<?php

namespace app\modules\admin\models;

use app\modules\admin\models\User;
use Yii;

/**
 * This is the model class for table "os".
 *
 * @property int $id
 * @property string $title
 * @property string $anonce
 * @property string $text
 * @property string $id_user
 *
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
            [['title', 'anonce', 'text', 'id_user'], 'string'],
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
            'anonce' => 'Краткий текст',
            'text' => 'Текст',
            'otryad' => 'Отряд',
        ];
    }
    public function getOs()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']); // обращение к таблице USER и просьба взять ID и забрать id_user
    }
}
