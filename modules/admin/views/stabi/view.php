<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zakaz */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Штабы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stabi-view">

 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'text',
                'label' => 'Информация',
                'format' => 'html'
            ],
         ],
    ]) ?>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/stabi/index'], ['class' => 'btn btn-danger']) ?>
</div>
