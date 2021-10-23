<?php

use app\models\Cons;
use app\modules\kabinet\models\Social;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model frontend\models\social */
?>
<div class="social-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить соц акцию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'lider',
            'members',
            [
                'attribute' => 'docs',
                'value' => function (Social $data) {
                    return Html::a(Html::tag('div', 'скачать'), Url::to(['/' .  $data->docs]));
                },
                'format' => 'html',
            ],

            [
                'attribute' => 'text_primechania',
                'label' => 'Текст примечания',
                'format' => 'html'
            ],

//            'id_user',
            'data',
        ],
    ]) ?>

</div>
