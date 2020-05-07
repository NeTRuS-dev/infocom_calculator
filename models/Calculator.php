<?php


namespace app\models;

use app\models\operations\Operation;
use Yii;
use yii\base\Model;

/**
 * @property float $memorizedData usual calculation memory
 * @property float $deeplyMemorizedData memory for M buttons
 * @property string $memorizedOperation operation in memory
 */
class Calculator extends Model
{
    private static string $mem_data_session_key = 'memorized_value';
    private static string $deep_mem_data_session_key = 'deeply_memorized_value';
    private static string $mem_operation_session_key = 'memorized_operation';

    private Operation $operation;

    public function __construct(Operation $operation)
    {
        parent::__construct();
        $this->operation = $operation;
        $this->operation->calculatorInstance = $this;
    }

    /**
     * @return array
     */
    public function execOperation(): array
    {
        return ['newDisplayValue' => $this->operation->executeOperation()];
    }

    public function getMemorizedData(): float
    {
        return floatval(Yii::$app->session->get(self::$mem_data_session_key) ?? 0);
    }

    public function setMemorizedData(float $val): void
    {
        Yii::$app->session->set(self::$mem_data_session_key, strval($val));
    }

    public function getDeeplyMemorizedData(): float
    {
        return floatval(Yii::$app->session->get(self::$deep_mem_data_session_key) ?? 0);
    }

    public function setDeeplyMemorizedData(float $val): void
    {
        Yii::$app->session->set(self::$deep_mem_data_session_key, strval($val));
    }

    public function getMemorizedOperation(): ?string
    {
        return Yii::$app->session->get(self::$mem_operation_session_key);
    }

    public function setMemorizedOperation(string $operation)
    {
        Yii::$app->session->set(self::$mem_operation_session_key, $operation);

    }
}