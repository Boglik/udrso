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
class Pravlenie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{pravlenie}}';
    }

//     public function behaviors()
//     {
//         return [
//             [
//                 'class' => SluggableBehavior::className(),
//                 'attribute' => null,
//                 'slugAttribute' => 'alias',
//                 'value' => function ($event){//return slug
                    
//                     $title = $this->owner->title;
//                     $catId = $this->owner->id_category;

//                     $cat = Category::findOne($catId);
//                     $slug = $cat->alias."/".\yii\helpers\Inflector::slug($title,'-');
// //                    var_dump($slug);die;
//                     return $slug;
//                 },
//             ],
//         ];
//     }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'dolznost','images', 'stab'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'dolznost' => 'Должность',
            'images' => 'Изображение',
            'stab' => 'Штаб',
      
        ];
    }

    public static function getPravlenie() //Вывод данных на страницу Костра
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();

        $data = self::find()->where(['in', 'dolznost', ['Председатель Правления УРО МООО «РСО»','Командир регионального штаба УРО МООО «РСО»','Комиссар регионального штаба УРО МООО «РСО»','Член Правления УРО МООО «РСО»']])->orderBy('id ASC')->all();

        return $data;
    }

        public static function getRegStab() //Вывод данных на страницу Костра
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();

        $data = self::find()->where(['in', 'dolznost', ['Командир регионального штаба УРО МООО «РСО»','Комиссар регионального штаба УРО МООО «РСО»','Комиссар регионального штаба УРО МООО «РСО»','Заместитель командира по студенческим отрядам проводников Удмуртской Республики', 'Заместитель командира по студенческим отрядам проводников Удмуртской Республики','Заместитель командира по студенческим педагогическим отрядам Удмуртской Республики​','Заместитель командира по студенческим строительным отрядам Удмуртской Республики​​','Специалист регионального штаба студенческих отрядов Удмуртской Республики','Руководитель пресс-службы студенческих отрядов Удмуртской Республики','Главный бухгалтер республиканского штаба']])->orderBy('id ASC')->all();

        return $data;
    }

}

