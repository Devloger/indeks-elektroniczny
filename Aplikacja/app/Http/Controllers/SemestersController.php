<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Semester;

use DB;

class SemestersController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('semesters.index', []);
	}

	public function create(Request $request)
	{
	    return view('semesters.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$semester = Semester::findOrFail($id);
	    return view('semesters.add', [
	        'model' => $semester	    ]);
	}

	public function show(Request $request, $id)
	{
		$semester = Semester::findOrFail($id);
	    return view('semesters.show', [
	        'model' => $semester	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM semesters a ";
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
		$semester = null;
		if($request->id > 0) { $semester = Semester::findOrFail($request->id); }
		else { 
			$semester = new Semester;
		}
	    

	    		
			    $semester->id = $request->id?:0;
				
	    		
					    $semester->name = $request->name;
		
	    		
					    $semester->value = $request->value;
		
	    		
					    $semester->created_at = $request->created_at;
		
	    		
					    $semester->updated_at = $request->updated_at;
		
	    	    //$semester->user_id = $request->user()->id;
	    $semester->save();

	    return redirect('/semesters');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$semester = Semester::findOrFail($id);

		$semester->delete();
		return "OK";
	    
	}

	
}