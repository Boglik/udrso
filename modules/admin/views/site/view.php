
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
?>

<!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><?=$post->title?></a></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        &nbsp;<?=$post->text?>

                    </div>

                </div>
                <!-- /.row -->
                <br>
                <?= Html::a(Yii::t('app', 'назад'), ['/admin/feed', 'id' => $post->id], ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Новость является внутренним сообщением
            </div>
        </div>
