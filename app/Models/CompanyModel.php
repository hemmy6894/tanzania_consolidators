<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $fillable = ["name","industry","contact_phone","contact_email","website","logo","address","short_description","country","slag"];
    public function getLogoUrlAttribute(){
        return asset('storage/'.$this->logo);
    }

    public static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->slag = strtolower(str_replace(" ","_",request()->input("name")));
        });
    }
}
