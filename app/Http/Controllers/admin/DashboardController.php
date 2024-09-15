<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Article;
use App\Models\Event;
use App\Models\Officer;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $articlesCount = Article::count();
        $eventsCount = Event::count();
        $officersCount = Officer::count();

        return view('admin.dashboard', compact('articlesCount', 'eventsCount', 'officersCount'));
    }
}