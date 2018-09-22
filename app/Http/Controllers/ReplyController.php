<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function show($id)
    {
        $replies = \App\Reply::where('thread_id',$id)
            ->get();
        return $replies;
    }
}
