<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PersonalContent;

class GraphController extends Controller
{
  function rmgraph(Request $request){
		$personalcontents = New PersonalContent();
        $personalcontents->forceFill(json_decode($request->personalcontents,true));
	}
}
