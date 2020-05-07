<?php


namespace app\controllers;

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
        $data=Yii::$app->request->post();

    }
    public function actionEvaluateBinary(){
        //TODO write the body
        $data=Yii::$app->request->post();

    }
    public function actionWorkWithMemory(){
        //TODO write the body
        $data=Yii::$app->request->post();

    }

}