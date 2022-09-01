<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company as Company;
use App\Scopes\FilterScope;
use App\Scopes\SearchScope;

class Contact extends Model
{
    use HasFactory;
    // public function __construct()
    // {
    //     $this->fillable = ['name', 'email', 'address', 'website'];
    // }
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id', 'user_id'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopelatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }

    // public function scopefilter($query)
    // {
    //     // Here i will check , if Company_id is Checked Then we will append Some Quey to the Builder 
    //         // Else No Appending 

    // }

    protected static function booted()
    {
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new SearchScope);
    }

    // public  function getRouteKeyName()
    // {
    //     return 'first_name';
    // }
}
