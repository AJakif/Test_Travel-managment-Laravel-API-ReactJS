<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbackcatagory extends Model
{
    use HasFactory;
   
    protected $primaryKey = "fc_id";
    protected $table = "feedbackcategories";

   
}
