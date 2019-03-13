<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show (Message $message) {

        // $messages = Message::find($id);

        return view('messages.show', [
            'message' => $message,
        ]);

    }

    public function create(CreateMessageRequest $request) {

        $user = $request->user();

        $message = Message::create([
            'user_id' => $user->id,
            'content' => $request->input('message'),
            'image' => 'https://picsum.photos/600/580?image='.mt_rand(0, 1000),
        ]);

        return redirect('/messages/'.$message->id);
        
    }

}
