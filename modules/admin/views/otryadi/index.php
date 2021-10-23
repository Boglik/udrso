<?php

use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */


 ?>
<?php use yii\helpers\Html;

if (!empty($posts)): ?>
<?php foreach($posts as $post): ?>
<div class="col-md-3">
    <div class="box box-default box-solid">
        <div class="box-header with-border">
       
            <h3 class="box-title"><a href="<?= yii\helpers\Url::to(['/otryad', 'id' => $post->id])?>"><?=$post->name?></a></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
                <div class="box-body" style="">
                    <?= Html::a(Yii::t('app', 'Выездной список'), ['/otryad', 'id' => $post->id], ['class' => 'btn btn-info']) ?>
                    <br><br>
                    <?= Html::a(Yii::t('app', 'Заявки на мероприятия'), ['/zayavka', 'id' => $post->id], ['class' => 'btn btn-warning']) ?>

                    <br><br>
                    <?= Html::a(Yii::t('app', 'Социальные акции'), ['/social', 'id' => $post->id], ['class' => 'btn btn-info']) ?>
                    <br><br>
                    <?= Html::a(Yii::t('app', 'Обратная связь'), ['/os', 'id' => $post->id], ['class' => 'btn btn-primary']) ?>
                     <br><br>
                       <?= Html::a(Yii::t('app', 'Заказы'), ['/zakaz', 'id' => $post->id], ['class' => 'btn btn-success']) ?>
                       <br><br>
                       <?= Html::a(Yii::t('app', 'Информация об отряде'), ['/info', 'id' => $post->id], ['class' => 'btn btn-primary']) ?>
                </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
    <?php endforeach; ?>
    <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
<?php endif; ?>
<!--            --><?php //}?>
