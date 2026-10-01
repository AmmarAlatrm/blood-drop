<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'city',
        'address',
        'mobile',
        'is_approved',
    ];

    // --- العلاقات ---

    /**
     * العلاقة العكسية: المشفى يتبع لحساب مستخدم واحد
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * علاقة 1-لـ-متعدد: المشفى له العديد من الإعلانات
     */
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * علاقة 1-لـ-متعدد: المشفى لديه العديد من المتبرعين (المسجلين لديه)
     */
    public function userinfos()
    {
        return $this->hasMany(Userinfo::class);
    }

    /**
     * علاقة 1-لـ-متعدد: المشفى جرت فيه العديد من التبرعات
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
