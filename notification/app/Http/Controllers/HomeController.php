<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index(){
        // return 'welcome';
        $user=User::first();
    $post=[
        'title'=>'post tile',
        'slug'=>'Post_slug'
    // ];
    // foreach($users as $user){
    // Notification::send($user, new WelcomeNotification($post));
    // }
    ];
    Notification::send($user, new WelcomeNotification($post));
    dd('success');

    }
}
