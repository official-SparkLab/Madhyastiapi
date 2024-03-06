<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint_Model extends Model
{
    use HasFactory;
    protected $table = 'tbl_complaint';
    protected $primaryKey = "comp_id";

    protected $fillable = [
        "bio_id",
        "user_id",
        'full_name',
        "user_type",
        "comp_desc",
        "comp_date",
        "trans_from",
    ];

    public $timestamps = false;
}
