<?php


namespace app\models\operations;


use app\models\EvalTypes;
use yii\helpers\ArrayHelper;

class UnaryOperation extends Operation
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
            ['rightValue', 'required'],
        ]);
    }

    public function executeOperation(): string
    {
        if (!$this->validate()) {
            return '0';
        } else {
            return strval($this->makeCalc($this->rightValue, $this->operation));
        }
    }

    protected function makeCalc(float $value, string $operation): float
    {
        $result = 0;
        switch ($operation) {
            case EvalTypes::arctg:
                $result = atan($value);
                break;
            case EvalTypes::cos:
                $result = cos($value);
                break;
            case EvalTypes::divide_one_by_x:
                $result = 1 / $value;
                break;
            case EvalTypes::exponent:
                $result = exp($value);
                break;
            case EvalTypes::fact:
                $result = $this->Factorial($value);
                break;
            case EvalTypes::ln:
                $result = log($value);
                break;
            case EvalTypes::log:
                $result = log($value, 10);
                break;
            case EvalTypes::sin:
                $result = sin($value);
                break;
            case EvalTypes::tg:
                $result = tan($value);
                break;
        }
        return $result;
    }

    private function Factorial($number)
    {
        if ($number <= 1) {
            return 1;
        } else return ($number * $this->Factorial($number - 1));
    }
}