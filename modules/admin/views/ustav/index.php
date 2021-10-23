 
<?php

use app\models\Ustav;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Squad */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Проверка устава'];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="squad-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'отменить'), ['/squad'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'data_rozhdenia:ntext',
            'passport',
            'inn',

            'snils',
            'address_passport',
            'adress_prozivania',
            'mesto_uchebi',
            'tip_uchebi',
            'nomer_udostoverenia',
            'telefon',
            'dolznost',
            'chelina',
        ],
    ]) ?>

</div>
