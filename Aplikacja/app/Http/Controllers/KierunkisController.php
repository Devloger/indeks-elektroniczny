<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kierunki;

use DB;

class KierunkisController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('kierunkis.index', []);
	}

	public function create(Request $request)
	{
	    return view('kierunkis.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$kierunki = Kierunki::findOrFail($id);
	    return view('kierunkis.add', [
	        'model' => $kierunki	    ]);
	}

	public function show(Request $request, $id)
	{
		$kierunki = Kierunki::findOrFail($id);
	    return view('kierunkis.show', [
	        'model' => $kierunki	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM kierunki a ";
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
		$kierunki = null;
		if($request->id > 0) { $kierunki = Kierunki::findOrFail($request->id); }
		else { 
			$kierunki = new Kierunki;
		}
	    

	    		
			    $kierunki->id = $request->id?:0;
				
	    		
					    $kierunki->nazwa = $request->nazwa;
		
	    		
					    $kierunki->created_at = $request->created_at;
		
	    		
					    $kierunki->updated_at = $request->updated_at;
		
	    	    //$kierunki->user_id = $request->user()->id;
	    $kierunki->save();

	    return redirect('/kierunkis');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$kierunki = Kierunki::findOrFail($id);

		$kierunki->delete();
		return "OK";
	    
	}

	
}