<?php

namespace app\modules\admin\models;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class NoteModel
{
    public static function noteList(): array
    {
        return [
            Squad::NOTE_ON => 'Есть замечания',
            Squad::NOTE_OFF => 'Нет примечаний',
        ];
    }

    public static function noteName($stab): string
    {
        return ArrayHelper::getValue(self::noteList(), $stab);
    }

    public static function noteLabel($stab): string
    {
        switch ($stab) {
            case Squad::NOTE_OFF:
                $class = 'label label-success';
                break;
            case Squad::NOTE_ON:
                $class = 'label label-default';
                break;
        }

        return Html::tag('span', ArrayHelper::getValue(self::noteList(), $stab), [
            'class' => $class,
        ]);
    }
}
