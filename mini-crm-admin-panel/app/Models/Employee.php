<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;

    public function company_details()
    {
        return $this->hasOne('App\Models\Company','id','company_id');
    }


}
