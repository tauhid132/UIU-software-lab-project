@extends('master')
@section('title','Health Tracker')
@section('main-body')
@include('frontend.includes.header')

<div class="container" >
  
  
  
  <section class="section contact" style="margin-top:150px" >
    
    
    <div class="col-xl-12">
      
      <div class="row">
        <div class="col-lg-4">
          <div class="info-box card">
            <img src="{{ asset('images/diet.png') }}" height="100" width="100">
            <h3>Diet Chart Planner</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat sequi nihil a eveniet rem. Odit iure reprehenderit perferendis amet, maiores nobis voluptatem voluptas, dolorum doloribus molestias pariatur minus optio placeat.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-box card">
            <img src="{{ asset('images/calories-calculator.png') }}" height="100" width="100">
            <h3>Calculate Calories</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit unde reprehenderit explicabo quaerat. Inventore facere saepe, unde ad possimus doloremque dolor assumenda omnis rem nam accusamus in id repellat.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-box card">
            <img src="{{ asset('images/online.png') }}" height="100" width="100">
            <h3>Consult Nutritionist</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit unde reprehenderit explicabo quaerat. Inventore facere saepe, unde ad possimus doloremque dolor assumenda omnis rem nam accusamus in id repellat.</p>
          </div>
        </div>
        
      </div>
      
    </div>
    
    
    
    
    
  </section>
  
</div><!-- End #main -->
@endsection