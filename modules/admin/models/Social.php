<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property string $anonce
 * @property string|null $text
 * @property string|null $file
 * @property string|null $note
 * @property int|null $id_user
 * @property int|null $data
 * @property int|null $stab_name
 * @property int|null $napr
 * @property string|null $docs
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */
    private $id_user;
    private $id_stab;
    private $stab_name;
    private $id_direction;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{social}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lider', 'members'], 'required'],
            [['id_user'], 'integer'],
            [['lider', 'members', 'data', 'annotation', 'actual', 'osn_chel_grup', 'chel_actii', 'zadachi_actii', 'itogi', 'docs','note','text_primechania','status'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lider' => 'Руководитель',
            'members' => 'Участники',
            'data' => 'Время акции',
            'annotation' => 'Кратная аннотация',
            'actual' => 'Актуальность',
            'osn_chel_grup' => 'Основные целевые группы',
            'chel_actii' => 'Основная целевая группа',
            'zadachi_actii' => 'Задачи акции',
            'itogi' => 'Итоги',
            'docs' => 'Прикрепленные документы',
            'status' => 'Статус',
        ];
    }
    public function getDocs()
    {
        return $this->docs;
    }
}
