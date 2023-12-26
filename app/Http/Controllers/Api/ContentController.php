<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Response;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar semua konten.',
            'data' => $contents
        ], Response::HTTP_OK);
    }
}
