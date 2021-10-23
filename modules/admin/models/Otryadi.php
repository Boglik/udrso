<?php

namespace app\modules\admin\models;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $anonce
 * @property string|null $text
 */

class Otryadi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{user}}';
    }

     
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'alias',//default name slug
            ],
        ];
    }

    public static function getSpoMehan()
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all(); 

        $data = self::find()->where(['id_stab' => '1', 'id_direction' => '1'])->orderBy(['id' => SORT_ASC])->all();
        
           return $data;
    }
}