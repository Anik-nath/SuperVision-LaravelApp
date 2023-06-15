<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\user;

class Test extends Model
{ 
    use HasFactory;

    protected $fillable = ['name', 'totalMembers'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
    public function supervisor()
    {
        return $this->belongsTo(user::class, 'assigned_supervisor_id');
    }
}
