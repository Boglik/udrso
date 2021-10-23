<?php

use app\models\Blog;
use app\modules\admin\models\Koster;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Просмотр Костра', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="squad-view">

    <p>        <?= Html::a(Yii::t('app', 'Опубликовать выпуск Костер+'), ['/admin/koster/create'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Обновить информацию', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'отменить'), ['/blog'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'title',
                'label' => 'Номер журнала',
            ],
            [
                'attribute' => 'images',
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::to('/' . $data->images),[
                        'alt'=>'изображение',
                        'style' => 'width:340px;'
                    ]);
                },
            ],
          [
            'attribute' => 'files',
            'label' => 'Файл',
            'value' => function (Koster $data) {
                return Html::a(Html::tag('div', 'скачать'), Url::to('/' .  $data->files));
            },
            'format' => 'html',
        ],
        ],
    ]) ?>

</div>
