@extends('layouts.main')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
      <div class="container mt-5">

        <h1 class="mb-3">Users</h1>

        <a href="{{ route('role.create') }}" class="btn btn-primary mb-4">Create</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <th>{{ $role->id }}</th>
                    <th>{{ $role->name }}</th>
                    <th>{{ $role->email }}</th>
                    <th>{{ $role->password }}</th>
                    <th>{{ $role->role }}</th>
                    <th>
                        <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </th>
                    <th>
                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning">Update</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{-- {{ $roles->links('pagination::bootstrap-4') }} --}}
    </div>
    </section>

@endsection