<?php

use app\modules\admin\models\ZakazModel;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zakaz */

?>
<div class="zakaz-view">

 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'data',
            'chelinka',
            'znachki',
            'atributika:ntext',
            'primechania',
            [
                'attribute' => 'status_zakaza',
                'value' => function (\app\modules\admin\models\Zakaz $model) {
                    return ZakazModel::zakazLabel($model->status_zakaza);
                },
                'format' => 'raw',
            ],
//            'id_user',
//            'stab',
//            'napr',
        ],
    ]) ?>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/zakaz', 'id' => $model->id_user    ], ['class' => 'btn btn-danger']) ?>
</div>
