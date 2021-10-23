<?php
use yii\helpers\Html;
?>

<?= Html::a("Обновить информацию", ['/kabinet/blog-site/editor'], ['class' => 'btn btn-lg btn-primary']);?>


<?php echo $item->info ?>

