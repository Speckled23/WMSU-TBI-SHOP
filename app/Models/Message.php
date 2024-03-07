<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'message'; // Specify the custom table name

    protected $fillable = [
        'user_id', 'vendor_id', 'message', 'video_proof'
    ];
}

