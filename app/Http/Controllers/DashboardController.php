<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        switch (Auth::user()->role) {
            case '0':
                $navbarView = 'Admin.admin-nav-menu';
                break;
            case '1':
                $navbarView = 'Eleve.eleve-navbar';
                break;
            case '2':
                $navbarView = 'Eleve.parent-navbar';
                break;
            case '3':
                $navbarView = 'Eleve.enseignant-navbar';
                break;

        }

        return view('dashboard', [
            'navbarView' => $navbarView,
        ]);
    }
}

