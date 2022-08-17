<?php

namespace App\Http\Controllers\Web\V1\Meeting;

use App\Http\Controllers\Controller;

class MeetingController extends Controller
{
    public function index()
    {
        return view('iframe');
    }
}
