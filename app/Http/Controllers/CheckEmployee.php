<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckEmployee extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'empcode' => 'required|string',
            ],
            [
                'empcode.required' => 'กรุณากรอกรหัสพนักงาน',
            ]
        );


        $empCode = $request->empcode;

        $employee = Employee::where('code_emp', $empCode)->first();

        if ($employee) {
            Auth::login($employee);
            $request->session()->regenerate();

            return redirect()->route('home');
        }
        return back()->with('error', 'ไม่พบรหัสพนักงาน');
    }

    // หน้า Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->header('Clear-Site-Data', '"cache"');;
    }
}
