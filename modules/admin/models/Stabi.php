<?php

namespace app\modules\admin\models;


/**
 * This is the model class for table "social".
 *
  */
class Stabi extends \yii\db\ActiveRecord
{
    public $primechanie;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{blog-stab}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя штаба',
            'text' => 'Описание',
        ];
    }
}
