<?php

namespace SmartStore\Http\Controllers;

use SmartStore\Way;

use SmartStore\Subject;

use DB;

use View;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(Request $request)
	{
		$query = $request->input('query');

		
		$ways = Way::where(DB::raw("CONCAT(name)"),
			'LIKE', "%{$query}%")->get();


		return view('search.result')->with('ways', $ways);
	}


	public function getSearch(Request $request)
	{
		$wayss = Way::all();
		
		$query = $request->input('query');

		$subjects = Subject::where('way_id', '=', $query)->get();

		$ways = Way::where('id', '=', $query)->get();

		//dd($way);

		return view('search.getSearch')->withWays($ways)->with('wayss', $wayss)->withSubjects($subjects);
	}


	public function getCategories(Request $request)
	{
		$ways = Way::all();


		return view('search.candidates')->with('ways', $ways);
		/*return Response()
            ->json([View::make('search.getSearch', $ways)], 200);*/
	}


}
