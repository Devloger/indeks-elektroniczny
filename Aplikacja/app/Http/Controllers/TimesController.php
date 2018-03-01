<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Time;

use DB;

class TimesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('times.index', []);
	}

	public function create(Request $request)
	{
	    return view('times.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$time = Time::findOrFail($id);
	    return view('times.add', [
	        'model' => $time	    ]);
	}

	public function show(Request $request, $id)
	{
		$time = Time::findOrFail($id);
	    return view('times.show', [
	        'model' => $time	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM times a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE value LIKE '%".$_GET['search']['value']."%' ";
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
		$time = null;
		if($request->id > 0) { $time = Time::findOrFail($request->id); }
		else { 
			$time = new Time;
		}
	    

	    		
			    $time->id = $request->id?:0;
				
	    		
					    $time->value = $request->value;
		
	    		
					    $time->created_at = $request->created_at;
		
	    		
					    $time->updated_at = $request->updated_at;
		
	    	    //$time->user_id = $request->user()->id;
	    $time->save();

	    return redirect('/times');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$time = Time::findOrFail($id);

		$time->delete();
		return "OK";
	    
	}

	
}