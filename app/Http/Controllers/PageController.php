<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
    public function countCalories(Request $request){
        if($request->gender == 'Male'){
            $bmr = 66.47 + (13.75 * $request->weight) + (5.003 * $request->height*30.48) - (6.755 * $request->age);
        }else{
            $bmr = 665.1 + (9.563 * $request->weight) + (1.85 * $request->height*30.48) - (4.676 * $request->age);
        }
        $bmr = $bmr * $request->activity_level;
        dd($bmr);
    }
    
    public function calculateCalories(Request $request){
       // dd($request);
        $total_calories = 0;
        for($i=0; $i<sizeof($request->food); $i++){
            $total_calories = $total_calories + $this->calCal($request->amount[$i],$request->unit[$i],$request->food[$i]);
        }
        dd($total_calories);
    }
    public function calCal($amount, $unit, $food){
        $response = Http::withHeaders([
            'X-Api-Key' => 'I3sov+4Ec2CrXQK9mauAQQ==PzCNNH5swQ7U6yde',
            'Content-Type' => 'application/json' 
       ])->get('https://api.api-ninjas.com/v1/nutrition?query='.$amount.''.$unit.' '.$food);
       $data = $response->object();
       return $data[0]->calories;
    }
}
