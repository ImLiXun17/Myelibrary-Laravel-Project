<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;

class BorrowsController extends Controller
{
   
    public function getStudentName(Request $request)
{
    $studentNumber = $request->input('student_number');
    $student = Student::where('sid', $studentNumber)->first();

    if ($student) {
        $studentName = $student->student_name;
        return response()->json(['student_name' => $studentName]);
    } else {
        return response()->json(['error' => 'No data found']);
    }
}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $searchQuery = $request->input('search');
    $borrows = Borrow::query()
        ->join('college', 'borrow.coll_id', '=', 'college.id')
        ->join('student' , 'borrow.student_id', '=', 'student.sid')
        ->join('book', 'borrow.book_isbn', '=', 'book.book_isbn')
        ->select('borrow.*', 'college.college_name','book.book_name', 'student.student_name')
        ->orderBy('student_name', 'ASC');

    if (strlen($searchQuery) > 0) {
        $borrows->where('sid', $searchQuery)
            ->orWhere('college_name', $searchQuery)
            ->orWhere('book_name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('student_name', 'LIKE', '%' . $searchQuery . '%');
    }

    $borrows = $borrows->paginate(10);
        return view('layouts.borrow', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colleges = College::orderBy('college_name', 'ASC')->get();
        return view('layouts.borrow-add', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function redirectToBorrowAdd()
    {
        return view('layouts.borrow-add');
    }
            
    public function store(Request $request)
{
    $student_number = $request->input('student_number');
    $college_id = $request->input('college_id');
    $book_isbn = $request->input('book_isbn');
    $time_borrow = $request->input('time_borrow');
    $time_return = $request->input('time_return');
    $fines = $request->input('fines');
    $action = $request->input('action');

    // Get current quantity of books available
    $current_quantity = DB::table('book')->where('book_isbn', $book_isbn)->value('quantity');

    // Calculate new quantity of books available
    $new_quantity = $current_quantity - 1;

    // Display message if books are still available
    if ($new_quantity >= 0) {
        // Update book table with new quantity of books available
        DB::table('book')->where('book_isbn', $book_isbn)->update(['quantity' => $new_quantity]);

        // Insert borrow record
        $borrow = new Borrow();
        $borrow->student_id = $student_number;
        $borrow->coll_id = $college_id;
        $borrow->book_isbn = $book_isbn;
        $borrow->time_borrow = $time_borrow;
        $borrow->time_return = $time_return;
        $borrow->fines = $fines;
        $borrow->action = $action;
        $borrow->save();

        return redirect()->route('borrow');
    } else {
        // Display error message if no books are available
        $error = 'No Book Available';
        return back()->with('error', $error);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $borrowId = $request->route('borrow_id');
        $borrow = Borrow::findOrFail($borrowId);
        return view('layouts.borrow-edit', compact('borrow'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $borrow_id)
{
    $borrow = Borrow::findOrFail($borrow_id);

    if (!$borrow) {
        return redirect()->route('borrow')->with('error', 'Borrow record not found.');
    }

    $validatedData = $request->validate([
        'student_number' => 'required',
        'student_name' => 'required',
        'book_isbn' => 'required',
        'time_borrow' => 'required',
        'time_return' => 'required',
        'fines' => 'required',
        'action' => 'required',
    ]);

    $studentNumber = $validatedData['student_number'];
    $studentName = $validatedData['student_name'];
    $bookIsbn = $validatedData['book_isbn'];
    $timeBorrow = $validatedData['time_borrow'];
    $timeReturn = $validatedData['time_return'];
    $fines = $validatedData['fines'];
    $action = $validatedData['action'];

    // Update the borrow record
    $borrow->student_id = $studentNumber;
    $borrow->book_isbn = $bookIsbn;
    $borrow->time_borrow = $timeBorrow;
    $borrow->time_return = $timeReturn;
    $borrow->fines = $fines;
    $borrow->action = $action;
    $borrow->save();

    // Update book quantity if necessary
    $book = Book::where('book_isbn', $bookIsbn)->first();

    if ($book) {
        $current_quantity = $book->quantity;
        $new_quantity = $current_quantity + 1;

        if ($timeReturn != '0000-00-00 00:00:00') {
            $book->quantity = $new_quantity;
            $book->save();
        }
    }

    // Update fines for all borrow records
    $borrowRecords = Borrow::all();

    foreach ($borrowRecords as $borrowRecord) {
        $time_borrow = $borrowRecord->time_borrow;
        $time_return = $borrowRecord->time_return;

        $borrow_date = new \DateTime($time_borrow);
        $return_date = new \DateTime($time_return);
        $diff = $borrow_date->diff($return_date);
        $hours = $diff->h + ($diff->days * 24);

        $fines = 0;
        if ($hours > 24) {
            $fines = ($hours - 24) * 20;

            $borrowRecord->fines = $fines;
            $borrowRecord->save();
           
        }
        else{
            $borrowRecord->fines = $fines;
            $borrowRecord->save();
        }

        if ($time_return == '0000-00-00 00:00:00' or $time_return == NULL) {
            $borrowRecord->fines = 0;
            $borrowRecord->save();
        }
    }

    return redirect()->route('borrow')->with('success', 'Borrow record updated successfully.');
}

    public function destroy(string $borrow_id)
{
    $borrow = Borrow::findOrFail($borrow_id);
    $borrow->delete();
    return redirect()->route('borrow')->with('success', 'Borrow record deleted successfully');
}


}
