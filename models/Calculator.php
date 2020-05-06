<?php


namespace app\models;

use Yii;
use yii\base\Model;

/**
 * @property float $memorizedData usual calculation memory
 * @property float $deeplyMemorizedData memory for M buttons
 */
class Calculator extends Model
{
    private static string $mem_data_session_key = 'memorized_value';
    private static string $deep_mem_data_session_key = 'deeply_memorized_value';

    public function getMemorizedData(): float
    {
        return Yii::$app->session->get(self::$mem_data_session_key) ?? 0;
    }

    public function setMemorizedData(float $val): void
    {
        Yii::$app->session->set(self::$mem_data_session_key, $val);
    }
    public function getDeeplyMemorizedData(): float
    {
        return Yii::$app->session->get(self::$deep_mem_data_session_key) ?? 0;
    }

    public function setDeeplyMemorizedData(float $val): void
    {
        Yii::$app->session->set(self::$deep_mem_data_session_key, $val);
    }
}