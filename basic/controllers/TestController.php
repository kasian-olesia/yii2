<?php

namespace app\controllers;

use app\components\TestService;
use app\models\Product;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex()
    {
        //$product = new Product();
//        $data = [
//            'id' => 11,
//            'name' => 'pink shoes',
//            'price' => '15000',
//            'category' => 'shoes'
//        ];
//        $product->name = ' <b>Red dress</b> ';
//        $product->price = 7500;
//        $product->created_at = time();



        $service = \Yii::$app->test->run();
        $product = Product::findOne(4);


//        $id = 2;
        $query = new Query();
        $data = $query->from('product')
            ->select(['id', 'price'])
            ->where(['id' => 1, 'price' => 180])
            ->all();
        _log($data);

        //_end($data);

        /*
                $product->setAttributes($data);
                $product->validate();
                //$product->getErrors();
                return VarDumper::dumpAsString($product->getAttributes(), 4, true);
        */

        //\Yii::info('success', 'pay');
        return $this->render('index', [
            'title' => 'Yii2',
            'content' => 'Kasianova',
            'service' => $service,
            'product' => $product,
        ]);
    }
    public function actionInsert()
    {
        /*        \Yii::$app->db->createCommand()->insert('user',
                           [
                               'username' => 'Ilyin',
                               'password_hash' => '4d43075f14',
                               'auth_key' => 'key_1',
                               'creator_id' => 1,
                               'updater_id' => 2,
                               'created_at' => 2147483647,
                               'updated_at' => 2147483647,
                           ])->execute();
                       \Yii::$app->db->createCommand()->insert('user',
                           [
                               'username' => 'Vasiliev',
                               'password_hash' => 'f4e5da32dd',
                               'auth_key' => 'key_2',
                               'creator_id' => 2,
                               'updater_id' => 3,
                               'created_at' => 2147483647,
                               'updated_at' => 2147483647,
                           ])->execute();
                       \Yii::$app->db->createCommand()->insert('user',
                           [
                               'username' => 'Smirnov',
                               'password_hash' => 'ed585d7a21',
                               'auth_key' => 'key_3',
                               'creator_id' => 3,
                               'updater_id' => 1,
                               'created_at' => 2147483647,
                               'updated_at' => 2147483647,
                           ])->execute();
                      \Yii::$app->db->createCommand()->insert('user',
                           [
                               'username' => 'Kasyanov',
                               'password_hash' => '0cf555b2b6',
                               'auth_key' => 'key_4',
                               'creator_id' => 4,
                               'updater_id' => 3,
                               'created_at' => 2147483647,
                               'updated_at' => 2147483647,
                           ])->execute();*/
        \Yii::$app->db->createCommand()->batchInsert('task',
            [
                'title',
                'description',
                'creator_id',
                'updater_id',
                'created_at',
                'updated_at'
            ],
            [
                ['task1', 'first task', 1, 2, 2147483647, 2147483647],
                ['task2', 'second task', 2, 3, 2147483647, 2147483647],
                ['task3', 'third task', 3, 1, 2147483647, 2147483647],
                ['task4', 'fourth task', 4, 3, 2147483647, 2147483647],

            ])->execute();
    }
    public function actionSelect()
    {
        $query = new Query();
        $query1 = new Query();
        $query2 = new Query();
        $query3 = new Query();
        $data = $query->from('user')
            ->where(['id' => 1])
            ->all();
        $data1 = $query1->from('user')
            ->where(['>', 'id', '1'])
            ->orderBy(['username' => SORT_DESC])
            ->all();
        $data2 = $query2->from('user')->count('*');
        $data3 = $query3->from('task')
            ->innerJoin('user', 'user.id = task.creator_id')
            ->all();
        //_end($data);
        //_end($data1);
        _end($data3);
    }
}