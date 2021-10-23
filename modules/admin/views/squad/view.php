
    <?php

use app\modules\admin\models\Squad;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
//        if (!Yii::$app->user->can('OwnSquad')) {
//        throw new ForbiddenHttpException('Access denied');
//    }
?>
<php 
<div class="squad-view">

    <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'Сформировать заявление'), ['/admin/squad/export', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
       <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/otryad', 'id' => $model->id_user], ['class' => 'btn btn-danger']) ?>
</br>
    </br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'nomer_udostoverenia',
            'name',
            'familia',
            'otchestvo',
            'pol',
            'data_rozhdenia',
            'telefon',
            'email',
            'seria_passporta',
            'nomer_passporta',
            'mesto_rozdenia',
            'kem_vidan_passport',
            'data_vidacha_passporta',
            'kod_podrazdelenia',
            'index_zitelstva',
            'adress_postoyannogo_prozivania',
            'fact_mesto_zitelstva',
            'snils',
            'inn',
            'mesto_uchebi',
            'fakultet',
            'nomer_klass',
            'forma_obuchenia',
            'tip_uchebi',
            'nomer_udostoverenia',
            'dolznost',
            'mesto_raboti',
            'chelina',
            'vznos',

            [
                'attribute' => 'primechanie',
                'label' => 'Примечания',
                'format' => 'html'
            ],
            [
                'attribute' => 'docs',
                'value' => function (Squad $data) {
                                        return Html::a(Html::tag('div', 'скачать'), Url::to(['/admin/squad/download?id=' .  $data->id]));
                },
                'format' => 'html',
            ],
        ],
    ])  ?>

</div>
