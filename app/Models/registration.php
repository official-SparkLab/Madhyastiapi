<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;
    protected $table = 'tbl_registration';
    protected $primaryKey = "user_id";

    protected $fillable = [
        'full_name',
        "state",
        "district",
        "taluka",
        "village",
        "contact_no",
        "password",
        "work_as",
        "adhar_no",
        "gender",
        "user_type",
        "trans_from",
    ];

    public $timestamps = false;
}
