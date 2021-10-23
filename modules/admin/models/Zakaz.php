<?php

namespace app\modules\admin\models;

use app\models\Cons;
use app\models\User;
use yii\db\ActiveRecord;

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
 * @property string|null $otryad
 *
 */
class Zakaz extends ActiveRecord
{
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
            ['status_zakaza', 'default', 'value' => Cons::ZAKAZ_V_OBRABOTKE],
            ['status_zakaza', 'in', 'range' => [Cons::ZAKAZ_V_OBRABOTKE, Cons::ZAKAZ_VIPOLNEN, Cons::ZAKAZ_OTKLONEN]],
            [['chelinka', 'znachki'], 'required'],
            [['atributika', 'text_primechania'], 'string'],
            [['data', 'status_zakaza', 'id_user'], 'string', 'max' => 50],
            [['chelinka', 'znachki', 'primechania', 'stabs', 'napr'], 'string', 'max' => 255],
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
            'stabs' => 'Штаб',
            'napr' => 'Направление',
            'otryad' => 'Отряд',
        ];
    }
    public function getMehan()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']); // обращение к таблице USER и просьба взять ID и забрать id_user
    }
}
