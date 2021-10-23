<?php

use kartik\bs4dropdown\ButtonDropdown;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\Blogsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Руководители Регионального и местного штаба';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= Html::a(Yii::t('app', 'создать должность'), ['/admin/pravlenie/create'], ['class' => 'btn btn-danger']) ?>
<div class="squad-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'dolznost',
            [
                'attribute' => 'images',
                'label' => 'Фотография',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::to('/' . $data->images),[
                        'alt'=>'изображение',
                        'style' => 'width:140px;'
                    ]);
                },
            ],
            'stab',
            // 'anonce',
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
                                        'url' => ['/admin/pravlenie/view', 'id' => $key],
                                    ],
                                    [
                                        'label' => \Yii::t('yii', 'Update'),
                                        'url' => ['/admin/pravlenie/update', 'id' => $key],
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
                                        'url' => ['/admin/pravlenie/delete', 'id' => $key],
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
