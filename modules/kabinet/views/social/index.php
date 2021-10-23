<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\ButtonDropdown;
use app\modules\kabinet\models\Social;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\socialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories yii\data\ActiveDataProvider */

?>
<div class="social-index">

    <p>
        <?= Html::a('Добавить соц акцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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

//            'id',
            'lider',
            'members',
//            'text',
//            'file',

            //'id_user',
            //'data',
            ['attribute' => 'note',
                'label' =>'Примечания',
                'format' => 'raw',
                'filter' => [
                    '0' => 'Не имеются',
                    '1' => 'Имеются',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} == '0';
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Не имеются' : 'Имеются',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],
            [
                'attribute' => 'docs',
                'value' => function (Social $data) {
                    return Html::a(Html::tag('div', 'скачать'), Url::to(['/' .  $data->docs]));
                },
                'format' => 'html',
            ],
                        'status',
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
                                        'url' => ['/kabinet/social/view', 'id' => $key],
                                    ],
                                    [
                                        'label' => \Yii::t('yii', 'Update'),
                                        'url' => ['/kabinet/social/update', 'id' => $key],
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
                                        'url' => ['/kabinet/squad/delete', 'id' => $key],
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
