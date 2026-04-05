<?php

namespace App\Models;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';



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