<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $connection = 'empinfo';
    protected $table = 'tbl_emp';

    protected $primaryKey = 'code_emp';

    public $timestamps = false;

    public $incrementing = false;

    protected $keyType = 'string';

    public function getAuthPassword()
    {
        return null;
    }
}
