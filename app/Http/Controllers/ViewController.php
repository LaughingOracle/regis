<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;

class ViewController extends Controller
{
    //

    public function index(){
        
        return view('home');
    }

    public function search(Request $request)
    {
        $search = $request->get('q', '');

        $lastSpacePos = strrpos($search, ' ');

        if ($lastSpacePos !== false) {
            $search = substr($search, $lastSpacePos + 1); // +1 to skip the space itself
        }


        $results = Title::where('title', 'like', '%' . $search . '%')
        ->limit(10)
        ->get(['title as label', 'title as value', 'full_title as desc']);

        return response()->json($results);
    }
}
