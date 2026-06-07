<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // যদি default users table ব্যবহার করো → $table লিখার দরকার নেই
    // যদি custom table ব্যবহার করো → uncomment করো
    //protected $table = 'custom_users';
    // protected $primaryKey = 'user_id';

    public $timestamps = true;

    /**
     * Mass assignable fields
     * 
     */
     // Custom table name
    
    protected $fillable = [
        // Default Laravel Auth columns
        'name',     
        'email',    
        'password',

        // Custom user table columns
        'user_name',
        'user_email',
        'username',
        'user_pw',
        'role_id',
        'user_photo',
    ];

    /**
     * Hidden fields for serialization
     */
    protected $hidden = [
        'password',
        'remember_token',
        'user_pw', // hide custom password column if needed
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}


