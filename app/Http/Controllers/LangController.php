<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function update($lang)
    {
        App::setLocale(strtolower($lang));
        app()->setLocale(strtolower($lang));
        Session::put('lang', strtolower($lang));
        session()->put('lang', strtolower($lang));

        Session::flash('success', __('Language has been changed'));
        return redirect()->back();
    }
}
