<?php

namespace app\modules\kabinet\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $id_user
 * @property string $question
 * @property string $question_1
 * @property string $question_2
 * @property string $question_3
 * @property string $question_4
 * @property string $question_5
 * @property string $fio
 * @property string $question_6
 * @property string $question_7
 * @property string $question_8
 * @property string $question_9
 * @property string $question_10
 * @property string $question_11
 * @property string $question_12
 * @property string $question_13
 * @property string $question_14
 * @property string $question_15
 * @property string $question_16
 * @property string $question_17
 * @property string $question_18
 *  * @property string $id_zayavka
 *  * @property string $fio
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{question}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [        [['name'], 'required'],
			[['name','question', 'question_1', 'question_2','question_3','question_4','question_5','question_6','question_7','question_8',
			  'question_9','question_10','question_11','question_12','question_13','question_14','question_15','id_zayavka'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'question' => 'Как расшифровывается РСО?',
            'question_1' => 'Что такое УРО МООО РСО?',
            'question_2' => 'Напишите правильную структуру организации',
            'question_3' => 'С какого возраста происходит прием в организацию?',
            'question_4' => 'Напишите цель организации',
            'question_5' => 'Напишите задачи организации',
            'fio' => 'ФИО',
            'question_6' => 'Какие права есть у члена организации?',
            'question_7' => 'Напишите обязанности члена организации',
            'question_8' => 'Права организации?',
            'question_9' => 'Обязанности организации?',
            'question_10' => 'Официальное наименование формы бойца/старика СО на территории УР?',
            'question_11' => 'Имеешь ли право спасти от порчи флаг чужого отряда или пусть будет на их совести?',
            'question_12' => 'С какой стороны находится правая сторона куртки?',
            'question_13' => 'Перечислите, что нельзя делать, находясь на мероприятии?',
            'question_14' => 'Какие есть запреты на нахождении в форме?',
            'question_15' => 'Как называется рисунок на обратной стороне куртки?',
            'question_16' => 'Question 16',
            'question_17' => 'Question 17',
            'question_18' => 'Question 18',
        ];
    }
}
