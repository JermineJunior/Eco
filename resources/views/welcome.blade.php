@extends('layouts.app')
@section('content')
<div class="flex items center bg-gray-200 mt-4">
    <div class="w-1/2 flex items-center justify-center">
        <div class=" text-indigo-500  px-6 tracking-wide">
            <h1 class="lg:text-4xl sm:text-lg my-4">Welcome to My Ecommerce website , have fun.</h1>
            <a class="text-xl inline-block no-underline  leading-relaxed hover:text-black hover:border-black" href="#">products</a>
        </div>
    </div>
    <section class="w-1/2 flex -mt-4">
      <img src="{{ asset('/images/eco.svg') }}" alt="eco" style="width:22rem;">
    </section>
</div>
@endsection