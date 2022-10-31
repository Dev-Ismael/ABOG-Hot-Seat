<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'plan_id',
        'payment_method',
        'status',
    ];


    ############################## Relations ################################
    public function user(){
        return  $this -> belongsTo("App\Models\User") ;
    }
    public function plan(){
        return  $this -> belongsTo("App\Models\Plan") ;
    }

}
