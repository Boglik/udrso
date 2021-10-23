<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Os */
?>
<div class="info-view">
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
   <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/otryad', 'id' => $model->id], ['class' => 'btn btn-danger']) ?></a><br><br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            [
                'attribute' => 'info',
                'format' => 'html'
            ],

        ],
    ]) ?>

</div>
