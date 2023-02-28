<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Services\CalculationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CalculationController extends Controller
{
    public const PER_PAGE = 10;
    public function index()
    {
        $calculations = Calculation::userLatest(Auth::id(),self::PER_PAGE);

        return view('calculator', ['calculations' => $calculations]);
    }

    public function store(Request $request)
    {
        $result = (new CalculationService)->parseAndCalculate($expression = $request->input('expression'));
        $calculations = Calculation::userLatest(Auth::id(),self::PER_PAGE);

        return view('calculator', compact('expression', 'result', 'calculations'))->with('success', 'Calculation added successfully.');
    }
}
