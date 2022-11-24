<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenAplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'birth_day',
        'name',
        'class',
    ];

    protected $hidden = [
        'children_id',
        'created_at',
        'updated_at',
    ];
    public function school() {
        return $this->belongsTo(School::class);
    }
}
