<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $subscribers = Subscribers::paginate(config('pagination.count'));
        return view('admin.subscribers.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Subscribers $subscribers)
    {
        $subscribers->delete();
        return redirect()->route('admin.subscribers.index')->with('success', __('keywords.Subscribers_deleted_successfully'));
    }
}
