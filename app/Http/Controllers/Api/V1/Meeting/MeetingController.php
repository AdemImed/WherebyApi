<?php

namespace App\Http\Controllers\Api\V1\Meeting;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhereByRequest;
use App\Services\WhereByService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeetingController extends Controller
{
    protected $whereby;

    public function __construct()
    {
        $this->whereby = new WhereByService();
    }

    public function getMeetings()
    {
        return $this->whereby->getMeetings();
    }

    public function getMeeting($meetingId)
    {
        return $this->whereby->getMeeting($meetingId);
    }

    public function createMeeting(WhereByRequest $request)
    {
        return $this->whereby->createMeeting($request->validated());
    }

    public function deleteMeeting($meetingId)
    {
        return $this->whereby->deleteMeeting($meetingId);
    }
}
