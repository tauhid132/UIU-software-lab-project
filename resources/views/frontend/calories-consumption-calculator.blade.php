@extends('master')
@section('title','Calories Calculator')
@section('main-body')
@if(Auth::check())
@include('frontend.includes.loggedin-header')
@else
@include('frontend.includes.header')
@endif

{{-- <meal :foods="{{ $foods }}"></meal> --}}
<div class="container">
    <div class="section" style="margin-top:150px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-2">
                    <h3>Total Calories Consumption: {{ $total_calories }}</h3>
                </div>
            </div>
            <div class="card">
                
                <div class="card-header">
                    <h4>Calories Calculator</h4>
                    <button onclick="addnew()" class="btn btn-primary btn-sm float-end">Add</button>
                </div>
                <form method="post" action="{{ route('calculateCalories') }}">
                    @csrf
                <div class="card-body" id="meals">
                    @foreach ($meals as $meal )
                    <div class="row mt-2">
                        <div class="col-md-3 mb-2">
                            <label for="inputName5" class="form-label">Choose Meal</label>
                            <select class="form-select" name="meal[]">
                                <option {{ $meal->meal == 'Breakfast' ? 'selected' : '' }} value="Breakfast" selected="">Breakfast</option>
                                <option {{ $meal->meal == 'Lunch' ? 'selected' : '' }} value="Lunch">Lunch</option>
                                <option {{ $meal->meal == 'Snack' ? 'selected' : '' }} value="Snack">Snack</option>
                                <option {{ $meal->meal == 'Dinner' ? 'selected' : '' }} value="Dinner">Dinner</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="inputName5" class="form-label">Food</label>
                            <select class="form-select" name="food[]" id="food_name">
                                @foreach ($foods as $f)
                                    <option {{ $meal->food == $f->food_name ? 'selected' : '' }} value="{{ $f->food_name }}">{{ $f->food_name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="inputName5" class="form-label">Unit</label>
                            <select class="form-select" id="unit" name="unit[]">
                                <option {{ $meal->unit == 'g' ? 'selected' : '' }}  value="g" selected="">gm</option>
                                <option {{ $meal->unit == 'pcs' ? 'selected' : '' }} value="pcs">Pcs</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="inputEmail5" class="form-label">Amount</label>
                            <input type="text" name="amount[]" value="{{ $meal->amount }}" class="form-control" id="amount">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="inputEmail5" class="form-label">Calories</label>
                            <input type="text" id="calories" value="{{ $meal->calories }}"   class="form-control" id="inputEmail5">
                        </div>
                        
                        <div class="col-md-1 mb-2">
                            <label for="inputEmail5" class="form-label">Action</label><br>
                            <a href="{{ route('deleteMeal',$meal->id) }}"><i class="fa fa-trash text-danger"></i></a>
                        </div>
                        
                    </div> 
                    @endforeach
                    
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Calculate</button>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('page-script')
<script>
       
    function calculate(){
        
        var food = document.getElementById("food_name").value
        var unit = document.getElementById("unit").value
        var amount = document.getElementById("amount").value
        alert(food)
        var query = amount+''+unit+' '+food
        $.ajax({
            method: 'GET',
            url: 'https://api.api-ninjas.com/v1/nutrition?query=' + query,
            headers: { 'X-Api-Key': 'I3sov+4Ec2CrXQK9mauAQQ==PzCNNH5swQ7U6yde'},
            contentType: 'application/json',
            success: function(result) {
                document.getElementById("calories").value = result[0].calories
                document.getElementById("carbs").value = result[0].carbohydrates_total_g
                document.getElementById("fat").value = result[0].fat_total_g
                document.getElementById("protien").value = result[0].protein_g

                console.log(result);
            },
            error: function ajaxError(jqXHR) {
                console.error('Error: ', jqXHR.responseText);
            }
            
        });
        
    }
</script>
<script>
    function addnew(){
        var container = document.getElementById('meals');
        var div = document.createElement("div");
        div.innerHTML += '<div class="row">'+
                        '<div class="col-md-3 mb-2">'+
                        '<label for="inputName5" class="form-label">Choose Meal</label>'+
                        '<select class="form-select" name="meal[]">'+
                            '<option value="Breakfast" selected="">Breakfast</option>'+
                            '<option value="Lunch">Lunch</option>'+
                            '<option value="Snack">Snack</option>'+
                            '<option value="Dinner">Dinner</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-2 mb-2">'+
                        '<label for="inputName5" class="form-label">Food</label>'+
                        '<select class="form-select" name="food[]" id="food_name">'+
                            '@foreach ($foods as $f)'+
                                '<option value="{{ $f->food_name }}">{{ $f->food_name }}</option>'+
                            '@endforeach'+
                            
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-2 mb-2">'+
                        '<label for="inputName5" class="form-label">Unit</label>'+
                        '<select class="form-select" name="unit[]" id="unit">'+
                            '<option value="g" selected="">gm</option>'+
                            '<option value="pcs">Pcs</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-2 mb-2">'+
                        '<label for="inputEmail5" class="form-label">Amount</label>'+
                        '<input type="text" name="amount[]"  class="form-control" id="amount">'+
                    '</div>'+
                    '<div class="col-md-2 mb-2">'+
                        '<label for="inputEmail5" class="form-label">Calories</label>'+
                        '<input type="text" id="calories"  class="form-control" id="inputEmail5">'+
                    '</div>'+
                   
                    '<div class="col-md-1 mb-2">'+
                        '<label for="inputEmail5" class="form-label">Action</label><br>'+
                        '<i class="fa fa-trash text-danger"></i>'+
                    '</div>'+
                    '</div>';
                    container.appendChild(div)
    }
</script>
@endsection