<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Squad;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class StabModel
{
    public static function stabList(): array
    {
        return [
            Squad::STAB_MEHAN => 'Механ',
            Squad::STAB_UDGU => 'Удгу',
            Squad::STAB_GGPI => 'ГГПИ',
            Squad::STAB_EGIDA => 'ЭГИДА',
            Squad::BEZ_STABA => 'Без штаба',
        ];
    }

    public static function stabName($stab): string
    {
        return ArrayHelper::getValue(self::stabList(), $stab);
    }

    public static function stabLabel($stab): string
    {
        switch ($stab) {
            case Squad::STAB_GGPI:
                $class = 'label label-info';
                break;
            case Squad::STAB_MEHAN:
                $class = 'label label-danger';
                break;
            case Squad::STAB_UDGU:
                $class = 'label label-success';
                break;
            case Squad::BEZ_STABA:
                $class = 'label label-default';
                break;
            case Squad::STAB_EGIDA:
                $class = 'label label-warning';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::stabList(), $stab), [
            'class' => $class,
        ]);
    }
}