<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $totalBorrowsResult132 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 132 GROUP BY student_id) as total_borrows");
        $totalBorrow132 = $totalBorrowsResult132[0]->total;
    
        $totalStudentsResult = DB::select("SELECT COUNT(*) as total_students FROM student");
        $totalStudents = $totalStudentsResult[0]->total_students;
    
        $percentage132 = ($totalBorrow132 / $totalStudents) * 100;
        $percentageFormatted132 = number_format($percentage132, 2);
    
        $totalBorrowsResult133 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 133 GROUP BY student_id) as total_borrows");
        $totalBorrow133 = $totalBorrowsResult133[0]->total;
    
        $percentage133 = ($totalBorrow133 / $totalStudents) * 100;
        $percentageFormatted133 = number_format($percentage133, 2);

        $totalBorrowsResult134 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 134 GROUP BY student_id) as total_borrows");
        $totalBorrow134 = $totalBorrowsResult134[0]->total;
    
        $percentage134 = ($totalBorrow134 / $totalStudents) * 100;
        $percentageFormatted134 = number_format($percentage134, 2);
        
        $totalBorrowsResult135 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 135 GROUP BY student_id) as total_borrows");
        $totalBorrow135 = $totalBorrowsResult135[0]->total;
    
        $percentage135 = ($totalBorrow135 / $totalStudents) * 100;
        $percentageFormatted135 = number_format($percentage135, 2);

        $totalBorrowsResult136 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 136 GROUP BY student_id) as total_borrows");
        $totalBorrow136 = $totalBorrowsResult136[0]->total;
    
        $percentage136 = ($totalBorrow136 / $totalStudents) * 100;
        $percentageFormatted136 = number_format($percentage136, 2);

        $totalBorrowsResult137 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 137 GROUP BY student_id) as total_borrows");
        $totalBorrow137 = $totalBorrowsResult137[0]->total;
    
        $percentage137 = ($totalBorrow137 / $totalStudents) * 100;
        $percentageFormatted137 = number_format($percentage137, 2);

        $totalBorrowsResult138 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 138 GROUP BY student_id) as total_borrows");
        $totalBorrow138 = $totalBorrowsResult138[0]->total;
    
        $percentage138 = ($totalBorrow138 / $totalStudents) * 100;
        $percentageFormatted138 = number_format($percentage138, 2);

        $totalBorrowsResult139 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 139 GROUP BY student_id) as total_borrows");
        $totalBorrow139 = $totalBorrowsResult139[0]->total;
    
        $percentage139 = ($totalBorrow139 / $totalStudents) * 100;
        $percentageFormatted139 = number_format($percentage139, 2);

        $totalBorrowsResult140 = DB::select("SELECT COUNT(*) as total FROM (SELECT COUNT(DISTINCT borrow_id) FROM borrow WHERE coll_id = 140 GROUP BY student_id) as total_borrows");
        $totalBorrow140 = $totalBorrowsResult140[0]->total;
    
        $percentage140 = ($totalBorrow140 / $totalStudents) * 100;
        $percentageFormatted140 = number_format($percentage140, 2);
    
        return view('layouts.report', ['percentage132' => $percentageFormatted132, 'percentage133' => $percentageFormatted133, 
                                       'percentage134' => $percentageFormatted134, 'percentage135' => $percentageFormatted135,
                                       'percentage136' => $percentageFormatted136, 'percentage137' => $percentageFormatted137,
                                       'percentage138' => $percentageFormatted138, 'percentage139' => $percentageFormatted139,
                                       'percentage140' => $percentageFormatted140,]);
    }
    
}
