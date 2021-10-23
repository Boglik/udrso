<?php

namespace app\models;
use app\modules\admin\models\Category;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $anonce
 * @property string|null $text
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{material}}';
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

    public static function getBlog() //вывод данных на главную страницу
    {
        $data = self::find()->limit(4)->orderBy('id DESC')->all();
        return $data;
    }

    public static function getAll() //вывод данных на главную страницу
    {

        $data = self::find()->orderBy('id DESC')->all();
        return $data;
    }
    public static function getArticle()
    {
        $model = self::find()->where(['alias' => $slug])->all();
        return $model;
    }
    public static function getDocument()
    {   $id_category = 10;
        $model = self::find()->where('id_category = :id_category', [':id_category' => $id_category])->one();
        return $model;
    }
}
