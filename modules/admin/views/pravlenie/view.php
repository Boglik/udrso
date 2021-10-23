<?php

use app\models\Blog;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Руководители Регионального и местного штаба', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="squad-view">

    <p>        <?= Html::a(Yii::t('app', 'создать'), ['/admin/pravlenie/create'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Обновить информацию', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'отменить'), ['/blog'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'name',
          'dolznost',
          'stab',
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
