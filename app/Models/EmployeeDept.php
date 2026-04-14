<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDept extends Model
{
    protected $connection = 'empinfo';
    protected $table ='tbl_dept_emp';
}
