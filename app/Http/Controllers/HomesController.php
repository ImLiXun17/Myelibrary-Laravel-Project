<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;

class HomesController extends Controller
{
    
    public function index()
{
    $query02 = "SELECT book.book_name as 'Book Name', book.book_isbn, COUNT(DISTINCT student_id) as 'Borrow Count'
                FROM borrow
                INNER JOIN book ON book.book_isbn = borrow.book_isbn
                GROUP BY book.book_name, book.book_isbn
                ORDER BY `Borrow Count` DESC
                LIMIT 10";

    $results = DB::select($query02);

    $count_book = [];
    $label_chart = [];

    foreach ($results as $row) {
        $count_book[] = $row->{'Borrow Count'};
        $label_chart[] = $row->{'Book Name'};
    }

    $query = "SELECT college.college_name as 'College Name', COUNT(DISTINCT student_id) as 'Total Count'
              FROM borrow
              INNER JOIN college ON college.id = borrow.coll_id
              GROUP BY college.college_name
              ORDER BY `Total Count` DESC";

    $results = DB::select($query);

    $countCollege = [];
    $labelChart = [];

    if (count($results) > 0) {
        foreach ($results as $row) {
            $countCollege[] = $row->{'Total Count'};
            $labelChart[] = $row->{'College Name'};
        }
    } else {
        echo "No records matching your query were found.";
    }

    /* Student in Library */
    $myquery = "SELECT college.college_name as 'myCollege Name', COUNT(DISTINCT sid) as 'myTotal Count'
    FROM student
    INNER JOIN college ON college.id = student.college_id
    GROUP BY college.college_name, student.college_id
    ORDER BY `myTotal Count` DESC";

$myresults = DB::select($myquery);

$count_mycollege = [];
$lab_mychart = [];

if (count($myresults) > 0) {
    foreach ($myresults as $myrow) {
        $count_mycollege[] = $myrow->{'myTotal Count'};
        $lab_mychart[] = $myrow->{'myCollege Name'};
    }
} else {
    echo "No records matching your query were found.";
}

$finesquery = DB::table('student')
            ->join('borrow', 'student.sid', '=', 'borrow.student_id')
            ->select('student.student_name as StudentName', DB::raw('SUM(borrow.fines) as TotalFines'))
            ->groupBy('student.student_name')
            ->orderByDesc('TotalFines')
            ->limit(10)
            ->get();

$count_fines = [];
$fines_chart = [];

if ($finesquery->count() > 0) {
    foreach ($finesquery as $rowf) {
        $count_fines[] = $rowf->TotalFines;
        $fines_chart[] = $rowf->StudentName;
    }
} else {
    echo "No records matching your query were found.";
}

$mquery = DB::table('borrow')
            ->select(DB::raw('MONTH(borrow.time_borrow) as Months'), DB::raw('COUNT(DISTINCT student_id) as TotalStudents'))
            ->groupBy(DB::raw('MONTH(borrow.time_borrow)'))
            ->orderBy(DB::raw('MONTH(borrow.time_borrow)'))
            ->get();

$count_students = [];
$student_chart = [];

if ($mquery->count() > 0) {
    foreach ($mquery as $rowm) {
        $count_students[] = $rowm->TotalStudents;
        $student_chart[] = date("F", mktime(0, 0, 0, $rowm->Months, 1));
    }
} else {
    echo "No records matching your query were found.";
}
$students = DB::table('student')
            ->join('college', 'student.college_id', '=', 'college.id')
            ->select('student.student_name', 'college.college_name')
            ->orderBy('date_add', 'DESC')
            ->limit(5)
            ->get();
    return view('layouts.home', compact('count_book', 'label_chart', 'countCollege', 'labelChart','count_mycollege',
'lab_mychart','count_fines', 'fines_chart','count_students','student_chart','students'));
}

}    