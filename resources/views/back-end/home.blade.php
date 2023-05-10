@extends('back-end.layout.app')
@section('title')
    Home Page
@endsection
{{-- @push('css')
    <style>
        a {

            color: rgba(255, 0, 0, 0.675) !important;
        }
    </style>
@endpush --}}



@section('content')
    @component('back-end.layout.header',['nav_title'=>'Home Page'])
    @endcomponent
    {{-- <h1>Home Page </h1> --}}
@endsection


{{-- 
@push('js')
  <script>
    alert('welcome')
  </script>
@endpush --}}
