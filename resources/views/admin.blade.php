@extends('layouts.layoutAdmin')

@section('bienvenido')

<div class="container ">
   <div class="row">
   <!-- #banner-text start -->
      <div id="banner-text" class="col-md-7 text-c text-left ">
         <h5 class="wow fadeInUp main-h" data-wow-delay="0.2s" >Bienvenido {{ Auth::user()->name}}</h5>
      </div>
      <!-- /#banner-text End -->
   </div>
</div>

@endsection
