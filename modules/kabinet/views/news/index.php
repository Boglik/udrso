<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;
?>
<?php if (!empty($posts)): ?>
    <?php foreach($posts as $post): ?>
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"> <a href="<?= yii\helpers\Url::to(['/kabinet/news/view', 'id' => $post->id])?>"><?=$post->title?></a></h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
  <b></b>&nbsp;<?=$post->anonce?><br>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
  <?= Html::a(Yii::t('app', 'далее'), ['/kabinet/news/view', 'id' => $post->id], ['class' => 'btn btn-info']) ?>
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<?php endforeach; ?>
    <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
<?php endif; ?>

        