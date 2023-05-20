<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $searchQuery = $request->input('search');

    $students = Student::query()
        ->join('college', 'student.college_id', '=', 'college.id')
        ->select('student.*', 'college.college_name')
        ->orderBy('student_name', 'ASC');

    if (strlen($searchQuery) > 0) {
        $students->where('sid', $searchQuery)
            ->orWhere('college_name', $searchQuery)
            ->orWhere('corporate_email', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('student_name', 'LIKE', '%' . $searchQuery . '%');
    }

    $students = $students->paginate(10);

    return view('layouts.student', compact('students'));
}

    public function create()
    {
        $colleges = College::all();
        return view('layouts.student-add', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function redirectToStudentAdd()
{
    return view('layouts.student-add');
}
        
public function store(Request $request)
{
    $validatedData = $request->validate([
        'student_number' => 'required',
        'name' => 'required',
        'email' => 'required',
        'college_id' => 'required',
        'address' => 'required',
    ]);

    $student = new Student([
        'sid' => $validatedData['student_number'],
        'student_name' => $validatedData['name'],
        'corporate_email' => $validatedData['email'],
        'college_id' => $validatedData['college_id'],
        'address' => $validatedData['address'],
        'date_add' => now(),
    ]);

  if ($request->has('submit')) {
            $student->save();
        return redirect()->route('student.create')->with('success', 'Student details saved successfully');
    } else {
        return redirect()->back()->with('error', 'Unable to save the student.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $sid)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $sid)
    {
    $id = College::pluck('id');
    $student = Student::findOrFail($sid);
    $college = College::all(); // 
    return view('layouts.student-edit', compact('id','student', 'college'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $sid)
    {
        $student = Student::findOrFail($sid);

        $student->student_name = $request->input('student_name');
        $student->corporate_email = $request->input('corporate_email');
        $college = College::where('college_name', $request->input('college_name'))->first();
        if ($college) {
            $student->college_id = $college->id;
        }
        $student->address = $request->input('address');
        if ($request->has('submit')) {
            $student->save();
            return redirect()->route('student')->with('success', 'Student details updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $sid)
    {
        $student = Student::findOrFail($sid);
        $student->delete();
        return redirect()->route('student')->with('success', 'Student deleted successfully');
    }
    
}
