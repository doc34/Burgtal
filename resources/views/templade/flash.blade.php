@if (session('status'))
<div class="alertflash  alert alert-success">
    {{ session('status') }}
</div>
@endif
@if (session('errors'))
<div class="alertflash alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
