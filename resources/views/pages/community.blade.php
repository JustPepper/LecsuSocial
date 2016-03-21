@extends('layouts.app')
    
    @section('content')         
        @include('partials.asideLeft')
        <main role="main">
            @include('partials.status')
        </main>
        @include('partials.asideRight')         
    @endsection