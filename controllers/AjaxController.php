<?php


namespace app\controllers;

use app\models\Calculator;
use app\models\EvalTypes;
use app\models\operations\BinaryOperation;
use app\models\operations\MemoryOperation;
use app\models\operations\UnaryOperation;
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

    public function actionEvaluateUnary()
    {
        $calc = new Calculator(new UnaryOperation(Yii::$app->request->post()));
        return $calc->execOperation();
    }

    public function actionEvaluateBinary()
    {
        $calc = new Calculator(new BinaryOperation(Yii::$app->request->post()));
        return $calc->execOperation();

    }

    public function actionWorkWithMemory()
    {
        $calc = new Calculator(new MemoryOperation(Yii::$app->request->post()));
        return $calc->execOperation();

    }

    public function actionClearFlashMemory()
    {
        $calc = new Calculator();
        $calc->memorizedData = 0;
        $calc->memorizedOperation = EvalTypes::add;

    }

    public function actionEvaluate()
    {
        //TODO evaluate action
    }

}