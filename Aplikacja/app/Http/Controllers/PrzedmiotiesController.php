<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Przedmioty;

use DB;

class PrzedmiotiesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('przedmioties.index', []);
	}

	public function create(Request $request)
	{
	    return view('przedmioties.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$przedmioty = Przedmioty::findOrFail($id);
	    return view('przedmioties.add', [
	        'model' => $przedmioty	    ]);
	}

	public function show(Request $request, $id)
	{
		$przedmioty = Przedmioty::findOrFail($id);
	    return view('przedmioties.show', [
	        'model' => $przedmioty	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM przedmioty a ";
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
		$przedmioty = null;
		if($request->id > 0) { $przedmioty = Przedmioty::findOrFail($request->id); }
		else { 
			$przedmioty = new Przedmioty;
		}
	    

	    		
			    $przedmioty->id = $request->id?:0;
				
	    		
					    $przedmioty->nazwa = $request->nazwa;
		
	    		
					    $przedmioty->created_at = $request->created_at;
		
	    		
					    $przedmioty->updated_at = $request->updated_at;
		
	    	    //$przedmioty->user_id = $request->user()->id;
	    $przedmioty->save();

	    return redirect('/przedmioties');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$przedmioty = Przedmioty::findOrFail($id);

		$przedmioty->delete();
		return "OK";
	    
	}

	
}