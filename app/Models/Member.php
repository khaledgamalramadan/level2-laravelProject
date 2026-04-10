<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members';



    /**
     * the attributes that are mass assignable
     * @var array
     */
    protected $guarded = ['id'];



    /**
     *
     *
     */
    const uploadpath = 'images/';
}