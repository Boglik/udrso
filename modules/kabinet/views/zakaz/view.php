<?php

use app\models\ZakazModel;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Zakaz */

$this->title = $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="zakaz-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->data], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить это?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'data',
            'chelinka',
            'znachki',
            'atributika:ntext',
            'primechania',
//            'text_primechania:ntext',
//            [
//                'attribute' => 'status_zakaza',
//                'value' => function (\frontend\models\Zakaz $model) {
//                    return ZakazModel::zakazLabel($model->status_zakaza);
//                },
//                'format' => 'raw',
//            ],
//            'id_user',
//            'stab',
//            'napr',
        ],
    ]) ?>

</div>
