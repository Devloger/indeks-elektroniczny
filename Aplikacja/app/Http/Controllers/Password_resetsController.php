<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Password_reset;

use DB;

class Password_resetsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('password_resets.index', []);
	}

	public function create(Request $request)
	{
	    return view('password_resets.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$password_reset = Password_reset::findOrFail($id);
	    return view('password_resets.add', [
	        'model' => $password_reset	    ]);
	}

	public function show(Request $request, $id)
	{
		$password_reset = Password_reset::findOrFail($id);
	    return view('password_resets.show', [
	        'model' => $password_reset	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM password_resets a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE token LIKE '%".$_GET['search']['value']."%' ";
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
		$password_reset = null;
		if($request->id > 0) { $password_reset = Password_reset::findOrFail($request->id); }
		else { 
			$password_reset = new Password_reset;
		}
	    

	    		
					    $password_reset->email = $request->email;
		
	    		
					    $password_reset->token = $request->token;
		
	    		
					    $password_reset->created_at = $request->created_at;
		
	    	    //$password_reset->user_id = $request->user()->id;
	    $password_reset->save();

	    return redirect('/password_resets');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$password_reset = Password_reset::findOrFail($id);

		$password_reset->delete();
		return "OK";
	    
	}

	
}