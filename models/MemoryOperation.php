<?php


namespace app\models;


use yii\helpers\ArrayHelper;

class MemoryOperation extends Operation
{
    public string $rightValue;

    /**
     * Operation constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct();
        $this->attributes = $data;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['rightValue', 'required', 'when' => function (MemoryOperation $model) {
                return ($model->operation === EvalTypes::M_add || $model->operation === EvalTypes::M_sub);
            }],
        ]);
    }

    public function executeOperation(): string
    {
        // TODO: Implement executeOperation() method.
        if (!$this->validate()) {
            return '';
        } else {
            /**
             * @var string $result
             */
            $result = '';
            switch ($this->operation) {
                case EvalTypes::M_clear:
                    $this->calculatorInstance->deeplyMemorizedData = 0;
                    break;
                case EvalTypes::M_read:
                    $result = $this->calculatorInstance->deeplyMemorizedData;
                    break;
                case EvalTypes::M_add:
                    $tmp = $this->calculatorInstance->deeplyMemorizedData;
                    $tmp += floatval($this->rightValue);
                    $this->calculatorInstance->deeplyMemorizedData = $tmp;
                    break;
                case EvalTypes::M_sub:
                    $tmp = $this->calculatorInstance->deeplyMemorizedData;
                    $tmp -= floatval($this->rightValue);
                    $this->calculatorInstance->deeplyMemorizedData = $tmp;
                    break;
                default:
                    break;
            }
            return $result;
        }
    }
}