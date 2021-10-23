<?php

namespace app\modules\kabinet\models;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ZakazModel
{
    public static function zakazList(): array
    {
        return [
            Zakaz::ZAKAZ_V_OBRABOTKE => 'Заказ в обработке',
            Zakaz::ZAKAZ_VIPOLNEN => 'Заказ выполнен',
            Zakaz::ZAKAZ_OTKLONEN => 'Заказ отклонен',
        ];
    }

    public static function zakazName($stab): string
    {
        return ArrayHelper::getValue(self::zakazList(), $stab);
    }

    public static function zakazLabel($stab): string
    {
        switch ($stab) {
            case Zakaz::ZAKAZ_V_OBRABOTKE:
                $class = 'label label-info';
                break;
            case Zakaz::ZAKAZ_VIPOLNEN:
                $class = 'label label-success';
                break;
            case Zakaz::ZAKAZ_OTKLONEN:
                $class = 'label label-warning';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::zakazList(), $stab), [
            'class' => $class,
        ]);
    }
}