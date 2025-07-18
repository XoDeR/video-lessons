<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class GuestHomeController extends Controller
{
    public function index(Request $request): Response
    {
        $lessons = Lesson::query()
            ->latest()
            ->paginate(8)
            ->appends($request->all());

        return Inertia::render('GuestHome/Index', [
            'lessons' => $lessons,
        ]);
    }

    public function show(Lesson $lesson): Response
    {
        $lesson->load('quiz');
        return Inertia::render('GuestHome/Show', [
            'lesson' => $lesson,
        ]);
    }
}
