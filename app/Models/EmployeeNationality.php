<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeNationality extends Model
{
    protected $connection = 'empinfo';
    protected $table = 'tbl_nationality';
}
