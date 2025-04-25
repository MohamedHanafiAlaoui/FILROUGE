<?php

namespace App\Http\Controllers;

use App\Events\UserTyping;
use App\Models\SolutionsAdaptees;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class AgricoleSolutionsAdapteesController extends Controller
{

    public function index()
    {

        $users = User::where('id', '!=', Auth::id())->get();
        return view('agricole/index', compact('users'));
    }

    public function chat(Request $request)
    {

        $users = User::where('id', '!=', Auth::id())->get();


        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        $receiverid = $request->input('user_id');

        $receiver = User::find($receiverid);
        $messages = SolutionsAdaptees::Where(function ($query) use ($receiverid) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $receiverid);
        })->orWhere(function ($query) use ($receiverid) {
            $query->where('sender_id', $receiverid)->where('receiver_id', Auth::id());


        })->orderBy('created_at')->get();


        return view('agricole/index', compact('receiver', 'messages','users'));

    }


    public function sendMessage(Request $request)
    {
        $SolutionsAdapt = SolutionsAdaptees::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request['receiver_id'],
            'content' => $request['content'],
        ]);

        broadcast(new MessageSent($SolutionsAdapt))->toOthers();

        return response()->json(['status' => 'Message sent!'] );


    }



    public function typing()
    {

        broadcast(new UserTyping(Auth::id()))->toOthers();

        return response()->json(['status' => 'typing brodcadted!'] );


    }

    public function setOnline()
    {
        Cache::put('user-is-online-' . Auth::id(), true, now()->addMinutes(10));
        return response()->json(['status' => 'online']);
    }
    



    public function setOffline()
    {

       Cache::forget('user-is-online-'. Auth::id());
       return response()->json(['ststus' => 'Offline'] );



    }

}
