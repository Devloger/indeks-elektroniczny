<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Item;

use DB;

class ItemsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('items.index', []);
	}

	public function create(Request $request)
	{
	    return view('items.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$item = Item::findOrFail($id);
	    return view('items.add', [
	        'model' => $item	    ]);
	}

	public function show(Request $request, $id)
	{
		$item = Item::findOrFail($id);
	    return view('items.show', [
	        'model' => $item	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM items a ";
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
		$item = null;
		if($request->id > 0) { $item = Item::findOrFail($request->id); }
		else { 
			$item = new Item;
		}
	    

	    		
			    $item->id = $request->id?:0;
				
	    		
					    $item->name = $request->name;
		
	    		
					    $item->created_at = $request->created_at;
		
	    		
					    $item->updated_at = $request->updated_at;
		
	    	    //$item->user_id = $request->user()->id;
	    $item->save();

	    return redirect('/items');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$item = Item::findOrFail($id);

		$item->delete();
		return "OK";
	    
	}

	
}