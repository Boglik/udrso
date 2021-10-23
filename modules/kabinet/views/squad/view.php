<?php

use app\models\Cons;
use app\modules\kabinet\models\Squad;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;
/* @var $this View */
/* @var $model frontend\models\Squad */
$this->params['breadcrumbs'][] = ['label' => Cons::SPISOK_OTRYADA, 'url'=> '/kabinet/squad/'];
$this->params['breadcrumbs'][] = ['label' => $model->name . '' . $model->familia];
?>
<div class="squad-view">

    <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <a type="btn btn-danger" onclick="javascript:history.back(); return false;"><div class = 'btn btn-danger'>Отменить</div></a>
    </br>
    </br>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'familia',
            'otchestvo',
            'pol',
            'data_rozhdenia',
            'telefon',
            'email',
            'seria_passporta',
            'nomer_passporta',
            'mesto_rozdenia',
            'kem_vidan_passport',
            'data_vidacha_passporta',
            'kod_podrazdelenia',
            'index_zitelstva',
            'adress_postoyannogo_prozivania',
            'fact_mesto_zitelstva',
            'snils',
            'inn',
            'stud_napravlenie',
            'otryad',
            'mesto_uchebi',
            'fakultet',
            'forma_obuchenia',
            'tip_uchebi',
            'dolznost',
            'mesto_raboti',
            'chelina',
            'vznos',

            [
                'attribute' => 'primechanie',
                'label' => 'Примечания',
                'format' => 'html'
            ],
            [
                'attribute' => 'docs',
                'value' => function (Squad $data) {
                                       return Html::a(Html::tag('div', 'скачать'), Url::to(['/kabinet/squad/download?id=' .  $data->id]));
                },
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
