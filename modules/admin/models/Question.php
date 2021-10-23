<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $id_ustav
 * @property int $name
 * @property string|null $question
 * @property string|null $question_1
 * @property string|null $question_2
 * @property string|null $question_3
 * @property string|null $question_4
 * @property string|null $question_5
 * @property string|null $question_6
 * @property string|null $question_7
 * @property string|null $question_8
 * @property string|null $question_9
 * @property string|null $question_10
 * @property string|null $question_11
 * @property string|null $question_12
 * @property string|null $question_13
 * @property string|null $question_14
 * @property string|null $question_15
 */
class Question extends \yii\db\ActiveRecord
{
    public $roleName; // важное поле
    /**
     * @var mixed|null
     */

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
        return [
            [['note', 'primechanie', 'question', 'question_1', 'question_2', 'question_3', 'question_4', 'question_5', 'question_6', 'question_7', 'question_8', 'question_9', 'question_10', 'question_11', 'question_12', 'question_13', 'question_14', 'question_15'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'note' => 'устав',
            'primechanie' =>'примечания',
            'question' => 'Отряд',
            'question_1' => 'Вопрос 1',
            'question_2' => 'Вопрос 2',
            'question_3' => 'Вопрос 3',
            'question_4' => 'Вопрос 4',
            'question_5' => 'Вопрос 5',
            'question_6' => 'Вопрос 6',
            'question_7' => 'Вопрос 7',
            'question_8' => 'Вопрос 8',
            'question_9' => 'Вопрос 9',
            'question_10' => 'Вопрос 10',
            'question_11' => 'Вопрос 11',
            'question_12' => 'Вопрос 12',
            'question_13' => 'Вопрос 13',
            'question_14' => 'Вопрос 14',
            'question_15' => 'Вопрос 15',
        ];
    }
    public function getRole()
    {
        return $this->hasOne(Squad::className(), ['id_squad' => 'id_ustav']);
        // берется из таблицы *Squad* данные id_squad и приравнивается к таблице *id_ustav* таблицы Question
        //  Имеет значение то, где это находится, то есть последнее подбирает в той модели, где это происходит
    }
//    public function getRoles()
//    {
//        return $this->hasOne(Structura::className(), ['id' => 'id_user']);
//        // берется из таблицы *Squad* данные id_squad и приравнивается к таблице *id_ustav* таблицы Question
//        //  Имеет значение то, где это находится, то есть последнее подбирает в той модели, где это происходит
//    }
//    public function getUstav()
//    {
//        return $this->hasOne(Squad::className(), ['id' => 'id']);
//        // берется из таблицы *Squad* данные id_squad и приравнивается к таблице *id_ustav* таблицы Question
//        //  Имеет значение то, где это находится, то есть последнее подбирает в той модели, где это происходит
//    }
}
