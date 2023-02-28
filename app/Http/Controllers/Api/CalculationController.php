<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use Illuminate\Http\Request;
use App\Services\CalculationService;
use Illuminate\Support\Facades\Auth;

class CalculationController extends Controller
{
    public const PER_PAGE = 10;
    public function index()
    {
        $calculations = Calculation::userLatest(Auth::id(),self::PER_PAGE);

        return response()->json(['calculations' => $calculations]);
    }

    public function store(Request $request)
    {
        $result = (new CalculationService)->parseAndCalculate($expression = $request->input('expression'));
        $calculations = Calculation::userLatest(Auth::id(),self::PER_PAGE);

        return response()->json([
            'expression' => $expression,
            'result' => $result,
            'calculations' => $calculations
        ]);
    }
}
