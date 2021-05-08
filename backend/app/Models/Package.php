<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $primaryKey = "p_id";


    public function cat_info(){
        return $this->hasOne('App\Models\packagecatagory','pc_id','package_type');
    }

    public static function getAllpackages(){
        return package::with(['cat_info'])->orderBy('pc_id','DESC')->paginate(10);
    }

    public static function countActivePackages(){
        $data=Package::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }
}
