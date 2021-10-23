<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Social;

/* @var $this yii\web\View */
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
                   <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/social', 'id' => $model->id_user], ['class' => 'btn btn-info']) ?>
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
