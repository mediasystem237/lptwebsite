<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\Officer;
use App\Models\Setting;
use App\Models\Testimonial; // Importez correctement le modèle Testimonial
use App\Models\Faq;         // Importez également le modèle Faq
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function home()
    {
        $upcomingEvents = Event::where('start_time', '>', now())
            ->orderBy('start_time')
            ->take(3)
            ->get();
        
        $latestArticles = Article::where('published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
        
        $settings = Setting::pluck('value', 'key')->all();
        
        return view('home', compact('upcomingEvents', 'latestArticles', 'settings'));
    }
    
    public function about()
    {
        $settings = Setting::pluck('value', 'key')->all();

        // Récupérer les membres de l'équipe depuis la table `officers`
        $teamMembers = Officer::all(); // Utilisation du modèle Officer

        // Récupérer les témoignages
        $testimonials = Testimonial::all();

        // Récupérer les FAQs
        $faqs = Faq::all();

        return view('about', compact('settings', 'teamMembers', 'testimonials', 'faqs'));
    }
    
    
    public function officers()
    {
        $officers = Officer::all();
        return view('officers', compact('officers'));
    }
    
    public function articles()
    {
        $articles = Article::where('published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        return view('articles', compact('articles'));
    }
    
    public function events()
    {
        $events = Event::where('start_time', '>', now())
            ->orderBy('start_time')
            ->paginate(10);
        return view('events', compact('events'));
    }
    
    public function contact()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('contact', compact('settings'));
    }
}
