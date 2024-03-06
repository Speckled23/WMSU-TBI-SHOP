<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','vendor_id','message','image1','image2','imgae3'
    ];

    public static function deliveryAddresses(){
        $deliveryAddresses = Message::where('user_id',Auth::user()->id)->get()->toArray();
        return $deliveryAddresses;
    }
}
