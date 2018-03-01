<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Wydzialy;

use DB;

class WydzialiesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('wydzialies.index', []);
	}

	public function create(Request $request)
	{
	    return view('wydzialies.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$wydzialy = Wydzialy::findOrFail($id);
	    return view('wydzialies.add', [
	        'model' => $wydzialy	    ]);
	}

	public function show(Request $request, $id)
	{
		$wydzialy = Wydzialy::findOrFail($id);
	    return view('wydzialies.show', [
	        'model' => $wydzialy	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM wydzialy a ";
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
		$wydzialy = null;
		if($request->id > 0) { $wydzialy = Wydzialy::findOrFail($request->id); }
		else { 
			$wydzialy = new Wydzialy;
		}
	    

	    		
			    $wydzialy->id = $request->id?:0;
				
	    		
					    $wydzialy->nazwa = $request->nazwa;
		
	    		
					    $wydzialy->created_at = $request->created_at;
		
	    		
					    $wydzialy->updated_at = $request->updated_at;
		
	    	    //$wydzialy->user_id = $request->user()->id;
	    $wydzialy->save();

	    return redirect('/wydzialies');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$wydzialy = Wydzialy::findOrFail($id);

		$wydzialy->delete();
		return "OK";
	    
	}

	
}