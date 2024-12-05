<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function generateExercises(Request $request)
    {
        $request->validate(
            [
                'check_sum' => 'required_without_all:check_subtraction,check_multiplication,check_division',
                'check_subtraction' => 'required_without_all:check_sum,check_multiplication,check_division',
                'check_multiplication' => 'required_without_all:check_sum,check_subtraction,check_division',
                'check_division' => 'required_without_all:check_sum,check_subtraction,check_multiplication',
                'number_one' => 'required|integer|min:0|max:999|lt:number_two',
                'number_two' => 'required|integer|min:0|max:999',
                'number_exercises' => 'required|integer|min:0|max:999',
            ]
        );

        $operations = [];
        $operations[] = $request->check_sum ? 'sum' : '';
        $operations[] = $request->check_subtraction ? 'subtraction' : '';
        $operations[] = $request->check_multiplication ? 'multiplication' : '';
        $operations[] = $request->check_division ? 'division' : '';

        $min = $request->number_once;
        $max = $request->number_two;

        $numberExercises = $request->number_exercises;
    }

    public function printExercises()
    {
        echo "Imprimir exercicios";
    }

    public function exportExercises()
    {
        echo "Exportar exercicios";
    }
}
