<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Grupy;

use DB;

class GrupiesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('grupies.index', []);
	}

	public function create(Request $request)
	{
	    return view('grupies.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$grupy = Grupy::findOrFail($id);
	    return view('grupies.add', [
	        'model' => $grupy	    ]);
	}

	public function show(Request $request, $id)
	{
		$grupy = Grupy::findOrFail($id);
	    return view('grupies.show', [
	        'model' => $grupy	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM grupy a ";
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
		$grupy = null;
		if($request->id > 0) { $grupy = Grupy::findOrFail($request->id); }
		else { 
			$grupy = new Grupy;
		}
	    

	    		
			    $grupy->id = $request->id?:0;
				
	    		
					    $grupy->nazwa = $request->nazwa;
		
	    		
					    $grupy->created_at = $request->created_at;
		
	    		
					    $grupy->updated_at = $request->updated_at;
		
	    	    //$grupy->user_id = $request->user()->id;
	    $grupy->save();

	    return redirect('/grupies');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$grupy = Grupy::findOrFail($id);

		$grupy->delete();
		return "OK";
	    
	}

	
}