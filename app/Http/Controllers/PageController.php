<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() {

        $dbObject = [
            'pageTitle' => 'Titre de page',
            'title' => 'Titre',
            'text' => 'Text',
            'html' => '<h1>The Real Title</h1>',
            'items' => ['Ananas', 'Blueberry', 'Carot'],
            'animals' => []
            // 'animals' => ['Chien', 'Chat', 'Lapin']
        ];

        return view('about',  $dbObject);
    }
}
