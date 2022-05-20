<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        return view("welcome");
    }

    public function store(Request $request)
    {
        $link = $request->validated("link");

        $pattern        = "#^((http(s?)://)(www\.)?)#";
        $subtractBefore = preg_replace($pattern, "", $link);

        $pattern       = "#((:\d+)?(/.+)*(\?.+)?)#";
        $subtractAfter = preg_replace($pattern, "", $subtractBefore);

        return response()->json([
            "link" => $link,
            "short" => $subtractAfter
        ]);
    }
}
