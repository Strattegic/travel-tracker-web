<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComingSoonController extends Controller
{
  public function show()
  {
    return view('coming-soon');
  }

  public function saveMailAddress(Request $request)
  {
    $validatedData = $request->validate([
      'email' => 'required|email|unique:notify_mails,email',
    ]);

    $mail = new \App\NotifyMail();
    $mail -> email = $request -> get('email');
    $mail -> save();
    return redirect('/') -> with('success', true);
  }
}
