<?php

namespace app\models;

use understeam\calendar\ItemInterface;
use understeam\calendar\ActiveRecordItemTrait;
use yii\behaviors\SluggableBehavior;



class Event extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{events}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'start_event', 'end_event'], 'string'],
        ];
    }
    public static function getAll() //вывод данных на главную страницу
    {
        $data = self::find()->all();
        return $data;
    }

}
