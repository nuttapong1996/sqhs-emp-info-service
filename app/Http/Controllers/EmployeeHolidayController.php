<?php

namespace App\Http\Controllers;

use App\Models\EmployeeHoliday;
use Illuminate\Http\Request;

class EmployeeHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('holiday');
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
    public function show(EmployeeHoliday $employeeHoliday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeHoliday $employeeHoliday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeHoliday $employeeHoliday)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeHoliday $employeeHoliday)
    {
        //
    }
}
