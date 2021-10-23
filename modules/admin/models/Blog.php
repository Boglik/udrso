<?php

namespace app\modules\admin\models;

use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title
 * @property string $anonce
 * @property string $text
 * @property string|null $images
 * @property string|null $category
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{blog}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => null,
                'slugAttribute' => 'alias',
                'value' => function ($event){//return slug

                    $title = $this->owner->title;
                    $catId = $this->owner->id_category;

                    $cat = Category::findOne($catId);
                    $slug = $cat->alias."/".\yii\helpers\Inflector::slug($title,'-');
//                    var_dump($slug);die;
                    return $slug;
                },
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title'], 'required'],
            [['id_category'], 'required'],
            [['title', 'anonce','text','images','id_category'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'anonce' => 'Краткий заголовок',
            'text' => 'Описание',
            'images' => 'Изображение',
            'id_category' => 'Категории',
        ];
    }
    
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']); // обращение к таблице USER и просьба взять ID и забрать id_user
    }



}

