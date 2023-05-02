@extends('master')
@section('title','Health Tracker')
@section('main-body')
@if(Auth::check())
@include('frontend.includes.loggedin-header-doctor')
@else
@include('frontend.includes.header')
@endif
<div class="container" >
  
  
  <section class="section dashboard" style="margin-top:150px" >
    <div class="col-lg-12">
      <div class="row">
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Total Patients</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri  ri-file-user-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $total_patients }}</h6>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Current Patients</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-lightning-charge"></i>
                </div>
                <div class="ps-3">
                  <h6>0</h6>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
       
        <div class="col-xl-12">
          <div class="row">
            <div class="col-lg-3">
              <div class="info-box card p-4">
                <img src="{{ asset('images/diet.png') }}" height="100" width="100">
                <h4 class="mt-3">Diet Chart Planner</h4>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="info-box card p-4">
                <img src="{{ asset('images/calories.png') }}" height="100" width="100">
                <a href="{{ route('viewCaloriesConsumptionCalculator') }}"><h4 class="mt-3">Calories Consumption</h4></a>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="info-box card p-4">
                <img src="{{ asset('images/calories-calculator.png') }}" height="100" width="100">
                <a href="{{ route('viewCaloriesCalculator') }}"><h4 class="mt-3">Calculate Calories</h4></a>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="info-box card p-4">
                <img src="{{ asset('images/online.png') }}" height="100" width="100">
                <h4 class="mt-3">Consult Nutritionist</h4>
              </div>
            </div>
            
          </div>
        </div>
      </section>
    </div>
    @endsection