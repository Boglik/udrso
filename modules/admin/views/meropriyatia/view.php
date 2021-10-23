<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Meropriyatia */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятие', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="meropriyatia-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title',
            'anonce',
            [
                'attribute' => 'text',
                'format' => 'html'
            ],
            'data',
'dataend',
//            'id_user',
        ],
    ]) ?>

        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <a type="btn btn-danger" onclick="javascript:history.back(); return false;"><div class = 'btn btn-danger'>Отменить</div></a>

</div>
