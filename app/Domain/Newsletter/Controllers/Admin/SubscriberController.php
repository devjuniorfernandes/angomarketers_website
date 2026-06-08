<?php

namespace App\Domain\Newsletter\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Newsletter\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of subscribers.
     */
    public function index()
    {
        $subscribers = Subscriber::latest()->paginate(25);
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
