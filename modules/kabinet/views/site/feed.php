
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
?>
<!-- SELECT2 EXAMPLE -->
        <?php if (!empty($posts)): ?>
            <?php foreach($posts as $post): ?>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= yii\helpers\Url::to(['/kabinet/feed/view', 'id' => $post->id])?>"><?=$post->title?></a></h3>

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
        Новость является внутренним сообщением и публикации не подлежит
    </div>
</div>
            <?php endforeach; ?>
            <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
        <?php endif; ?>
<!-- /.card -->
<!--<div class="box">-->
<!--    <div class="box-header with-border">-->
<!--        <h3 class="box-title">Лента Новостей</h3>-->
<!---->
<!--        <div class="box-tools pull-right">-->
<!--            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">-->
<!--                <i class="fa fa-minus"></i></button>-->
<!--            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">-->
<!--                <i class="fa fa-times"></i></button>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="box-body" style="">-->
<?php ////if (Yii::$app->user->can('admin')) { ?>
<!--        --><?php //if (!empty($posts)): ?>
<!--            --><?php //foreach($posts as $post): ?>
<!--                <div class="panel panel-default">-->
<!--                    <div class="panel-heading">-->
<!--                        <h3 class="panel-title">-->
<!--                            <a href="--><?//= yii\helpers\Url::to(['feed/view', 'id' => $post->id])?><!--">--><?//=$post->title?><!--</a>-->
<!--                        </h3>-->
<!--                    </div>-->
<!--                    <div class="panel-body">-->
<!--                        <b></b>&nbsp;--><?//=$post->anonce?><!--<br>-->
<!--                        <br>-->
<!--                        --><?//= Html::a(Yii::t('app', 'далее'), ['feed/view', 'id' => $post->id], ['class' => 'btn btn-info']) ?>
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
<!--            --><?//= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
<!--        --><?php //endif; ?>
<!--        <!--            -->--><?php ////}?>
<!--    </div>-->
<!---->
<!--    <!-- /.box-body -->-->
<!--    <div class="box-footer" style="">-->
<!--        <!--            Сделано в Ижевске :)-->-->
<!--    </div>-->
<!--    <!-- /.box-footer-->-->
<!--</div>-->