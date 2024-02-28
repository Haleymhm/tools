<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['id_user','company_rutrif','company_name','company_address','company_telephone','company_email','company_logo'];

    public function getLogoUrl(){
            
        return asset("upload/avatar/".$this->company_logo);

    }
}
