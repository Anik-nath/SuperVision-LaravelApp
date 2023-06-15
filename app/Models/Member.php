<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'member_id'];
    public function group()
    {
        return $this->belongsTo(Test::class, 'test_id', 'id','group_id');
    }
    
}
