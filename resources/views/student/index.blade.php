@extends('layouts.main')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
      <div class="container mt-5">

        <h1 class="mb-3">Students</h1>

        <a href="#" class="btn btn-primary mb-4">Create</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Phone</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th>{{$student->id}}</th>
                        <th>{{$student->name}}</th>
                        <th>{{$student->age}}</th>
                        <th>{{$student->phone}}</th>
                        <th>
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                             <th><a href="#" class="btn btn-warning">Update</a>
                            </th>
                            </tr>
                @endforeach
            </tbody>
          </table>
          {{ $students->links('pagination::bootstrap-4') }}
    </div>
    </section>

@endsection