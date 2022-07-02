<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderByDesc('id')->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('message', 'Message delete successfully!');
    }
}
