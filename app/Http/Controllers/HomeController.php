<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Session;
use Carbon\Carbon;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('home', compact('invoices'));
    }

    public function setLanguage($lang = 'ru')
    {
        if (!in_array($lang, ['ru', 'en'])) {
            $lang = 'ru';
        }
        App::setLocale($lang);
        Carbon::setLocale($lang);

        Session::put('language', $lang);
        
        return back();
    }
}
