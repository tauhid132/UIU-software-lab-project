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
                <form method="post" action="{{ route('countCalories') }}">
                    @csrf
                <div class="card-header">
                    <h4>Calories Calculator</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-2 mb-3">
                            <label for="inputName5" class="form-label">Choose Gender</label>
                            <select class="form-select" name="gender">
                                <option value="Male" selected="">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="inputEmail5" class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" id="inputEmail5">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="inputEmail5" class="form-label">Height</label>
                            <input type="text" class="form-control" name="height" id="inputEmail5">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="inputName5" class="form-label">Activity Level</label>
                            <select class="form-select" name="activity_level">
                                <option value="1.2" selected="">Little/No Exercise</option>
                                <option value="1.375">Light Exercise</option>
                                <option value="1.55">Moderate Exercise (3-5 days/week)</option>
                                <option value="1.725">Very Active (6-7 days/week)</option>
                                <option value="1.9">Extra Active</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="inputEmail5" class="form-label">Weight(Kg)</label>
                            <input type="text" class="form-control" name="weight" id="inputEmail5">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Calculate</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

@endsection