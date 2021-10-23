<?php

use yii\helpers\Url;
use yii\helpers\Html;

use yii\grid\GridView;
use app\modules\kabinet\models\Squad;
use app\modules\kabinet\models\VznosModel;
use yii\bootstrap4\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SquadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список отряда';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="squad-index">


    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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

//            'id',
            'familia',
            'name',
            'data_rozhdenia',
//            'passport',
//            'inn',
            //'address_passport',
            //'adress_prozivania',
            //'mesto_uchebi',
            //'tip_uchebi',
            //'nomer_udostoverenia',
            [
                /**
                 * Название поля модели
                 */
                'attribute' => 'telefon',
                'filterOptions' => ['style' => 'width: 100px'],
            ],
//            'dolznost',
            [
                'attribute' => 'vznos',
                'filter' => VznosModel::vznosList(),
                'value' => function (Squad $model) {
                    return VznosModel::vznosLabel($model->vznos);
                },
                'format' => 'raw',
            ],

            ['attribute' => 'ustav',
            'filterOptions' => ['style' => 'width: 50px'],
            'format' => 'raw',
            'filter' => [
                'Не проверен' => 'Не проверен',
                'Сдан' => 'Сдан',
            ],
            'value' => function ($model, $key, $index, $column) {
                $active = $model->{$column->attribute} == 'Сдан';
                return \yii\helpers\Html::tag(
                    'span',
                    $active ? 'Сдан' : 'Не проверен',
                    [
                        'class' => 'label label-' . ($active ? 'success' : 'danger'),
                    ]
                );
            },
        ],

            ['attribute' => 'chelina',
            'filterOptions' => ['style' => 'width: 20px'],
                'format' => 'raw',
                'filter' => [
                    'Да' => 'Да',
                    'Нет' => 'Нет',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} == 'Да';
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Да' : 'Нет' ,
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],
    
            ['attribute' => 'note',
                'format' => 'raw',
                'filter' => [
                    'Нет примечаний' => 'Нет примечаний',
                    'Есть замечания' => 'Есть замечания',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute} == 'Нет примечаний';
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Нет примечаний' : 'Есть замечания',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
            ],
            [
                'attribute' => 'docs',
                'value' => function (Squad $data) {
                    return Html::a(Html::tag('div', 'скачать'), Url::to(['/kabinet/squad/download?id=' .  $data->id]));
                },
                'format' => 'html',
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
                                        'url' => ['/kabinet/squad/view', 'id' => $key],
                                    ],
                                    [
                                        'label' => \Yii::t('yii', 'Update'),
                                        'url' => ['/kabinet/squad/update', 'id' => $key],
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