<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormApplicants extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','date_signed','student_signature','parent_name','parent_date_signed','parent_signature','document', 'resume','personal_statement','document'];
}
