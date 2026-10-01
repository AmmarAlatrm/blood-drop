<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // الحقول المسموح بتعبئتها
    protected $fillable = [
        'username',
        'password',
        'usertype',
    ];

    // إخفاء كلمة المرور عند جلب البيانات
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // تشفير كلمة المرور تلقائياً قبل حفظها في قاعدة البيانات
    protected $casts = [
        'password' => 'hashed',
    ];

    // --- العلاقات ---

    /**
     * علاقة 1-لـ-1 مع جدول userinfos
     * (إذا كان المستخدم نوعه 'normal' أي متبرع)
     */
    public function userinfo()
    {
        return $this->hasOne(Userinfo::class);
    }

    /**
     * علاقة 1-لـ-1 مع جدول hospitals
     * (إذا كان المستخدم نوعه 'hospital')
     */
    public function hospital()
    {
        return $this->hasOne(Hospital::class);
    }

    /**
     * علاقة 1-لـ-متعدد مع جدول donations
     * (جلب جميع تبرعات هذا المستخدم)
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
