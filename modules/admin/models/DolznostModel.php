<?php

namespace app\modules\admin\models;

use app\models\Cons;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class DolznostModel
{
    public static function dolznostList(): array
    {
        return [
            Cons::KOMANDIR => 'Командир',
            Cons::KOMISSAR => 'Комиссар',
            Cons::METODIST => 'Методист',
            Cons::STARIK => 'Старик',
            Cons::BOECH => 'Боец',
            Cons::KANDIDAT => 'Кандидат',
        ];
    }

    public static function dolznostName($stab): string
    {
        return ArrayHelper::getValue(self::dolznostList(), $stab);
    }

    public static function dolznostLabel($stab): string
    {
        switch ($stab) {
            case Cons::KOMANDIR:
                break;
            case Cons::KOMISSAR:
                break;
            case Cons::METODIST:
                break;
            case Cons::STARIK:
                break;
            case Cons::BOECH:
                break;
            case Cons::KANDIDAT:
                break;
        }

        return Html::tag('span', ArrayHelper::getValue(self::dolznostList(), $stab), [
        ]);
    }
}
