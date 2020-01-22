<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Chatbot as Authenticatable;

class Chatbot extends Model
{
    protected $filable=['message'];

    protected $table = 'chatbot';
    
    public $timestamps=false;
}
