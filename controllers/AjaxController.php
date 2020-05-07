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
            'corsFilter' => [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['http://localhost:3000', 'http://calc.info'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 86400,
                    'Access-Control-Expose-Headers' => []
                ]
            ],
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
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
        $calc->deeplyMemorizedData = 0;
        $calc->memorizedOperation = EvalTypes::add;

    }

    public function actionEvaluate()
    {
        //TODO evaluate action
    }

}