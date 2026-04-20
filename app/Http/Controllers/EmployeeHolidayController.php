<?php

namespace App\Http\Controllers;

use App\Models\EmployeeHoliday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
    }
    /**
     * Display the specified resource.
     */
    public function show(EmployeeHoliday $employeeHoliday)
    {
        //
    }
}
