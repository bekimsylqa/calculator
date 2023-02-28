<?php


namespace App\Services;


use App\Models\Calculation;

class CalculationService
{
    public function parseAndCalculate($input)
    {
        $pattern = '/^\s*(\-?\d+)\s*([+\-*\/])\s*(\-?\d+)\s*$/';
        if (preg_match($pattern, $input, $matches)) {
            $a = $matches[1];
            $b = $matches[3];
            $operator = $matches[2];
            switch ($operator) {
                case '+':
                    $result = $a + $b;
                    break;
                case '-':
                    $result = $a - $b;
                    break;
                case '*':
                    $result = $a * $b;
                    break;
                case '/':
                    if ($b == 0) {
                        $result = 'Cannot divide by zero';
                    } else {
                        $result = $a / $b;
                    }
                    break;
                default:
                    $result = 'Invalid operator';
                    break;
            }

            $this->createCalculation($input, $result, auth()->user());
            return $result;
        }

            return $this->evaluate($input);
    }

    public function evaluate($expression)
    {
        $result = null;

        try {
            $result = eval('return '.$expression.';');
        } catch (\Throwable $th) {
            $result = 'Error: '.$th->getMessage();
        }

        $this->createCalculation($expression, $result, auth()->user());

        return $result;
    }

    private function createCalculation($expression, $result, $user)
    {
        $calculation = new Calculation([
            'expression' => $expression,
            'result' => $result,
        ]);
        $calculation->user()->associate($user);
        $calculation->save();
    }
}
