<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ZayavkaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a(Yii::t('app', 'Создать форму заявки'), ['/zayavka/add/'], ['class' => 'btn btn-info']) ?><br><br>
<div class="zayavka-index">
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'title',
        'data',

        ['attribute' => 'otryad',
            'value' => 'zayavka.name'], // к чему привязываем. К таблице заявке и поле нэйм
        ['class' => 'yii\grid\ActionColumn'],

    ];

    // Renders a export dropdown menu
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);

    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns
    ]);
    ?>

</div>
