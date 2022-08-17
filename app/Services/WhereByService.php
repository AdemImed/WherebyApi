<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class WhereByService
{
    private string $authorization;

    public function __construct()
    {
        $this->authorization = config('services.whereby.key_type').' '.config('services.whereby.key');
    }

    public function getMeetings()
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.whereby.api_base_url'));

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    public function getMeeting($meetingId)
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.whereby.api_base_url').$meetingId);

        if ($result->status() === 200)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    public function createMeeting(array $data)
    {
        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post(config('services.whereby.api_base_url'),$data);

        if ($result->status() === 201)
        {
            return $result->json();
        }

        return response()->json($result->json(),$result->status());
    }

    public function deleteMeeting($meetingId): JsonResponse
    {
        $meeting = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get(config('services.whereby.api_base_url').$meetingId);

        if ($meeting->status() != 200)
        {
            return response()->json($meeting->json(),$meeting->status());
        }

        $result = Http::withHeaders([
            'Authorization' => $this->authorization,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->delete(config('services.whereby.api_base_url').$meetingId);

        if ($result->status() === 204)
        {
            return response()->json(['message'=>'The resource was deleted successfully']);
        }

        return response()->json($result->json(),$result->status());
    }
}
