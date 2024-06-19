<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;

class PusherController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function broadcast(Request $request)
  {
    Broadcast(new PusherBroadcast($request->get('message')))->toOthers();
    return view('broadcast',['message'=>$request->get('message')]);
  }

  public function receiver(Request $request)
  {
    return view('receiver',['message'=>$request->get('message')]);
  }
}
