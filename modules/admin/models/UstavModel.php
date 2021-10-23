<?php

namespace app\modules\admin\models;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Squad;

class UstavModel
{
    public static function ustavList(): array
    {
        return [
            Squad::USTAV_ON => 'Сдан',
            Squad::USTAV_OFF => 'Не проверен',
        ];
    }

    public static function ustavName($stab): string
    {
        return ArrayHelper::getValue(self::ustavList(), $stab);
    }

    public static function ustavLabel($stab): string
    {
        switch ($stab) {
            case Squad::USTAV_ON:
                $class = 'label label-success';
                break;
            case Squad::USTAV_OFF:
                $class = 'label label-default';
                break;
        }

        return Html::tag('span', ArrayHelper::getValue(self::ustavList(), $stab), [
            'class' => $class,
        ]);
    }
}
