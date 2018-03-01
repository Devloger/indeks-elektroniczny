<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Direction;

use DB;

class DirectionsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('directions.index', []);
	}

	public function create(Request $request)
	{
	    return view('directions.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$direction = Direction::findOrFail($id);
	    return view('directions.add', [
	        'model' => $direction	    ]);
	}

	public function show(Request $request, $id)
	{
		$direction = Direction::findOrFail($id);
	    return view('directions.show', [
	        'model' => $direction	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM directions a ";
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
		$direction = null;
		if($request->id > 0) { $direction = Direction::findOrFail($request->id); }
		else { 
			$direction = new Direction;
		}
	    

	    		
			    $direction->id = $request->id?:0;
				
	    		
					    $direction->name = $request->name;
		
	    		
					    $direction->created_at = $request->created_at;
		
	    		
					    $direction->updated_at = $request->updated_at;
		
	    	    //$direction->user_id = $request->user()->id;
	    $direction->save();

	    return redirect('/directions');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$direction = Direction::findOrFail($id);

		$direction->delete();
		return "OK";
	    
	}

	
}