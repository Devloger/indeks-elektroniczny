<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Deparment;

use DB;

class DeparmentsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('deparments.index', []);
	}

	public function create(Request $request)
	{
	    return view('deparments.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$deparment = Deparment::findOrFail($id);
	    return view('deparments.add', [
	        'model' => $deparment	    ]);
	}

	public function show(Request $request, $id)
	{
		$deparment = Deparment::findOrFail($id);
	    return view('deparments.show', [
	        'model' => $deparment	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM deparments a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE name LIKE '%".$_GET['search']['value']."%' ";
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
		$deparment = null;
		if($request->id > 0) { $deparment = Deparment::findOrFail($request->id); }
		else { 
			$deparment = new Deparment;
		}
	    

	    		
			    $deparment->id = $request->id?:0;
				
	    		
					    $deparment->name = $request->name;
		
	    		
					    $deparment->created_at = $request->created_at;
		
	    		
					    $deparment->updated_at = $request->updated_at;
		
	    	    //$deparment->user_id = $request->user()->id;
	    $deparment->save();

	    return redirect('/deparments');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$deparment = Deparment::findOrFail($id);

		$deparment->delete();
		return "OK";
	    
	}

	
}