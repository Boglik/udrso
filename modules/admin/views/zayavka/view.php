<?php

use yii\bootstrap\Html; ?>
  <div class="d-flex align-items-center p-3 my-3 text-white bg-success rounded shadow-sm">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Заявка №<?php echo $squad->id ?></h1>
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
           <h6 class="border-bottom pb-2 mb-0">Название социальной акции</h6>
    <div class="d-flex text-muted pt-3">
      <p class="pb-3 mb-0 small lh-sm border-bottom">
                   <?php echo $squad->title ?>
      </p>&nbsp;&nbsp;&nbsp;
    </div><br>
        <h6 class="border-bottom pb-2 mb-0">Статус</h6>
    <div class="d-flex text-muted pt-3">
      <p class="pb-3 mb-0 small lh-sm border-bottom">
                   <?php echo $squad->status ?>
      </p>&nbsp;&nbsp;&nbsp;
    </div><br>
            <h6 class="border-bottom pb-2 mb-0">Описание</h6>
    <div class="d-flex text-muted pt-3">
      <p class="pb-3 mb-0 small lh-sm border-bottom">
                   <?php echo $squad->text ?>
      </p>&nbsp;&nbsp;&nbsp;
    </div>

<?= Html::a(Yii::t('app', 'Редактировать'), ['/admin/zayavka/update', 'id' => $squad->id], ['class' => 'btn btn-success']) ?>&nbsp;
<?= Html::a(Yii::t('app', 'Отменить'), ['/admin/zayavka', 'id' => $squad->id_user], ['class' => 'btn btn-danger']) ?>
  </div>

 