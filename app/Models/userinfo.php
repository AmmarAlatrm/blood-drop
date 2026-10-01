<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'age',
        'address',
        'mobile',
        'bloodtype',
        'available',
        'hospital_id',
    ];

    // --- العلاقات ---

    /**
     * العلاقة العكسية: بيانات المتبرع تتبع لحساب مستخدم واحد
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * العلاقة العكسية: المتبرع قد يكون مرتبطاً بمشفى معين
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
