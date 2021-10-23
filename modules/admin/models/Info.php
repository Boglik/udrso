<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property string $title
 * @property string $anonce
 * @property string|null $text
 * @property string|null $docs
 * @property string|null $note
 * @property string|null $text_primechania
 * @property int|null $id_user
 * @property int|null $stab_name
 * * @property int|null $napr
 * @property int|null $data
 *  @property string $otryad
 */
class Info extends \yii\db\ActiveRecord
{
    public $primechanie;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['info'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'info' => 'Информация',
        ];
    }
}
