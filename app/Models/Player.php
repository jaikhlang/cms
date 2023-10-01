<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlayerCategory;


class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'fathername',
        'mothername',
        'dob',
        'phone',
        'email',
        'aiffcrsid',
        'playercategory_id',
        'contract_start',
        'contract_end',
        'contract_amount',
        'photo_url',
    ];

    public function playercategory()
    {
        return $this->belongsTo(PlayerCategory::class, 'playercategory_id');
    }
}
