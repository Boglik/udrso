<?php

    namespace app\modules\kabinet\models;

use Yii;

/**
 * This is the model class for table "zakaz".
 *
 * @property int $id
 * @property string|null $data
 * @property string $chelinka
 * @property string $znachki
 * @property string|null $atributika
 * @property string|null $primechania
 * @property string|null $text_primechania
 * @property string|null $status_zakaza
 * @property string|null $id_user
 * @property string|null $stab
 * @property string|null $napr
 */
class Zakaz extends \yii\db\ActiveRecord
{
    const ZAKAZ_V_OBRABOTKE = 1; //в обработке
    const ZAKAZ_VIPOLNEN = 2; //выполнен
    const ZAKAZ_OTKLONEN = 3; //выполнен

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{zakaz}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'required'],
//            ['status_zakaza', 'default', 'value' => self::ZAKAZ_V_OBRABOTKE],
//            ['status_zakaza', 'in', 'range' => [self::ZAKAZ_VIPOLNEN, self::ZAKAZ_OTKLONEN]],
            [['atributika'], 'string'],
            [['data'], 'string', 'max' => 50],
            [['chelinka', 'znachki', 'primechania'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Дата формирования заказа',
            'chelinka' => 'Количество целинок',
            'znachki' => 'Количество значков',
            'atributika' => 'Прочая атрибутика',
            'primechania' => 'Примечание',
            'text_primechania' => 'Текст примечания',
            'status_zakaza' => 'Статус',
            'id_user' => 'Id User',
            'stab' => 'Stab',
            'napr' => 'Napr',
        ];
    }
}
