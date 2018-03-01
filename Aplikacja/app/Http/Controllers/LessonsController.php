<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lesson;

use DB;

class LessonsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('lessons.index', []);
	}

	public function create(Request $request)
	{
	    return view('lessons.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$lesson = Lesson::findOrFail($id);
	    return view('lessons.add', [
	        'model' => $lesson	    ]);
	}

	public function show(Request $request, $id)
	{
		$lesson = Lesson::findOrFail($id);
	    return view('lessons.show', [
	        'model' => $lesson	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM lessons a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE group_id LIKE '%".$_GET['search']['value']."%' ";
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
		$lesson = null;
		if($request->id > 0) { $lesson = Lesson::findOrFail($request->id); }
		else { 
			$lesson = new Lesson;
		}
	    

	    		
			    $lesson->id = $request->id?:0;
				
	    		
					    $lesson->group_id = $request->group_id;
		
	    		
					    $lesson->user_id = $request->user_id;
		
	    		
					    $lesson->item_id = $request->item_id;
		
	    		
					    $lesson->final_grade = $request->final_grade;
		
	    		
					    $lesson->final_grade_date = $request->final_grade_date;
		
	    		
					    $lesson->re_final_grade = $request->re_final_grade;
		
	    		
					    $lesson->re_final_grade_date = $request->re_final_grade_date;
		
	    		
					    $lesson->time_id = $request->time_id;
		
	    		
					    $lesson->created_at = $request->created_at;
		
	    		
					    $lesson->updated_at = $request->updated_at;
		
	    	    //$lesson->user_id = $request->user()->id;
	    $lesson->save();

	    return redirect('/lessons');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$lesson = Lesson::findOrFail($id);

		$lesson->delete();
		return "OK";
	    
	}

	
}