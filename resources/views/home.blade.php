@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1 border seitbar">
          <seitbar></seitbar>
        </div>

        <div class="col-11 page">
            
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection
