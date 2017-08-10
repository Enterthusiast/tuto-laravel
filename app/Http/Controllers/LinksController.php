<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Link;

class LinksController extends Controller
{
    //
    public function create() {
        return view('links/create', ['pageTitle' => 'Raccourcir un lien']);
    }

    public function store(Request $request) {

        // $link = Link::where('url', '=', $request->input('url'))->first();

        // if(!$link) {
        //     $link = Link::create(['url' => $request->input('url')]);
        // }

        $link = Link::firstOrcreate(['url' => $request->input('url')]);

        return view('links/store', 
            [
                'pageTitle' => 'Lien raccourci',
                'link' => $link,
            ]
        );
    }

    public function show(Request $request, $link) {
        return redirect(Link::findOrFail($link)->url, 301);
    }

}
