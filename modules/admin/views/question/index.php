
<?php

use app\modules\kabinet\models\Squad;
use kartik\bs4dropdown\ButtonDropdown;
use kartik\export\ExportMenu;
use app\models\Qquestion;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Category;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SquadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->title = 'Проверка устава';
$this->params['breadcrumbs'][] = $this->title;
 ?>

<!-- <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/admin/web/">Главная</a></li>
  <li class="breadcrumb-item active"><a onclick="javascript:history.back(-2); return false;">Отряды</a></li>
  <li class="breadcrumb-item active">Выездной список</li>

</ol> -->
<div class="catalog-index">
    <ul>
        <header class="entry-header text-center text-uppercase">

        </header>    </ul>
</div>
<?php

$gridColumns = [
                [
                'header' => '#',
                'value' => function ($model, $key, $index, $column) {
                    return $column->grid->dataProvider->totalCount - $index + 0;
                }
            ],
    'question',
    ['label' => 'Имя', 'value'=>'role.name'], // указываем атрибут приватного поля roleName в модели, имя и что хотим вытянуть
    ['attribute' => 'roleName','label' => 'Фамилия', 'value'=>'role.familia'],
    'note',

    
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
                                'label' => \Yii::t('yii', 'Проверить'),
                                'url' => ['/admin/question/view', 'id' => $key],
                            ],
                            [
                                'label' => \Yii::t('yii', 'Delete'),
                                'linkOptions' => [
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => \Yii::t('yii', 'Вы действительно хотите удалить это?'),
                                    ],
                                ],
                                'url' => ['/admin/question/delete', 'id' => $key],
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
        ['attribute' => 'roleName','label' => 'Имя', 'value'=>'role.name'], // указываем атрибут приватного поля roleName в модели, имя и что хотим вытянуть
        ['attribute' => 'roleName','label' => 'Фамилия', 'value'=>'role.familia'],
        ['attribute' => 'roleName','label' => 'Отряд', 'value'=>'role.otryad'],
        'note',
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
