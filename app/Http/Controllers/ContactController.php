<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        $authors = User::with('authorProfile')
            ->where('role', 'author')
            ->latest()
            ->paginate(9);

        return view('pages.contact', [
            'authors' => $authors
        ]);
    }
}
