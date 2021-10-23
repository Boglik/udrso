<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Squad;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class NaprModel
{
    public static function naprList(): array
    {
        return [
            Squad::NAPR_SPO => 'СПО',
            Squad::NAPR_SSO => 'ССО',
            Squad::NAPR_SOP => 'СОП',
            Squad::NAPR_SERV => 'ССервО',
            Squad::NAPR_SVO => 'СВО',
            Squad::NAPR_SMO => 'СМО',
        ];
    }

    public static function naprName($stab): string
    {
        return ArrayHelper::getValue(self::naprList(), $stab);
    }

    public static function naprLabel($stab): string
    {
        switch ($stab) {
            case Squad::NAPR_SPO:
                $class = 'label label-info';
                break;
            case Squad::NAPR_SSO:
                $class = 'label label-danger';
                break;
            case Squad::NAPR_SOP:
                $class = 'label label-success';
                break;
            case Squad::NAPR_SERV:
                $class = 'label label-default';
                break;
            case Squad::NAPR_SVO:
                $class = 'label label-warning';
                break;
            case Squad::NAPR_SMO;
                $class = 'label label-default';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::naprList(), $stab), [
            'class' => $class,
        ]);
    }
}