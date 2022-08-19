<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company as Company;

class Contact extends Model
{
    use HasFactory;
    // public function __construct()
    // {
    //     $this->fillable = ['name', 'email', 'address', 'website'];
    // }
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
