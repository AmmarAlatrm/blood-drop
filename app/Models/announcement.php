<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_id',
        'neededbloodtype',
        'timestamp',
    ];

    // --- العلاقات ---

    /**
     * العلاقة العكسية: الإعلان يتبع لمشفى واحد
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
