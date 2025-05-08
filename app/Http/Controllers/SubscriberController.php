<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the subscribers.
     */
    public function index()
    {
        $subscribers = Subscriber::orderBy('id', 'DESC')->latest()->get();
        return view('dashboard.pages.subscriber', compact('subscribers'));
    }
}
