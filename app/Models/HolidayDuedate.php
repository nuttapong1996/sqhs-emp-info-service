<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HolidayDuedate extends Model
{
    protected $connection ='empholiday';
    protected $table ='tbl_duedate';

   public $casts = [
        'current_duedate' => 'date',
        'past_year_duedate' => 'date',
   ];
}
