<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $fillable = ["name","industry","contact_phone","contact_email","website","logo","address","short_description","country"];
    public function getLogoUrlAttribute(){
        return asset($this->logo);
    }
}
