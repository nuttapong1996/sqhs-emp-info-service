<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDriverlicense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmployeeDriverlicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = Auth::user();
        $license = EmployeeDriverlicense::where('code_emp_driverlicense', $emp['code_emp'])->get();


        $licenseMap = [
            'wheel_10_driverlicense'       => 1,
            'wheel_12_ud_driverlicense'    => 2,
            'wheel_12_hino_driverlicense'  => 3,
            'wheel_12_volvo_driverlicense' => 4,
            'backhoe_driverlicense'        => 5,
            'long_boom_driverlicense'      => 6,
            'breaker_driverlicense'        => 7,
            'front_shovel_driverlicense'   => 8,
            'bulldozer_driverlicense'      => 9,
            'wheel_dozer_driverlicense'    => 10,
            'motor_grader_driverlicense'   => 11,
            'wheel_loader_driverlicense'   => 12,
            'pile_driverlicense'           => 13,
            'water_truck_driverlicense'    => 14,
            'compactor_driverlicense'      => 15,
            'fuel_truck_driverlicense'     => 16,
            'pick_up_driverlicense'        => 17,
            'service_truck_driverlicense'  => 18,
            'trailer_driverlicense'        => 19,
            'hiab_driverlicense'           => 20,
            'crane_driverlicense'          => 21,
            'folklift_driverlicense'       => 22,
            'hd785_driverlicense'          => 23,
            'other_driverlicense'          => 24
        ];

        foreach ($license as $lc) {
            $activeLicenses = [];

            foreach ($licenseMap as $field => $idx) {
                if ($lc[$field] === 'T') {
                    $activeLicenses[] = [
                        'license_name' => ucwords(str_replace('_', ' ', str_replace('_driverlicense', '', $field))),
                        'status'       => 'T',
                        'issue_date'   => $lc['date_of_issue_' . $idx] ?? null,
                        'expiry_date'  => $lc['date_of_expiry_' . $idx] ?? null
                    ];
                }
            }
        }
        return view('driver-license' , compact('activeLicenses'));
    }
}
