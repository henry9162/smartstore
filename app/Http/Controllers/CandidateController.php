<?php

namespace SmartStore\Http\Controllers;

use SmartStore\Candidate;

use SmartStore\Way;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
	public function getCandidates()
	{

		$candidates = Candidate::all();
		$ways = Way::all();
		

    	return view('candidate.index')->withCandidates($candidates)->withWays($ways);
	}

}
