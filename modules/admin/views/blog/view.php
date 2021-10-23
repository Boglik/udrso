<?php

use app\models\Blog;
use frontend\models\Zayavka;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

?>
<div class="squad-view">

    <p>        <?= Html::a(Yii::t('app', 'Создать новость'), ['/admin/blog/create'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Обновить информацию', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/blog/index'], ['class' => 'btn btn-danger']) ?>
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
        ],
    ]) ?>

</div>
