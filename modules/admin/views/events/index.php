<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Календарь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Загрузить план мероприятий'), ['add'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'отменить'), ['/admin/squad/'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'header' => '#',
                'value' => function ($model, $key, $index, $column) {
                    return $column->grid->dataProvider->totalCount - $index + 1;
                }
            ],
            'title',
            'start_event',
            'end_event',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
