<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $this->validateRequest($request);

        
        Student::create($request->all());

        return redirect()->route('students.index');
    }
}
