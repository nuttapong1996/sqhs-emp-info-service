<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorksite extends Model
{
    protected $connection = 'empinfo';
    protected $table = 'tbl_work_project';
}
