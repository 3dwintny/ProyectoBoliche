@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
'title' => __('Hola') . ' '. auth()->user()->name,
'description' => __('Bienvenido a la Federacion Nacional de Boliche'),
'class' => 'col-lg-12'
])
<<<<<<< HEAD
=======


<div>
>>>>>>> 0183110bff9f9c6e40b82154b35cee55c26029e9
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
