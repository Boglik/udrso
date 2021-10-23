<?php

namespace app\modules\kabinet\models;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class VznosModel
{
    public static function vznosList(): array
    {
        return [
            Squad::VZNOS_OPLACHEN => 'Внесен',
            Squad::VZNOS_NEOPLACHEN => 'Не оплачен',
        ];
    }

    public static function vznosName($stab): string
    {
        return ArrayHelper::getValue(self::vznosList(), $stab);
    }

    public static function vznosLabel($stab): string
    {
        switch ($stab) {
            case Squad::VZNOS_OPLACHEN:
                $class = 'label label-success';
                break;
            case Squad::VZNOS_NEOPLACHEN:
                $class = 'label label-default';
                break;
        }

        return Html::tag('span', ArrayHelper::getValue(self::vznosList(), $stab), [
            'class' => $class,
        ]);
    }
}
