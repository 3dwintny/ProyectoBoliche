@extends('layouts.app')

@section('content')

<div class="contaimer mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Slider
                        <a href="{{ url('slider/create') }}" class="btn btn-primary btn-sm float-right"> Add Slider</a>
                    </h4>
                </div>
                <div class="card-body">
                    {{-- your slider data --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection