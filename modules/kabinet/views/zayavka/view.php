<?php


use app\modules\kabinet\models\Zayavka;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Zayavka */
?>
<div class="squad-view">

    <p>
        <?= Html::a('Обновить информацию', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                              <?= Html::a(Yii::t('app', 'Отменить'), ['/kabinet/zayavka/'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'title',
            [
                'attribute' => 'text',
                'format' => 'html'
            ],
            [
                'attribute' => 'docs',
                'value' => function (Zayavka $data) {
                    return Html::a(Html::tag('div', 'скачать'), Url::to(['/' .  $data->docs]));
                },
                'format' => 'html',
            ],
            'data',
        ],
    ]) ?>

</div>
