@extends('layouts.main')


@section('content')
    <div class="container">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Enter youe username</label>
                <input type="text"  class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Enter your email</label>
              <input type="email"  class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Create strong password</label>
              <input type="password" class="form-control"   name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>     
    </div>
@endsection