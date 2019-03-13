@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 text-center">
                <h1 class="h1 text-white" style="font-size:45px;">
                    Chào mừng đến với Nắng Việt {dot} Com
                </h1>

                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="h1 text-white mt-5" style="font-size:75px;">
                        {{ \Auth::user()->name }}
                    </h1>
                </div>
        </div>
    </div>
</div>
@endsection
