<?php


namespace app\models;

use app\models\operations\Operation;
use Yii;
use yii\base\BaseObject;

/**
 * @property float $memorizedData usual calculation memory
 * @property float $deeplyMemorizedData memory for M buttons
 * @property string $memorizedOperation operation in memory
 */
class Calculator extends BaseObject
{
    private static string $mem_data_session_key = 'memorized_value';
    private static string $deep_mem_data_session_key = 'deeply_memorized_value';
    private static string $mem_operation_session_key = 'memorized_operation';

    private ?Operation $operation;

    public function __construct(Operation $operation = null)
    {
        parent::__construct();
        if (!is_null($operation)) {
            $this->operation = $operation;
            $this->operation->calculatorInstance = $this;
        }
    }

    /**
     * @return array
     */
    public function execOperation(): array
    {
        if (!is_null($this->operation)) {
            return ['resultValue' => $this->operation->executeOperation()];
        } else {
            return ['resultValue' => ''];
        }
    }

    public function unsetMemorizedData()
    {
        Yii::$app->session->remove(self::$mem_data_session_key);
    }

    public function unsetMemorizedOperation()
    {
        Yii::$app->session->remove(self::$mem_operation_session_key);

    }

    public function unsetDeeplyMemorizedData()
    {
        Yii::$app->session->remove(self::$deep_mem_data_session_key);
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

    public function getMemorizedOperation(): string
    {
        return Yii::$app->session->get(self::$mem_operation_session_key) ?? EvalTypes::add;
    }

    public function setMemorizedOperation(string $operation)
    {
        if (Calculator::isAllowedOperation($operation)) {
            Yii::$app->session->set(self::$mem_operation_session_key, $operation);
        }
    }

    public static function isAllowedOperation(string $operation): bool
    {
        $reflection_types_class = new \ReflectionClass(EvalTypes::class);
        return array_key_exists($operation, array_flip($reflection_types_class->getConstants()));
    }
}