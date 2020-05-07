<?php


namespace app\controllers;

use app\models\BinaryOperation;
use app\models\Calculator;
use app\models\MemoryOperation;
use app\models\UnaryOperation;
use Yii;
use yii\filters\Cors;
use yii\web\Controller;
use yii\web\Response;

class AjaxController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'corsFilter' => [
                'class' => Cors::class,
            ]
        ];
    }
    public function actionEvaluateUnary(){
        //TODO write the body
        $calc=new Calculator(new UnaryOperation(Yii::$app->request->post()));

    }
    public function actionEvaluateBinary(){
        //TODO write the body
        $calc=new Calculator(new BinaryOperation(Yii::$app->request->post()));


    }
    public function actionWorkWithMemory(){
        //TODO write the body
        $calc=new Calculator(new MemoryOperation(Yii::$app->request->post()));


    }

}