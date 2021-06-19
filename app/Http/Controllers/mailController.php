<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class mailController extends Controller
{
    public function send()
    {
        Mail::send(['text' => 'mail'], ['name'  => 'Admin'], function($message){
            $message->to('assasin2000ac@gmail.com', 'new Orders')->subject('Test mail');
            $message->from('lg.shop.kzn@gmail.com', 'OT LG');
        });
    }
}
