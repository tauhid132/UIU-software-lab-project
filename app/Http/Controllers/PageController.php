<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function viewCaloriesCalculator(){
        return view('frontend.calories-calcultor');
    }
    
    public function viewCaloriesConsumptionCalculator(){
        return view('frontend.calories-consumption-calculator',[
            'foods' => Food::all(),
            'meals' => Meal::where('user_id',Auth::user()->id)->get(),
            'total_calories' => Meal::where('user_id',Auth::user()->id)->sum('calories')
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
        $user = User::find(Auth::user()->id);
        $user->update([
            'calories_required' => $bmr
        ]);
        
    }
    
    public function calculateCalories(Request $request){
        $total_calories = 0;
        for($i=0; $i<sizeof($request->food); $i++){
            $meal = Meal::where('meal', $request->meal[$i])->where('food',$request->food[$i])->where('unit',$request->unit[$i])->where('user_id',Auth::user()->id)->first();
            if($meal == null){
                $cal = $this->calCal($request->amount[$i],$request->unit[$i],$request->food[$i]);
                $total_calories = $total_calories + $cal ;
                Meal::create([
                    'meal' => $request->meal[$i],
                    'food' => $request->food[$i],
                    'unit' => $request->unit[$i],
                    'amount' => $request->amount[$i],
                    'calories' => $cal,
                    'user_id' => Auth::user()->id
                ]);
            }   
            
        }
        return back();
    }
    public function calCal($amount, $unit, $food){
        $response = Http::withHeaders([
            'X-Api-Key' => 'I3sov+4Ec2CrXQK9mauAQQ==PzCNNH5swQ7U6yde',
            'Content-Type' => 'application/json' 
            ])->get('https://api.api-ninjas.com/v1/nutrition?query='.$amount.''.$unit.' '.$food);
            $data = $response->object();
            return $data[0]->calories;
        }
    public function viewDashboard(){
        return view('dashboard',[
            'consuming' => Meal::where('user_id',Auth::user()->id)->sum('calories')
        ]);
    }  
    public function deleteMeal($id){
        Meal::find($id)->delete();
        return back();
    }
        
    }
    