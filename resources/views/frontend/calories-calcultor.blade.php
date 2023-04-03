@extends('master')
@section('title','Calories Calculator')
@section('main-body')
@if(Auth::check())
@include('frontend.includes.loggedin-header')
@else
@include('frontend.includes.header')
@endif

<div class="container">
    <div class="section" style="margin-top:150px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Calories Calculator</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-3 mb-3">
                            <label for="inputName5" class="form-label">Choose Gender</label>
                            <select class="form-select">
                                <option value="Male" selected="">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="inputEmail5" class="form-label">Age</label>
                            <input type="text" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="inputEmail5" class="form-label">Heigh(Ft)</label>
                            <input type="text" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="inputEmail5" class="form-label">Heigh(Inch)</label>
                            <input type="text" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="inputName5" class="form-label">Activity Level</label>
                            <select class="form-select">
                                <option value="Male" selected="">Sedentary: little or no exercise</option>
                                <option value="Female">Exercise 1-3 times/week</option>
                                <option value="Female">Exercise 4-5 times/week</option>
                                <option value="Female">Daily exercise or intense exercise 3-4 times/week	</option>
                                <option value="Female">Intense exercise 6-7 times/week	</option>
                                <option value="Female">Very intense exercise daily, or physical job	</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="inputEmail5" class="form-label">Weight(Kg)</label>
                            <input type="text" class="form-control" id="inputEmail5">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-end">Calculate</button>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection