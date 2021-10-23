<?php

namespace app\modules\kabinet\models;

use app\modules\kabinet\models\Question;
/**
 * This is the model class for table "squad".
 *
 * @property int $id
 * @property string $fio
 * @property string $data_rozhdenia
 * @property string|null $passport
 * @property string|null $inn
 * @property string|null $snils
 * @property string|null $address_passport
 * @property string|null $adress_prozivania
 * @property string|null $mesto_uchebi
 * @property string|null $tip_uchebi
 * @property string|null $nomer_udostoverenia
 * @property string|null $telefon
 * @property string|null $dolznost
 * @property string|null $vznos
 * @property string|null $chelina
 * @property string|null $mesto_raboti
 * @property string|null $note
 * @property string|null $docs
 * @property string|null $stabs
 * @property string|null $id_user
 */
class Ustav extends \yii\db\ActiveRecord
{
    /**
     * @var int|mixed|string|null
     */
    private $id_user;
    private $id_stab;
    private $stab;
    private $napr;
    /**
     * @var mixed|null
     */
    private $user;
    /**
     * @var mixed|null
     */


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{squad}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data_rozhdenia'], 'string'],
            [['fio', 'passport', 'inn', 'snils', 'address_passport', 'adress_prozivania', 'mesto_uchebi', 'tip_uchebi',
                'nomer_udostoverenia', 'telefon', 'dolznost', 'vznos', 'chelina', 'mesto_raboti', 'docs', 'stabs', 'id_user',
            ], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'data_rozhdenia' => 'Дата Рождения',
            'passport' => 'Паспорт',
            'inn' => 'ИНН',
            'address_passport' => 'Паспортный адрес',
            'adress_prozivania' => 'Адрес проживания',
            'mesto_uchebi' => 'Место учебы',
            'tip_uchebi' => 'Тип учебы',
            'nomer_udostoverenia' => 'Номер удостоверения',
            'telefon' => 'Телефон',
            'dolznost' => 'Должность',
            'vznos' => 'Взнос',
            'chelina' => 'Едет ли на целину',
            'mesto_raboti' => 'Место прохождения целины',
            'snils' => 'СНИЛС',
            'note' => 'Примечания',
            'docs' => 'Документы',
            'stabs' => 'штаб',
            'id_user' => 'отряд',
        ];
    }

    public function getOrders()
    {
        return $this->hasMany(Question::className(), ['id_ustav' => 'id_ustav']);
    }
    
}
?>