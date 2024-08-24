<?php

namespace App\Http\Controllers;

use App\Models\Autobot;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AutobotController extends Controller
{
    //

    public function count()
    {
        // return response()->json(['count' => Autobot::count()]);
        $count = Autobot::count();
        return Inertia::render('Welcome', [
            // 'count' => time(),
            'count' => $count,
            // 'canRegister' => Route::has('register'),
            // 'laravelVersion' => Application::VERSION,
            // 'phpVersion' => PHP_VERSION,
        ]);
    }

    public function index()
    {

        $data = Autobot::paginate(10);
        return response()->json($data);
    }

    public function posts(Autobot $autobot)
    {
        $data = $autobot->posts()->paginate(10);
        return response()->json($data);
    }

    public function comments(Post $post)
    {
        $data = $post->comments()->paginate(10);
        return response()->json($data);
    }
}
