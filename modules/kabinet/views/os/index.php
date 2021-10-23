<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обратная связь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'header' => '#',
                'value' => function ($model, $key, $index, $column) {
                    return $column->grid->dataProvider->totalCount - $index + 0;
                }
            ],
            'title',
            'anonce',
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
                                        'url' => ['/kabinet/os/view', 'id' => $key],
                                    ],
                                    [
                                        'label' => \Yii::t('yii', 'Update'),
                                        'url' => ['/kabinet/os/update', 'id' => $key],
                                        'visible' => true,  // if you want to hide an item based on a condition, use this
                                    ],
                                    [
                                        'label' => \Yii::t('yii', 'Delete'),
                                        'linkOptions' => [
                                            'data' => [
                                                'method' => 'post',
                                                'confirm' => \Yii::t('yii', 'Вы действительно хотите удалить это?'),
                                            ],
                                        ],
                                        'url' => ['/kabinet/os/delete', 'id' => $key],
                                        'visible' => true,   // same as above
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
