<?php

namespace app\modules\admin\models;

use app\models\Question;
use app\modules\admin\models\User;
use Mpdf\Mpdf;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "squad".
 *
 * @property int $id
 * @property string $name
 * @property string $familia
 * @property string $data_rozhdenia
 * @property string|null $inn
 * @property string|null $snils
 * @property string|null $mesto_uchebi
 * @property string|null $nomer_udostoverenia
 * @property string|null $telefon
 * @property string|null $dolznost
 * @property string|null $vznos
 * @property string|null $ustav
 * @property string|null $chelina
 * @property-read mixed $mehan
 * @property string|null $note
 * @property string|null $docs
 * @property string|null $napr
 *  * @property string|null $request
 */
class Squad extends \yii\db\ActiveRecord
{
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
//            ['status', 'default', 'value' => self::STAB_MEHAN],
//            ['status', 'in', 'range' => [self::STAB_MEHAN, self::STAB_UDGU,self::STAB_GGPI, self::STAB_EGIDA, self::BEZ_STABA,]],
            [['id'], 'integer'],
            [['data_rozhdenia'], 'string'],
            [['docs'], 'file', 'extensions' => ['zip', 'rar', 'gzip', '7zip']],
                        [['seria_passporta'], 'match', 'pattern' => '/^([0-9]{2}\s{1}[0-9]{2})?$/i', 'message' => 'Серия паспорта указана неверно. Например: 94 10'],

            [['nomer_passporta'], 'match', 'pattern' => '/^^([0-9]{6})?$/i', 'message' => 'Номер паспорта указана неверно. Например: 101010'],

            [['inn'], 'match', 'pattern' => '/^(([0-9]{12})|([0-9]{10}))?$/i', 'message' => 'ИНН указан неверно. Должно быть: 12345678901'],
    
            [['snils'], 'match', 'pattern' => '/^([0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3}\s{1}[0-9]{2})?$/i', 'message' => 'Снилс указан неверно. Укажите код в следующем формате: 123-123-123 12 '],

            [['kod_podrazdelenia'], 'match', 'pattern' => '/^([0-9]{3}[-]{1}[0-9]{3})?$/i', 'message' => 'Код подразделения указан неверно. Укажите код в формате 6 цифр, например: 180-000'],
 
            [['index_zitelstva'], 'match', 'pattern' => '/^([0-9]{6})?$/i', 'message' => 'Индекс указан неверно. Укажите индекс в формате 6 цифр, например: 123456'],

            [['telefon'], 'match', 'pattern' => '/^([8]{1}[0-9]{10})?$/i', 'message' => 'Номер телефона указан неверно. Укажите номер телефона в следующем формате: 8963123111'],

            [['data_rozhdenia'], 'match', 'pattern' => '/^([0-9]{2}[.]{1}[0-9]{2}[.]{1}[0-9]{4})?$/i', 'message' => 'Дата рождения указана неверно. Укажите в следующем формате: 01.01.1900'],

            [['data_vidacha_passporta'], 'match', 'pattern' => '/^([0-9]{2}[.]{1}[0-9]{2}[.]{1}[0-9]{4})?$/i', 'message' => 'Дата выдачи паспорта  указана неверно. Укажите в следующем формате: 01.01.1900'],
            [['name',
                'familia',
                'otchestvo',
                'pol',
                'data_rozhdenia',
                'telefon',
                'email',
                'seria_passporta',
                'nomer_passporta',
                'mesto_rozdenia',
                'kem_vidan_passport',
                'data_vidacha_passporta',
                'kod_podrazdelenia',
                'index_zitelstva',
                'adress_postoyannogo_prozivania',
                'fact_mesto_zitelstva',
                'snils',
                'inn',
                'stud_napravlenie',
                'otryad',
                'mesto_uchebi',
                'fakultet',
                'nomer_klass',
                'forma_obuchenia',
                'tip_uchebi',
                'nomer_udostoverenia',
                'dolznost',
                'mesto_raboti',
                'chelina',
                'ustav',
                'vznos',], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'time' => 'Отметка времени',
            'reg_otdelenie' => 'Региональное отделение',
            'region' => 'Регион',
            'familia' => 'Фамилия',
            'name' => 'Имя',
            'otchestvo' => 'Отчество',
            'pol' => 'Пол',
            'data_rozhdenia' => 'Дата рождения',
            'telefon' => 'Номер мобильного телефона',
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
            'stud_napravlenie'  => 'Направление деятельности отряда',
            'otryad' => 'Название отряда',
            'mesto_uchebi' => 'Место учебы (ВУЗ/ССУЗ/Школа)',
            'fakultet' => 'Факультет',
            'nomer_klass' => 'Номер группы/класс',
            'forma_obuchenia' => 'Форма обучения',
            'tip_uchebi' => 'Тип обучения',
            'vznos' => 'Взнос',
            'dolznost' =>'Должность',
            'ustav' => 'Устав',
            'docs' => 'Документы',
            'primechanie' => 'Примечание',
            'chelina' => 'целина',
            'nomer_udostoverenia' => 'номер удостоверения',
            'mesto_raboti' =>'Место работы',
        ];
    }
//    public function getStab()
//    {
//        return $this->hasOne(Stab::className(), ['id' => 'name_stab']); // обращение к таблице USER и просьба взять ID и забрать id_user
//    }
    public function getDocs()
    {
        return $this->docs;
    }
    // public static function findIdentity($id)
    // {
    //     return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    // }
    public function getOtryads()
    {
        return $this->hasOne(Structura::className(), ['id' => 'id_user']);
        // берется из таблицы *Squad* данные id_squad и приравнивается к таблице *id_ustav* таблицы Question
        //  Имеет значение то, где это находится, то есть последнее подбирает в той модели, где это происходит
    }
    public function getUstavs()
    {
        return $this->hasOne(Question::className(), ['id_ustav' => 'id_squad']);
        // берется из таблицы *Squad* данные id_squad и приравнивается к таблице *id_ustav* таблицы Question
        //  Имеет значение то, где это находится, то есть последнее подбирает в той модели, где это происходит
    }
//    public function getTest()
//    {
//        return $this->hasOne(Question::className(), ['id_user' => 'id']);
//        // берется из таблицы *Squad* данные id_squad и приравнивается к таблице *id_ustav* таблицы Question
//        //  Имеет значение то, где это находится, то есть последнее подбирает в той модели, где это происходит
//    }
public function getFresh()
{
     return $this->hasOne(User::className(), ['id' => 'id_user']);
}
}