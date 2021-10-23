<?php

namespace app\modules\admin\models;

use app\models\Cons;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class VznosModel
{
    public static function VznosList(): array
    {
        return [
            Cons::VZNOS_ON => 'Внесен',
            Cons::VZNOS_OFF => 'Не оплачен',
         ];
    }

    public static function VznosName($stab): string
    {
        return ArrayHelper::getValue(self::dolznostList(), $stab);
    }

    public static function VznosLabel($stab): string
    {
        switch ($stab) {
            case Cons::VZNOS_ON:
                break;
            case Cons::VZNOS_OFF:
        }

        return Html::tag('span', ArrayHelper::getValue(self::VznosList(), $stab), [
        ]);
    }
}
