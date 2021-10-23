<?php

namespace app\modules\admin\models;
/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property-read mixed $articles
 * @property-read mixed $articlesCount
 * @property string $title
 */
class Dolznosti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{dolznosti}}';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

}
