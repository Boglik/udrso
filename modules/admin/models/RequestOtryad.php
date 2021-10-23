<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "zayavki_v_otryad".
 *
 * @property int $id
 * @property string|null $fio
 * @property string|null $telefon
 * @property string|null $city
 * @property string|null $mesto_uchebi
 *  * @property string|null $request
 */
class RequestOtryad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{zayavki_v_otryad}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city'], 'string'],
            [['fio', 'telefon', 'mesto_uchebi', 'request'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fio' => 'ФИО',
            'telefon' => 'Телефон',
            'city' => 'Город',
            'mesto_uchebi' => 'Место учебы',
            'request' => 'В работе',
        ];
    }
}
