<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccessExtended extends Model
{
    use HasFactory;

    protected $table = 'access_extended';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'work_detail',
        'number_contract',
        'type_contract',
        'periode',
        'date_request',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected function company() {
        return $this->belongsTo(MasterCompany::class);
    }
}
