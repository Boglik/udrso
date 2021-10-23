<?php

namespace app\modules\kabinet\models;

use Yii;

/**
 * This is the model class for table "squad".
 *
 * @property int $id
 * @property string $name
 * @property string $data_rozhdenia
 * @property string|null $familia
 * @property string|null $inn
 * @property string|null $snils
 * @property string|null $otchestvo
 * @property string|null $pol
 * @property string|null $forma_obuchenia
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
 *  * @property string|null $id_squad
 */
class Squad extends \yii\db\ActiveRecord {

    const VZNOS_OPLACHEN = 'Внесен';
    const VZNOS_NEOPLACHEN = 'Не оплачен';

    /**
     * @var int|mixed|string|null
     */
    private $id_user;
    private $id_stab;
    private $stab;
    private $napr;
    private $docs;

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
    public static function tableName() {
        return '{{squad}}';
    }

    public static function getParentsList() {
        
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
//            ['status', 'default', 'value' => self::STAB_MEHAN],
//            ['status', 'in', 'range' => [self::STAB_MEHAN, self::STAB_UDGU,self::STAB_GGPI, self::STAB_EGIDA, self::BEZ_STABA,]],
            [['id'], 'integer'],
            
            [['name'], 'string'], [['name'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['otchestvo'], 'string'], [['otchestvo'], 'required', 'message' => 'Это поле обязательно для заполнения'],
             [['pol'], 'string'], [['pol'], 'required', 'message' => 'Это поле обязательно для заполнения'],
             [['familia'], 'string'], [['familia'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['mesto_rozdenia'], 'string'],  [['mesto_rozdenia'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['data_rozhdenia'], 'string'], [['data_rozhdenia'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['data_rozhdenia'], 'string'], [['data_rozhdenia'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['kem_vidan_passport'], 'string'], [['kem_vidan_passport'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['adress_postoyannogo_prozivania'], 'string'], [['adress_postoyannogo_prozivania'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['fact_mesto_zitelstva'], 'string'], [['fact_mesto_zitelstva'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['mesto_uchebi'], 'string'], [['mesto_uchebi'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['fakultet'], 'string'], [['fakultet'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['nomer_klass'], 'string'], [['nomer_klass'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['tip_uchebi'], 'string'], [['tip_uchebi'], 'required', 'message' => 'Это поле обязательно для заполнения'],
             [['adress_postoyannogo_prozivania'], 'string'], [['adress_postoyannogo_prozivania'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['forma_obuchenia'], 'string'], [['forma_obuchenia'], 'required', 'message' => 'Это поле обязательно для заполнения'],
             [['mesto_raboti'], 'string'], [['mesto_raboti'], 'required', 'message' => 'Это поле обязательно для заполнения'],

            
            [['docs'], 'file', 'extensions' => ['zip', 'rar', 'gzip', '7zip']],
            [['id_user'], 'integer'],
            [['stabs'], 'integer'],
            [['seria_passporta'], 'match', 'pattern' => '/^([0-9]{2}\s{1}[0-9]{2})?$/i', 'message' => 'Серия паспорта указана неверно. Например: 94 10'],
            [['seria_passporta'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['nomer_passporta'], 'match', 'pattern' => '/^^([0-9]{6})?$/i', 'message' => 'Номер паспорта указана неверно. Например: 101010'],
            [['nomer_passporta'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['inn'], 'match', 'pattern' => '/^(([0-9]{12})|([0-9]{10}))?$/i', 'message' => 'ИНН указан неверно. Должно быть: 12345678901'],
            [['inn'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['snils'], 'match', 'pattern' => '/^([0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}\s{1}[0-9]{2})?$/i', 'message' => 'Снилс указан неверно. Укажите код в следующем формате: 123-123-123 12 '],
            [['snils'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['kod_podrazdelenia'], 'match', 'pattern' => '/^([0-9]{3}[-]{1}[0-9]{3})?$/i', 'message' => 'Код подразделения указан неверно. Укажите код в формате 6 цифр, например: 180-000'],
            [['kod_podrazdelenia'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['index_zitelstva'], 'match', 'pattern' => '/^([0-9]{6})?$/i', 'message' => 'Индекс указан неверно. Укажите индекс в формате 6 цифр, например: 123456'],
            [['index_zitelstva'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['telefon'], 'match', 'pattern' => '/^([8]{1}[0-9]{10})?$/i', 'message' => 'Номер телефона указан неверно. Укажите номер телефона в следующем формате: 8963123111'],
            [['telefon'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['data_rozhdenia'], 'match', 'pattern' => '/^([0-9]{2}[.]{1}[0-9]{2}[.]{1}[0-9]{4})?$/i', 'message' => 'Дата рождения указана неверно. Укажите в следующем формате: 01.01.1900'],
            [['data_rozhdenia'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['data_vidacha_passporta'], 'match', 'pattern' => '/^([0-9]{2}[.]{1}[0-9]{2}[.]{1}[0-9]{4})?$/i', 'message' => 'Дата выдачи паспорта  указана неверно. Укажите в следующем формате: 01.01.1900'],
            [['data_vidacha_passporta'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['time',
            'reg_otdelenie',
            'region',
            'familia',
            'name',
            'otchestvo',
            'pol',
            'email',
            'name_stab',
            'mesto_rozdenia',
            'kem_vidan_passport',
            'data_vidacha_passporta',
            'kod_podrazdelenia',
            'adress_postoyannogo_prozivania',
            'fact_mesto_zitelstva',
            //'snils',
            //'inn',
            'forma_obuchenia',
            'tip_uchebi',
            'name_stab',
            'nomer_udostoverenia',
            'mesto_raboti',
            'stud_napravlenie',
            'otryad',
            'mesto_uchebi',
            'fakultet',
            'forma_obuchenia',
            'tip_uchebi',
            'dolznost',
            'mesto_raboti',
            'chelina',
            'vznos',], 'string'], // одна строка - один валидатор
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'time' => 'Отметка времени',
            'reg_otdelenie' => 'Региональное отделение',
            'region' => 'Регион',
            'familia' => 'Фамилия',
            'name' => 'Имя',
            'otchestvo' => 'Отчество',
            'pol' => 'Пол',
            'data_rozhdenia' => 'Дата рождения',
            'telefon' => 'Телефон',
            'email' => 'E-mail',
            'seria_passporta' => 'Серия паспорта',
            'nomer_passporta' => 'Номер паспорта',
            'mesto_rozdenia' => 'Место рождения',
            'kem_vidan_passport' => 'Кем выдан',
            'data_vidacha_passporta' => 'Дата выдачи паспорта',
            'kod_podrazdelenia' => 'Код подразделения',
            'index_zitelstva' => 'Индекс места жительства постоянной регистрации',
            'adress_postoyannogo_prozivania' => 'Адрес постоянной регистрации',
            'fact_mesto_zitelstva' => 'Адрес фактического места жительства',
            'snils' => 'ПСС, СНИЛС',
            'inn' => 'ИНН',
            'stud_napravlenie' => 'Направление деятельности отряда',
            'otryad' => 'Название отряда',
            'mesto_uchebi' => 'Место учебы (ВУЗ/ССУЗ/Школа)',
            'fakultet' => 'Факультет',
            'nomer_klass' => 'Номер группы/класс',
            'forma_obuchenia' => 'Форма обучения',
            'tip_uchebi' => 'Тип обучения',
            'vznos' => 'Взнос',
            'dolznost' => 'Должность',
            'ustav' => 'Устав',
            'docs' => 'Документы',
            'note' => 'Примечания',
            'chelina' => 'целина',
            'nomer_udostoverenia' => 'номер удостоверения',
            'mesto_raboti' => 'Место работы',
        ];
    }

    public function getDocs() {
        return $this->docs;
    }

}
