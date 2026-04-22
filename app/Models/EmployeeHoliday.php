<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeHoliday extends Model
{
    protected $connection = 'empholiday';
    protected $table = 'tbl_offlist';
    protected $primaryKey = 'code_tblofflist';
    public $incrementing = false;
    protected $keyType = 'string';
}
