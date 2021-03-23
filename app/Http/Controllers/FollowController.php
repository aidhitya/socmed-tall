<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($user, $follow)
    {
        $user = User::whereHash($user)->orWhere('username', $user)->firstOrFail();

        if ($follow === 'following') {
            $follows = $user->follows()->paginate(10);
        } elseif ($follow === 'followers') {
            $follows = $user->followers()->paginate(10);
        } else {
            abort('404');
        }

        return view('Follow.index',[
            'follows' => $follows,
            'follow' => $follow
        ]);
    }
}
