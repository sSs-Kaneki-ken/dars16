@extends('layouts.main')

@section('content')
    <section class="content">
        <div class="container mt-5">
            <h1 class="mb-3">Student Details</h1>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $student->name }}</h5>
                    <p class="card-text"><strong>Age:</strong> {{ $student->age }}</p>
                    <p class="card-text"><strong>Phone:</strong> {{ $student->phone }}</p>
                    <a href="{{ route('student.index') }}" class="btn btn-primary mt-3">Back to List</a>
                </div>
            </div>
        </div>
    </section>
@endsection
