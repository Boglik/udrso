<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\bootstrap4\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MeropriyatiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meropriyatia-index">

    <p>
        <?= Html::a(Yii::t('app', 'Создать заявку на мероприятие'), ['/kabinet/zayavka/create'], ['class' => 'btn btn-warning']) ?>
    &nbsp;
<?= Html::a(Yii::t('app', 'Оставить обратную связь'), ['/kabinet/os/create'], ['class' => 'btn btn-danger']) ?></p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'class' => ActionColumn::className(),
        'columns' => [
            [
                'header' => '#',
                'value' => function ($model, $key, $index, $column) {
                    return $column->grid->dataProvider->totalCount - $index + 0;
                }
            ],

//            'id',
            'title',
            'anonce',
            'data',
'dataend',
//            'id_user',
[
    'class' => 'yii\grid\ActionColumn',
    'template' => '{all}',
    'buttons' => [
        'all' => function ($url, $model, $key) {
            return ButtonDropdown::widget([
                'encodeLabel' => false, // if you're going to use html on the button label
                'label' => 'Опции',
                'dropdown' => [
                    'encodeLabels' => false, // if you're going to use html on the items' labels
                    'items' => [
                        [
                            'label' => \Yii::t('yii', 'View'),
                            'url' => ['/kabinet/meropriyatia/view', 'id' => $key],
                        ],

 
                    ],
                    'options' => [
                        'class' => 'dropdown-menu-right', // right dropdown
                    ],
                ],
                'options' => [
                    'class' => 'btn-default',   // btn-success, btn-info, et cetera
                ],
                'split' => true,    // if you want a split button
            ]);
        },
    ],
],
            ],
    ]); ?>


</div>
