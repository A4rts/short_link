<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkRequest;
use App\Models\ShortLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShortLinkContorller extends Controller
{
    public function index()
    {
        $shortlinks = ShortLink::all();
        return view('link', compact('shortlinks'));
    }

    public function link(ShortLinkRequest $request)
    {
        $validate_data = $request->validated();

        ShortLink::create([
            'shortlink' => Str::random(4),
            'link' => $validate_data['link'],
        ]);

        return redirect('/');
    }

    public function shorter($shortlink)
    {
        $arta = ShortLink::where('shortlink', $shortlink)->first();
        // return $arta->link;
        return redirect($arta->link);
    }
}
