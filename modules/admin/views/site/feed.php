
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
?>
<!-- SELECT2 EXAMPLE -->
        <?php if (!empty($posts)): ?>
            <?php foreach($posts as $post): ?>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= yii\helpers\Url::to(['feed/view', 'id' => $post->id])?>"><?=$post->title?></a></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <?=$post->anonce?>

            </div>

        </div>
        <!-- /.row -->
        <br>
        <?= Html::a(Yii::t('app', 'далее'), ['feed/view', 'id' => $post->id], ['class' => 'btn btn-info']) ?>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Новость является внутренним сообщением
    </div>
</div>
            <?php endforeach; ?>
            <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
        <?php endif; ?>