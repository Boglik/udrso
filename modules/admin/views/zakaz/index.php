<?php

use app\modules\admin\models\ZakazModel;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ZakazSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="zakaz-index">
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'data',
        'chelinka',
        'znachki',
        'atributika:ntext',
        //'primechania',
        //'text_primechania:ntext',
        [
            'attribute' => 'status_zakaza',
            'filter' => ZakazModel::zakazList(),
            'value' => function (\app\modules\admin\models\Zakaz $model) {
                return ZakazModel::zakazLabel($model->status_zakaza);
            },
            'format' => 'raw',
        ],
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
                                'url' => ['/admin/zakaz/view', 'id' => $key],
                            ],
                            [
                                'label' => \Yii::t('yii', 'Update'),
                                'url' => ['/admin/zakaz/update', 'id' => $key],
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
                                'url' => ['/admin/zakaz/delete', 'id' => $key],
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
]; ?>

<?= ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'data',
        'chelinka',
        'znachki',
        'atributika',
        'primechania',
        'text_primechania',
    ],
    'columnSelectorOptions'=>[
        'label' => 'Поля',

    ],

    'dropdownOptions' => [
        'fontAwesome' => true,
        'label' => 'Экспортировать',

    ]
]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
]); ?>
</div>
