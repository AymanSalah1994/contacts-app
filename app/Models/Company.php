<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'website'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function userCompanies()
    {
        return self::where('user_id', auth()->id());
    }

    public function scopeSeachCompanies($query)
    {
        if ($search = request('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
            $query->orWhere('address', 'LIKE', "%{$search}%");
            $query->orWhere('email', 'LIKE', "%{$search}%");
            $query->orWhere('website', 'LIKE', "%{$search}%");
        }
    }
}
