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
class Viezd extends \yii\db\ActiveRecord
{


    const STAB_MEHAN = 'Штаб «Механ»';
    const STAB_UDGU = 'Штаб УдГУ';
    const STAB_GGPI = 'Штаб ГГПИ';
    const STAB_EGIDA = 'Штаб «Эгида»';
    const BEZ_STABA = 'Нет штаба';
    const VZNOS_ON = 'Внесен';
    const VZNOS_OFF = 'Не оплачен';
    const NAPR_SPO = 'СПО';
    const NAPR_SSO = 'ССО';
    const NAPR_SOP = 'СОП';
    const NAPR_SERV = 'СервСО';
    const NAPR_SVO = 'СВО';
    const NAPR_SMO = 'СМО';
    const KOMANDIR = 'Командир';
    const KOMISSAR = 'Комиссар';
    const METODIST = 'Методист';
    const STARIK = 'Старик';
    const BOECH = 'Боец';
    const KANDIDAT = 'Кандидат';
    const USTAV_ON = 'Сдан';
    const USTAV_OFF = 'Не проверен';
    const NOTE_ON = 'Есть замечания';
    const NOTE_OFF = 'Нет примечаний';
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
            'tip_uchebi' => 'Форма обучения',
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
}
