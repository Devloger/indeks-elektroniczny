<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Group;

use DB;

class GroupsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('groups.index', []);
	}

	public function create(Request $request)
	{
	    return view('groups.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$group = Group::findOrFail($id);
	    return view('groups.add', [
	        'model' => $group	    ]);
	}

	public function show(Request $request, $id)
	{
		$group = Group::findOrFail($id);
	    return view('groups.show', [
	        'model' => $group	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM groups a ";
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
		$group = null;
		if($request->id > 0) { $group = Group::findOrFail($request->id); }
		else { 
			$group = new Group;
		}
	    

	    		
			    $group->id = $request->id?:0;
				
	    		
					    $group->name = $request->name;
		
	    		
					    $group->created_at = $request->created_at;
		
	    		
					    $group->updated_at = $request->updated_at;
		
	    	    //$group->user_id = $request->user()->id;
	    $group->save();

	    return redirect('/groups');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$group = Group::findOrFail($id);

		$group->delete();
		return "OK";
	    
	}

	
}