<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bioDataModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_add_bio_data';
    protected $primaryKey = "bio_id";

    protected $fillable = [
        "user_id",
        'full_name',
        "date_of_birth",
        "birth_time",
        "gender",
        "cast",
        "education",
        "district",
        "taluka",
        "village",
        "adhar_no",
        "contact_no",
        "upload_image",
        "expectations",
        "upload_bio_data",
        "user_type",
        "trans_from",
    ];

    public $timestamps = false;
}
