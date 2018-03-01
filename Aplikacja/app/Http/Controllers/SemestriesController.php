<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Semestry;

use DB;

class SemestriesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('semestries.index', []);
	}

	public function create(Request $request)
	{
	    return view('semestries.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$semestry = Semestry::findOrFail($id);
	    return view('semestries.add', [
	        'model' => $semestry	    ]);
	}

	public function show(Request $request, $id)
	{
		$semestry = Semestry::findOrFail($id);
	    return view('semestries.show', [
	        'model' => $semestry	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM semestry a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE nazwa LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.id) c".$presql);
		//print_r($qcount);
		$count = $qcount[0]->c;

		$results = DB::select($sql);
		$ret = [];
		foreach ($results as $row) {
			$r = [];
			foreach ($row as $value) {
				$r[] = $value;
			}
			$ret[] = $r;
		}

		$ret['data'] = $ret;
		$ret['recordsTotal'] = $count;
		$ret['iTotalDisplayRecords'] = $count;

		$ret['recordsFiltered'] = count($ret);
		$ret['draw'] = $_GET['draw'];

		echo json_encode($ret);

	}


	public function update(Request $request) {
	    //
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
		$semestry = null;
		if($request->id > 0) { $semestry = Semestry::findOrFail($request->id); }
		else { 
			$semestry = new Semestry;
		}
	    

	    		
			    $semestry->id = $request->id?:0;
				
	    		
					    $semestry->nazwa = $request->nazwa;
		
	    		
					    $semestry->wartosc = $request->wartosc;
		
	    		
					    $semestry->created_at = $request->created_at;
		
	    		
					    $semestry->updated_at = $request->updated_at;
		
	    	    //$semestry->user_id = $request->user()->id;
	    $semestry->save();

	    return redirect('/semestries');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$semestry = Semestry::findOrFail($id);

		$semestry->delete();
		return "OK";
	    
	}

	
}