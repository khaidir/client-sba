<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterCompany extends Model
{
    use HasFactory;

    protected $table = 'master_company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company',
        'description',
        'contract',
        'periode_start',
        'periode_end',
        'date',
        'status',
    ];

}
