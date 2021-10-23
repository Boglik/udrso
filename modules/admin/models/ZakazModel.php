<?php

namespace app\modules\admin\models;

use app\models\Cons;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ZakazModel
{
    public static function zakazList(): array
    {
        return [
            Cons::ZAKAZ_V_OBRABOTKE => 'Заказ в обработке',
            Cons::ZAKAZ_VIPOLNEN => 'Заказ выполнен',
            Cons::ZAKAZ_OTKLONEN => 'Заказ отклонен',
        ];
    }

    public static function zakazName($stab): string
    {
        return ArrayHelper::getValue(self::zakazList(), $stab);
    }

    public static function zakazLabel($stab): string
    {
        switch ($stab) {
            case Cons::ZAKAZ_V_OBRABOTKE:
                $class = 'label label-info';
                break;
            case Cons::ZAKAZ_VIPOLNEN:
                $class = 'label label-success';
                break;
            case Cons::ZAKAZ_OTKLONEN:
                $class = 'label label-warning';
                break;
        }

        return Html::tag('span', ArrayHelper::getValue(self::zakazList(), $stab), [
            'class' => $class,
        ]);
    }
}
