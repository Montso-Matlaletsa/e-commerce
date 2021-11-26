@extends('layouts.app')

@section('content')
<ul id="tabs-swipe-demo" class="tabs black-text">
    <li class="tab col s3"><a href="#test-swipe-1" class="black-text" >Shop</a></li>
    <li class="tab col s3"><a href="#test-swipe-2" class="black-text" >Electronic & Appliances</a></li>
    <li class="tab col s3"><a  href="#test-swipe-3" class="black-text">Fashion & Clothing</a></li>
    <li class="tab col s3"><a href="#test-swipe-4" class="black-text">Music & Intrumentals</a></li>
    <li class="tab col s3"><a href="#test-swipe-5" class="black-text">Home & Garden</a></li>
    <li class="tab col s3"><a href="#test-swipe-6" class="black-text">Sports & Leisure</a></li>
    <li class="tab col s3"><a href="#test-swipe-7" class="black-text">Mobile & Computers</a></li>
</ul>
  <div id="test-swipe-1" class="col s12">@include('home.shop')</div>
  <div id="test-swipe-2" class="col s12 red">@include('home.electronics')</div>
  <div id="test-swipe-3" class="col s12 green">@include('home.fashion')</div>
  <div id="test-swipe-4" class="col s12 green">@include('home.music')</div>
  <div id="test-swipe-5" class="col s12 green">@include('home.home')</div>
  <div id="test-swipe-6" class="col s12 green">@include('home.sports')</div>
  <div id="test-swipe-7" class="col s12 green">@include('home.computers')</div>
@endsection