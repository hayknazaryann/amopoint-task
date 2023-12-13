<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('list.index');
    }

    /**
     * @return View
     */
    public function visitors(): View
    {
        return view('visitors.index');
    }
}
