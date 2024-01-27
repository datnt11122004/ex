<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'wards';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public function wards()
    {
        return $this ->belongsTo(Ward::class, 'district_code','code');
    }
}
