
<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use yii\widgets\Breadcrumbs;
use kartik\export\ExportMenu;
use app\modules\admin\models\Squad;
use kartik\bs4dropdown\ButtonDropdown;
use app\modules\admin\models\NoteModel;
use app\modules\admin\models\VznosModel;
use app\modules\admin\models\DolznostModel;
use app\modules\admin\models\UstavModel;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SquadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 ?>
<div class="catalog-index">
    <ul>
        <header class="entry-header text-center text-uppercase">

        </header>    </ul>
</div>
<?php

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'nomer_udostoverenia',
    'name',
    'familia',
    'data_rozhdenia',
    'telefon',
    [
        'attribute' => 'vznos',
        'filter' => VznosModel::vznosList(),
        'value' => function (\app\modules\admin\models\Squad $model) {
            return VznosModel::vznosLabel($model->vznos);
        },
        'format' => 'raw',
    ],
    [
        'attribute' => 'dolznost',
        'filter' => DolznostModel::dolznostList(),
        'value' => function (\app\modules\admin\models\Squad $model) {
            return DolznostModel::dolznostLabel($model->dolznost);
        },
        'format' => 'raw',
    ],
    [
        'attribute' => 'docs',
        'value' => function (Squad $data) {
                                return Html::a(Html::tag('div', 'скачать'), Url::to(['/admin/squad/download?id=' .  $data->id]));
        },
        'format' => 'html',
    ],
    'ustav',
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
                                'url' => ['/admin/squad/view', 'id' => $key],
                            ],
                            [
                                'label' => \Yii::t('yii', 'Update'),
                                'url' => ['/admin/squad/update', 'id' => $key],
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
                                'url' => ['/admin/squad/delete', 'id' => $key],
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

];
?>

<?= ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'time',
        'reg_otdelenie',
        'region',
        'familia',
        'name',
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
        ['label' => 'Отряд', 'value'=>'otryads.name_otryad'],
        'mesto_uchebi',
        'fakultet',
        'nomer_klass',
        'forma_obuchenia',
        'tip_uchebi',
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
