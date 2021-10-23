<?php


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SquadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\ButtonDropdown;

?>

</ol>
<div class="catalog-index">
    <ul>
        <header class="entry-header text-center text-uppercase">

        </header>    </ul>
</div>
<?php $gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'info',
//    [
//        'attribute' => 'napr',
//        'width'=> '10px',
//        'filter' => NaprModel::naprList(),
//        'value' => function (\app\models\Squad $model) {
//            return NaprModel::naprLabel($model->napr);
//        },
//        'format' => 'raw',
//    ],

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
                                'url' => ['/info/view', 'id' => $key],
                            ],
                            [
                                'label' => \Yii::t('yii', 'Update'),
                                'url' => ['/info/update', 'id' => $key],
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
                                'url' => ['/info/delete', 'id' => $key],
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

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
]); ?>

