<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Note::query()->latest('id')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'body' => ['nullable', 'string'],
        ]);

        return response()->json(Note::create($data), 201);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json(Note::query()->findOrFail($id));
    }
}
