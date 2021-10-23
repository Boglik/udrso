<?php


namespace app\models;

/**
 * @property string $fio
 *  * @property string $telefon
 *  * @property string $city
 *  * @property string $mesto_uchebi
 *  *  * @property string $data
 */
class Zayavki_na_otryad extends \yii\db\ActiveRecord
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
              [['name', 'familia', 'otchestvo', 'data', 'telefon', 'city', 'mesto_uchebi'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fio' => 'ФИО',
            'data' => 'Дата рождения',
            'telefon' => 'Телефон',
            'city' => 'Город',
            'mesto_uchebi'=>'Место учебы',
        ];
    }

}