<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Zayavki_na_otryad;

class contact extends Widget
{

    public function run()
    {

        $model = new Zayavki_na_otryad();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            $model->name;
            $model->familia;
            $model->otchestvo;
            $model->telefon;
            $model->city;
            $model->mesto_uchebi;
                    $model->save();
                          }
                          return $this->renderFile('@app/views/site/success.php', ['model' => $model]);

    }

}