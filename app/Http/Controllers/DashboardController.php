<?php

namespace App\Http\Controllers;

use App\Models\EmployeeHoliday;
use App\Models\HolidayDuedate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = Carbon::now();
        $curYear = $date->format('Y');
        $prevYear = $curYear - 1;
        $emp = Auth::user();
        $duedate = HolidayDuedate::first();
        $sumleave = EmployeeHoliday::where('code_emp_offlist', $emp['code_emp'])->selectRaw(
            "SUM(CASE WHEN type_off_offlist LIKE '1%' AND yearoff_offlist='$curYear'THEN  countday_offlist ELSE 0 END) AS cur_business,
                    SUM(CASE WHEN type_off_offlist LIKE '2%'  AND yearoff_offlist='$curYear' THEN countday_offlist ELSE 0 END) AS cur_sick,
                    SUM(CASE WHEN type_off_offlist LIKE '3%' AND year_leave_offlist ='$curYear' THEN countday_offlist ELSE 0 END) AS cur_vacation,
                    SUM(CASE WHEN type_off_offlist LIKE '4%'  AND yearoff_offlist='$curYear' THEN countday_offlist ELSE 0 END) AS cur_other,
                    SUM(CASE WHEN type_off_offlist LIKE '5%' AND yearoff_offlist='$curYear' THEN countday_offlist ELSE 0 END) AS cur_absent,
                    SUM(CASE WHEN type_off_offlist LIKE '6%'  AND yearoff_offlist='$curYear'THEN countday_offlist ELSE 0 END) AS cur_late,
                    SUM(CASE WHEN type_off_offlist LIKE '7%' AND yearoff_offlist='$curYear' THEN countday_offlist ELSE 0 END) AS cur_supend,
                (CASE 
                    WHEN MAX(nationality_emp_offlist) = 'ไทย' THEN 6
                    WHEN MAX(nationality_emp_offlist) = 'ลาว' THEN 15
                    ELSE 0
                END - SUM(CASE WHEN type_off_offlist LIKE '3%' AND year_leave_offlist = '$curYear' THEN countday_offlist ELSE 0 END)) AS remain_cur_vacation,
                (CASE 
                    WHEN MAX(nationality_emp_offlist) = 'ไทย' THEN 10
                    WHEN MAX(nationality_emp_offlist) = 'ลาว' THEN 6
                    ELSE 0
                END - SUM(CASE WHEN type_off_offlist LIKE '1%' THEN countday_offlist ELSE 0 END)) AS remain_business,
                (30 - SUM(CASE WHEN type_off_offlist LIKE '2%' THEN countday_offlist ELSE 0 END)) AS remain_cur_sick ,
                SUM(CASE WHEN type_off_offlist LIKE '3%' AND yearoff_offlist = '$curYear' AND year_leave_offlist='$prevYear'  THEN countday_offlist ELSE 0 END) AS prev_vecation_usage ,
                (CASE 
                    WHEN MAX(nationality_emp_offlist) = 'ไทย' THEN 6
                    WHEN MAX(nationality_emp_offlist) = 'ลาว' THEN 15
                    ELSE 0
                END  
                    - SUM(CASE WHEN type_off_offlist LIKE '3%' AND yearoff_offlist = '$prevYear' THEN countday_offlist ELSE 0 END))
                    - SUM(CASE WHEN type_off_offlist LIKE '3%' AND yearoff_offlist = '$curYear' AND year_leave_offlist='$prevYear'  THEN countday_offlist ELSE 0 END) AS prev_vecation_remain"
        )->first();
        return view('home', compact('sumleave' ,'duedate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
