<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeDept;
use App\Models\EmployeeNationality;
use App\Models\EmployeeWorksite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $emp = Auth::user();
        $dept = EmployeeDept::where('code_tbl_deptemp', $emp['dept_emp'])->first(['name_deptemp']);
        $worksite = EmployeeWorksite::where('code_tbl_work_project', $emp['work_project_emp'])->first('name_work_project');
        $nation = EmployeeNationality::where('code_tbl_nationality', $emp['nationality_emp'])->first('name_nationality');
        return view('User.profile', compact('emp', 'dept', 'worksite', 'nation'));
    }

    public function showPhoto()
    {
        try {
            $emp = Auth::user();


            $nasIp = env('EMP_PIC_HOST');
            $port = env('EMP_PIC_PORT');
            $user = env('EMP_PIC_USER');
            $pass = env('EMP_PIC_PASSWORD');

            $defaultPhoto = public_path('imgs/default-avatar.png');

            // --- จัดการ Path แบบใหม่ (เน้นดึงแค่ชื่อไฟล์) ---
            // 1. ใช้ trim() ตัดช่องว่างด้านหน้าและด้านหลังที่ติดมาจาก Database ทิ้งให้หมดก่อน
            $rawPath = trim($emp->link_pig_emp);


            if (empty($rawPath)) {
                return response()->file($defaultPhoto, [
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0'
                ]);
            }

            // 2. แปลง \ เป็น /
            $rawPath = str_replace('\\', '/', $rawPath);

            // 3. หั่นเอาเฉพาะชื่อไฟล์
            $fileName = basename($rawPath);

            // 4. เข้ารหัสภาษาไทย (คราวนี้จะไม่มีช่องว่างหลอกๆ ต่อท้ายแล้ว)
            $encodedFileName = rawurlencode($fileName);

            $url = "http://$nasIp:$port/pic_emp/" . $encodedFileName;

            // 4. ตั้งค่า Authentication
            $context = stream_context_create([
                "http" => [
                    "header" => "Authorization: Basic " . base64_encode("$user:$pass"),
                    "timeout" => 5 // ป้องกันค้างถ้า NAS ช้า
                ]
            ]);

            // 5. ดึงไฟล์
            $content = @file_get_contents($url, false, $context);

            if ($content === false) {
                throw new \Exception("ไม่สามารถดึงไฟล์จาก WebDAV ได้");
            }

            // 6. ส่งค่ากลับเป็นรูปภาพ 
            return response($content)->header('Content-Type', 'image/jpeg')->header('Cache-Control', 'public, max-age=86400');
        } catch (\Exception $e) {
            return response()->file($defaultPhoto, [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0'
            ]);
        }
    }
}
