<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Os */
?>
<div class="os-view">
<?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                 <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/os', 'id' => $model->id_user], ['class' => 'btn btn-danger']) ?><br>
        <br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'anonce',
            [
                'attribute' => 'text',
                'format' => 'html'
            ],

        ],
    ]) ?>

</div>
