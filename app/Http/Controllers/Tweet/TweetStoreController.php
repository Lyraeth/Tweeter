<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): RedirectResponse
    {
        Tweet::create([
            'user_id' => Auth::id(),
            'content' => request('content')
        ]);

        /*
        Cara Lama untuk store :

        $tweet = new Tweet();

        $tweet->user_id = Auth::id();
        $tweet->content = request('content');

        $tweet->save();
        */

        // Cara Baru


        return redirect()->back(); // fungsi back() untuk mengembalikan ke halaman selanjutnya / tetap di halaman tersebut
    }
}