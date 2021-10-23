<?php

use app\models\Zayavka;
use kartik\export\ExportMenu;
use app\models\NaprModel;
use app\models\Squad;
use app\models\StabModel;
use app\models\VznosModel;
use meysampg\formbuilder\FormBuilder;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SquadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/profile/admin/web/">Главная</a></li>
  <li class="breadcrumb-item active"><a onclick="javascript:history.back(-2); return false;">Отряды</a></li>
  <li class="breadcrumb-item active">Социальные акции</li>

</ol>
<div class="catalog-index">
    <ul>
        <header class="entry-header text-center text-uppercase">

        </header>    </ul>
</div>
<?php

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'title',
    'data',
    [
        'attribute' => 'file',
        'value' => function (Social $data) {
            return Html::a(Html::tag('div', 'скачать'), Url::to(['../../profile/web/' .  $data->file]));
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
                                'url' => ['/social/view', 'id' => $key],
                            ],
                            [
                                'label' => \Yii::t('yii', 'Update'),
                                'url' => ['/social/update', 'id' => $key],
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
                                'url' => ['/social/delete', 'id' => $key],
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
        'title',
        'data',
        'text',

    ],
    'columnSelectorOptions'=>[
        'label' => 'Поля',

    ],
    'fontAwesome' => true,
    'dropdownOptions' => [
        'label' => 'Экспортировать',
    ]
]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
]); ?>

