<?php

namespace app\models;
use yii\behaviors\SluggableBehavior;
use Yii;
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

    // /**
    //  * {@inheritdoc}
    //  */
    // public function rules()
    // {
    //     return [
    //         [['name'], 'string'],
    //     ];
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function attributeLabels()
    // {
    //     return [
    //         'name' => 'Имя',
    //     ];
    // }
  
    public static function getAll(){
        $data = self::find()->all();
        return $data;
    }
    
    public static function getSpo() //Вывод данных на страницу СПО
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all(); 

        $data = self::find()->where(['id_napravlenie' => '1'])->orderBy(['username' => SORT_ASC])->all();
        
           return $data;
    }

    public static function getSop() //Вывод данных на страницу СОП
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();   
        $data = self::find()->where(['id_napravlenie' => '3'])->orderBy(['username' => SORT_ASC])->all();
        
           return $data;
    }

    public static function getSso() //Вывод данных на страницу ССО
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();   
        $data = self::find()->where(['id_napravlenie' => '2'])->orderBy(['username' => SORT_ASC])->all();
        
           return $data;
    }

    public static function getServ() //Вывод данных на страницу СЕРВ
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();   
        $data = self::find()->where(['id_napravlenie' => '4'])->orderBy(['username' => SORT_ASC])->all();
        
           return $data;
    }

    public static function getSvo() //Вывод данных на страницу СВО
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();   
        $data = self::find()->where(['id_napravlenie' => '5'])->orderBy(['username' => SORT_ASC])->all();
        
           return $data;
    }

    public static function getSmo() //Вывод данных на страницу СМО
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();   
        $data = self::find()->where(['id_napravlenie' => '6'])->orderBy(['username' => SORT_ASC])->all();
        
           return $data;
    }

    public static function getKsiv() //Вывод данных на страницу СМО
    {     //$data = self::find()->where(['id' => '9'])->limit(4)->orderBy('id DESC')->all();   
        $data = self::find()->where(['id_napravlenie' => '6'])->orderBy(['username' => SORT_ASC])->all();
        
           return $data;
    }

}
