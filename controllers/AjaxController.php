<?php


namespace app\controllers;

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
    public function actionEvaluate(){
        //TODO write the body
    }

}