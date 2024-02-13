<?php

namespace App\Http\Controllers\Follow;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FollewerController extends Controller
{
    public function store(User $user)
    {
        $user->followers()->attach( auth()->user()->id );
        return back();
    }

    public function destroy(User $user){
        $user->followers()->detach(auth()->user()->id);
        return back();
    }
}
