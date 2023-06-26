@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @role('admin')
                    {{ __('You are logged in!
                        Administrador') }}
                    
                        
                                <!-- Pills navs -->
                                <div class="mt-4">
                                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="{{ route('register.user') }}" role="tab"
                                        aria-controls="pills-register" aria-selected="false">New User</a>
                                    </li>
                                    </ul>
                                </div>
                                
                                <!-- Pills navs -->
                                <div class="mt-4">
                                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="{{ route('product') }}" role="tab"
                                        aria-controls="pills-register" aria-selected="false">New Key State</a>
                                    </li>
                                    </ul>
                                </div>  
                    @endrole
                    @role('vigilante')
                    {{ __('You are logged in!
                        Vigilante') }} 
                                <!-- Pills navs -->
                                <div class="mt-4">
                                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="{{ route('product') }}" role="tab"
                                        aria-controls="pills-register" aria-selected="false">New Key State</a>
                                    </li>
                                    </ul>
                                </div> 
                    @endrole

                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection