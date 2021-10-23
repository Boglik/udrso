<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;

class PaginationController extends Controller
{
    public function actionTest()
    {
        // Get page size from query strings
        $page_size = Yii::$app->request->get('per-page');
        $page_size = isset( $page_size ) ? intval($page_size) : 4;

        $provider = new ArrayDataProvider([
            'allModels' => $this->getFakedModels(),
            'pagination' => [
                // Should not hard coded
                'pageSize' => $page_size,
            ],
            'sort' => [
                'attributes' => ['id'],
            ],
        ]);

        return $this->render('test', ['listDataProvider' => $provider]);
    }

    // private function getFakedModels()
    // {
    //     $rawData = [];

    //     for ($i=1; $i < 18; $i++) {
    //         $item = [
    //             'id' => $i,
    //             'title' => 'Title ' . $i,
    //         ];

    //         $rawData[] = $item;
    //     }

    //     return $rawData;
    // }
}