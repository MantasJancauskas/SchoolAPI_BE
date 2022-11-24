<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'zip_code',
        'address',
        'role'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function childrenaplication()
    {
        return $this->hasMany(ChildrenAplication::class);
    }
}
