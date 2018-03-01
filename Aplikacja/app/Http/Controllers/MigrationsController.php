<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Migration;

use DB;

class MigrationsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('migrations.index', []);
	}

	public function create(Request $request)
	{
	    return view('migrations.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$migration = Migration::findOrFail($id);
	    return view('migrations.add', [
	        'model' => $migration	    ]);
	}

	public function show(Request $request, $id)
	{
		$migration = Migration::findOrFail($id);
	    return view('migrations.show', [
	        'model' => $migration	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM migrations a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE migration LIKE '%".$_GET['search']['value']."%' ";
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
		$migration = null;
		if($request->id > 0) { $migration = Migration::findOrFail($request->id); }
		else { 
			$migration = new Migration;
		}
	    

	    		
			    $migration->id = $request->id?:0;
				
	    		
					    $migration->migration = $request->migration;
		
	    		
					    $migration->batch = $request->batch;
		
	    	    //$migration->user_id = $request->user()->id;
	    $migration->save();

	    return redirect('/migrations');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$migration = Migration::findOrFail($id);

		$migration->delete();
		return "OK";
	    
	}

	
}