@extends('layouts.main')
@section('content')
    
  
    <h1>Halo!!</h1>
    <div>Selamat datang di halaman admin</div>
    <div><a href="/logout" class="btn btn-sm btn-secondary">Logout >></a></div>
      <ul class="list-group list-group-flush">
        @if (Auth::user()->role == 'operator')
        <li class="list-group-item">Menu Operator</li>
        @endif
        @if (Auth::user()->role == 'koordinator')
        <li class="list-group-item">Menu koordinator</li>
        @endif

      </ul>
 
@endsection