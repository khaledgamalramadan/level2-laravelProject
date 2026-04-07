<?php

namespace App\Http\Controllers;

use App\Models\message;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $messages = message::paginate(config('pagination.count'));
        return view('admin.messages.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     */

    public function show(message $message)
    {
        return view('admin.messages.show', get_defined_vars());
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(message $message)
    {
        $message->delete();
            return redirect()->route('admin.messages.index')->with('success', __('keywords.Message_deleted_successfully'));
    }
}
