<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

class IncomeCategory extends Model
{
    //use HasFactory;

    use HasFactory, SoftDeletes;

    protected $primaryKey = 'incate_id';
    protected $dates = ['deleted_at'];

    //protected $primaryKey = 'incate_id';


    // 🔹 Creator Relationship
    public function creatorInfo()
    {
        return $this->belongsTo(User::class, 'incate_creator', 'id');
    }

    // 🔹 Editor Relationship
    public function editorInfo()
    {
        return $this->belongsTo(User::class, 'incate_editor', 'id');

    }


}
