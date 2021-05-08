<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table='feedbacks';
    protected $primaryKey = "f_id";
    public function cat_info(){
        return $this->hasOne('App\Models\feedbackcatagory','fc_id','feed_cat_id');
    }

    public static function getAllfeedback(){
        return feedback::with(['cat_info'])->orderBy('fc_id','DESC')->paginate(10);
    }
}
