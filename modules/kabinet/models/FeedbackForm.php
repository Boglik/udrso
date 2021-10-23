<?php


# models/FeedbackForm.php
namespace app\modules\kabinet\models;

use Yii;
use yii\base\Model;

class FeedbackForm extends Model
{
    // создание полей для формы
    public $name;
    public $email;
}