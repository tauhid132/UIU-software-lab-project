<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewCaloriesCalculator(){
        return view('frontend.calories-calcultor');
    }

    public function viewCaloriesConsumptionCalculator(){
        return view('frontend.calories-consumption-calculator',[
            'foods' => Food::all(),
        ]);
    }
    public function getFoods(){
        return Food::all();
    }
}
