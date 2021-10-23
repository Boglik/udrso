<?php
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;
?>
<?php

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <b>&nbsp;<?=$post->title?></a></b>
    </div>
    <div class="panel-body">
<?=$post->text?><br>
        <br>
        <a type="btn btn-danger" onclick="javascript:history.back(); return false;"><div class = 'btn btn-danger'>Назад</div></a>
    </div>
</div>


