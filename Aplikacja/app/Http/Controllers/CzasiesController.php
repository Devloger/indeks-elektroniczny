<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Czasy;

use DB;

class CzasiesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('czasies.index', []);
	}

	public function create(Request $request)
	{
	    return view('czasies.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$czasy = Czasy::findOrFail($id);
	    return view('czasies.add', [
	        'model' => $czasy	    ]);
	}

	public function show(Request $request, $id)
	{
		$czasy = Czasy::findOrFail($id);
	    return view('czasies.show', [
	        'model' => $czasy	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM czasy a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE czas LIKE '%".$_GET['search']['value']."%' ";
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
		$czasy = null;
		if($request->id > 0) { $czasy = Czasy::findOrFail($request->id); }
		else { 
			$czasy = new Czasy;
		}
	    

	    		
			    $czasy->id = $request->id?:0;
				
	    		
					    $czasy->czas = $request->czas;
		
	    		
					    $czasy->created_at = $request->created_at;
		
	    		
					    $czasy->updated_at = $request->updated_at;
		
	    	    //$czasy->user_id = $request->user()->id;
	    $czasy->save();

	    return redirect('/czasies');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$czasy = Czasy::findOrFail($id);

		$czasy->delete();
		return "OK";
	    
	}

	
}