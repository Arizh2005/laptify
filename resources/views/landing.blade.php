@extends('layouts.front')

@section('meta')
<meta name="description" content="About your website">
@endsection

@section('title')
    <title>HomePage</title>
@endsection

@section('style')
    <style>
    </style>
@endsection

@section('content')
<div class="bg-yellow-50 py-20 px-4">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-900 leading-tight">
            Discover Your Ideal Laptop <br> Quickly And Accurately With <br> Laptify!
        </h1>
        <button class="mt-8 px-6 py-3 bg-blue-400 text-white font-semibold rounded-md shadow hover:bg-blue-500">
            Get Started
        </button>
    </div>
    <div class="mt-10 flex justify-center">
        <img src="{{ asset('images/laptop.png') }}" alt="Laptop" class="w-1/3 md:w-1/4">
    </div>
</div>

<div class="bg-blue-50 py-16">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-semibold text-blue-900 mb-12">Why Us?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 border-4 border-pink-400 rounded-full"></div>
                <h3 class="text-xl font-semibold text-blue-900">Personalized</h3>
                <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <!-- Card 2 -->
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 border-4 border-pink-400 rounded-full"></div>
                <h3 class="text-xl font-semibold text-blue-900">Efficient</h3>
                <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <!-- Card 3 -->
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 border-4 border-pink-400 rounded-full"></div>
                <h3 class="text-xl font-semibold text-blue-900">Trusted</h3>
                <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>
</div>
@endsection
