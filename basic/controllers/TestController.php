<?php

namespace app\controllers;

use app\components\TestService;
use app\models\Product;
use yii\web\Controller;

class TestController extends Controller
{
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionIndex()
    {
        return \Yii::$app->test->run();


        $product = new Product([
            'id' => 1,
            'name' => 'Red dress',
            'price' => 7500,
            'category' => 'dresses',
        ]);
        // $product->id = 1;
        //$product->name = 'Red dress';
        //$product->price =  7500;
        //$product->category = 'dresses';

        return $this->render('index', [
            'data' => 'Данные',
            'product' => $product,
        ]); //$this->render('about');
    }
}
