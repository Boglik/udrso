<?php

use app\models\Blog;

use app\modules\admin\models\Koster;
use kartik\bs4dropdown\ButtonDropdown;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Blogearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Костер+';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= Html::a(Yii::t('app', 'создать выпуск'), ['koster/create'], ['class' => 'btn btn-danger']) ?>
<div class="squad-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>
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
            [
                'attribute' => 'title',
                'label' => 'Номер журнала',
            ],
            [
                'attribute' => 'images',
                'label' => 'Картинка',
                'format' => 'html',
                'value' => function($data){
                    return Html::img(Url::to('/' . $data->images),[
                        'alt'=>'изображение',
                        'style' => 'width:140px;'
                    ]);
                },
            ],
            [
                'attribute' => 'files',
                'label' => 'Файл',
                'value' => function (Koster $data) {
                    return Html::a(Html::tag('div', 'скачать'), Url::to('/' .  $data->files));
                },
                'format' => 'html',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{all}',
                'buttons' => array(
                    'all' => function ($url, $model, $key) {
                        return ButtonDropdown::widget(array(
                            'encodeLabel' => false, // if you're going to use html on the button label
                            'label' => 'Опции',
                            'dropdown' => array(
                                'encodeLabels' => false, // if you're going to use html on the items' labels
                                'items' => array(
                                    array(
                                        'label' => \Yii::t('yii', 'View'),
                                        'url' => array('koster/view', 'id' => $key),
                                    ),
                                    array(
                                        'label' => \Yii::t('yii', 'Update'),
                                        'url' => array('koster/update', 'id' => $key),
                                        'visible' => true,  // if you want to hide an item based on a condition, use this
                                    ),
                                    array(
                                        'label' => \Yii::t('yii', 'Delete'),
                                        'linkOptions' => array(
                                            'data' => array(
                                                'method' => 'post',
                                                'confirm' => \Yii::t('yii', 'Вы действительно хотите удалить это?'),
                                            ),
                                        ),
                                        'url' => array('koster/delete', 'id' => $key),
                                        'visible' => true,   // same as above
                                    ),
                                ),
                                'options' => array(
                                    'class' => 'dropdown-menu-right', // right dropdown
                                ),
                            ),
                            'options' => array(
                                'class' => 'btn-default',   // btn-success, btn-info, et cetera
                            ),
                            'split' => true,    // if you want a split button
                        ));
                    },
                ),
            ],
        ],
    ]); ?>
</div>

