<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */

$this->title = Yii::t('app', 'Просмотр профиля');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">

    <p>
        <?= Html::a(Yii::t('app', 'Редактировать профиль'), ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Сменить пароль'), ['password'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Изменить аватар'), ['avatar'], ['class' => 'btn btn-primary']) ?>

    </p>

<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'username',
//            'name',
//            'rating',
//        ],
//    ]) ?>

</div>