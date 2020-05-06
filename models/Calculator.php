<?php


namespace app\models;

use Yii;
use yii\base\Model;

/**
 * @property float|null $memorizedData
 */
class Calculator extends Model
{
    private static string $mem_data_session_key = 'memorized_value';
    /**
     * @var float|null $_memorizedData
     */
    private ?float $_memorizedData;


    public function getMemorizedData()
    {
        $this->_memorizedData = Yii::$app->session->get(self::$mem_data_session_key);
        return $this->_memorizedData;
    }

    public function setMemorizedData(float $val)
    {
        $this->_memorizedData = $val;
        Yii::$app->session->set(self::$mem_data_session_key, $this->_memorizedData);
    }
}