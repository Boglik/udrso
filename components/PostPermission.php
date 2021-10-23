<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\components;

use Yii;

/**
 * Description of PostPermission
 *
 * @author alex
 */
class PostPermission {
    /**
     * @param $model Post
     * @return boolean
     */
    public static function allowedToUpdate($model)
    {
        return $model->id_user = Yii::$app->user->identity->role;
    }
}
