@extends('layout/template')

@section('content')
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Register</h1>
  <form action="/sesi/create" method="POST">
     @csrf
     <div class="form-group">
      <label for="name" class="form-label">Name</label>
      <input type="text" value="{{ Session::get('name') }}" class="form-control" id="name" name="name" placeholder="Enter name">
   </div>
     <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" value="{{ Session::get('email') }}" class="form-control" id="email" name="email" placeholder="Enter email">
     </div>
     <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
     </div>
     <button type="submit" class="btn btn-primary">Register</button>
      
  </form>
</div>
@endsection