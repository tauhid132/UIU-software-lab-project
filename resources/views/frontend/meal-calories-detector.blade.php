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
                <div class="card-header">
                    <h4>Calories Calculator</h4>
                    <button onclick="addnew()" class="btn btn-primary btn-sm float-end">Add</button>
                </div>
                <div class="card-body" id="meals">
                    <div class="row mt-2">
                        <div class="col-md-2 mb-2">
                            <label for="inputName5" class="form-label">Choose Meal</label>
                            <select class="form-select">
                                <option value="Male" selected="">Breakfast</option>
                                <option value="Female">Lunch</option>
                                <option value="Female">Snack</option>
                                <option value="Female">Dinner</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="inputName5" class="form-label">Food</label>
                            <select class="form-select" id="food_name">
                                @foreach ($foods as $f)
                                    <option value="{{ $f->food_name }}">{{ $f->food_name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="col-md-1 mb-2">
                            <label for="inputName5" class="form-label">Unit</label>
                            <select class="form-select" id="unit">
                                <option value="gm" selected="">gm</option>
                                <option value="">Pcs</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="inputEmail5" class="form-label">Amount</label>
                            <input type="text"  class="form-control" id="amount">
                        </div>
                        <div class="col-md-1 mb-2">
                            <label for="inputEmail5" class="form-label">Calories</label>
                            <input type="text" id="calories"  class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-1 mb-2">
                            <label for="inputEmail5" class="form-label">Carbs</label>
                            <input type="text" id="carbs" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-1 mb-2">
                            <label for="inputEmail5" class="form-label">Fat</label>
                            <input type="text" id="fat"  class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-1 mb-2">
                            <label for="inputEmail5" class="form-label">Protein</label>
                            <input type="text" id="protien" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-1 mb-2">
                            <label for="inputEmail5" class="form-label">Action</label><br>
                            <i class="fa fa-trash text-danger"></i>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button onclick="calculate()" class="btn btn-primary float-end">Calculate</button>
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
                        '<div class="col-md-2 mb-2">'+
                        '<label for="inputName5" class="form-label">Choose Meal</label>'+
                        '<select class="form-select">'+
                            '<option value="Male" selected="">Breakfast</option>'+
                            '<option value="Female">Lunch</option>'+
                            '<option value="Female">Snack</option>'+
                            '<option value="Female">Dinner</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-2 mb-2">'+
                        '<label for="inputName5" class="form-label">Food</label>'+
                        '<select class="form-select" id="food_name">'+
                            '@foreach ($foods as $f)'+
                                '<option value="{{ $f->food_name }}">{{ $f->food_name }}</option>'+
                            '@endforeach'+
                            
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-1 mb-2">'+
                        '<label for="inputName5" class="form-label">Unit</label>'+
                        '<select class="form-select" id="unit">'+
                            '<option value="gm" selected="">gm</option>'+
                            '<option value="">Pcs</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="col-md-2 mb-2">'+
                        '<label for="inputEmail5" class="form-label">Amount</label>'+
                        '<input type="text"  class="form-control" id="amount">'+
                    '</div>'+
                    '<div class="col-md-1 mb-2">'+
                        '<label for="inputEmail5" class="form-label">Calories</label>'+
                        '<input type="text" id="calories"  class="form-control" id="inputEmail5">'+
                    '</div>'+
                    '<div class="col-md-1 mb-2">'+
                        '<label for="inputEmail5" class="form-label">Carbs</label>'+
                        '<input type="text" id="carbs" class="form-control" id="inputEmail5">'+
                    '</div>'+
                    '<div class="col-md-1 mb-2">'+
                        '<label for="inputEmail5" class="form-label">Fat</label>'+
                        '<input type="text" id="fat"  class="form-control" id="inputEmail5">'+
                    '</div>'+
                    '<div class="col-md-1 mb-2">'+
                        '<label for="inputEmail5" class="form-label">Protein</label>'+
                        '<input type="text" id="protien" class="form-control" id="inputEmail5">'+
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