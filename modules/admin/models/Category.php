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
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{category}}';
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Категории',
        ];
    }
    public function getArticles()
    {
        return $this->hasMany(Blog::className(), ['id_category' => 'id']);
    }
    public function getDocuments()
    {
        return $this->hasMany(Material::className(), ['id_category' => 'id']);
    }
}
