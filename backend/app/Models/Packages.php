<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    protected $table = "packages";

    protected $fillable = [
      'package_name',
      'package_type',
      'package_location',
      'package_price',
      'package_feature',
      'package_details'
    ];

    public function role(){
        return $this->belongsTo("App\Models\Role","rol");
      }

}
