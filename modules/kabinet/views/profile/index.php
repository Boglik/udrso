<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
?>
<div class="user-profile">

    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update'], ['class' => 'btn btn-primary']) ?>

    <?= Html::a("Назад", ['/kabinet/news'], ['class' => 'btn btn-primary']);?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'info',
                'label' => 'Информация о сайте',
                'format' => 'html'
            ],
        ],
    ]) ?>

</div>