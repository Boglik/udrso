<?php

namespace app\modules\admin\models;

use metalguardian\formBuilder\ActiveFormBuilder;
use Yii;
use yii\base\Widget;

/**
 * This is the model class for table "zayavka".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $docs
 * @property string $user
 *  @property string $otryad
 * @property string|null $docs
 */
class Zayavka extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{zayavka}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['text', 'docs'], 'string'],
            [['title'], 'string'],
            [['status'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'Home' => 'Главная',
            'title' => 'Заголовок',
            'text' => 'Описание',
            'docs' => 'Прикрепленный файл',
            'items' => 'Показано',
            'otryad' => 'Отряд',
            'data' => 'Дата создания заявки',
            'status' => 'Статус заявки на мероприятие',
        ];
    }

    public function getZayavka() {
        return $this->hasOne(User::className(), ['id' => 'id_user']); // обращение к таблице USER и просьба взять ID и забрать id_user
    }

}
