@extends('layouts.master')

@section('content')
@include('layouts.flashes')
        <!-- ### $App Screen Content ### -->
        <main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            <div class="container-fluid">
                {{ $entrada }}
            </div>
          </div>
        </main>

@endsection