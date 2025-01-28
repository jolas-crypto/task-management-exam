<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeArchived($query)
    {
        return $query->where('archived', true);
    }

    public function scopeUnArchived($query)
    {
        return $query->where('archived', false);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class,'assigned_to');
    }
}
