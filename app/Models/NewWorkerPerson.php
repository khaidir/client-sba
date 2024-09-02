<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewWorkerPerson extends Model
{
    use HasFactory;

    protected $table = 'worker_person';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'name',
        'email',
        'handphone',
        'company',
        'badge',
        'position',
        'pic',
        'certificate_period',
        'insurance',
        'status',
        'date_approval',
        'file_photo',
        'file_ktp',
        'file_company_idcard',
        'file_passport',
        'file_bpjs',
        'file_contract',
        'file_competences',
        'file_mcu',
        'license',
        'remarks',
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
