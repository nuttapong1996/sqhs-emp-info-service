<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDriverlicense extends Model
{
    protected $connection = 'empinfo';
    protected $table = 'tbl_driverlicense';


    public $casts = [
        ''
    ];
}
