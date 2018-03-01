<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lekcje;

use DB;

class LekcjesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('lekcjes.index', []);
	}

	public function create(Request $request)
	{
	    return view('lekcjes.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$lekcje = Lekcje::findOrFail($id);
	    return view('lekcjes.add', [
	        'model' => $lekcje	    ]);
	}

	public function show(Request $request, $id)
	{
		$lekcje = Lekcje::findOrFail($id);
	    return view('lekcjes.show', [
	        'model' => $lekcje	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM lekcje a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE grupa LIKE '%".$_GET['search']['value']."%' ";
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
		$lekcje = null;
		if($request->id > 0) { $lekcje = Lekcje::findOrFail($request->id); }
		else { 
			$lekcje = new Lekcje;
		}
	    

	    		
			    $lekcje->id = $request->id?:0;
				
	    		
					    $lekcje->grupa = $request->grupa;
		
	    		
					    $lekcje->wykladowca = $request->wykladowca;
		
	    		
					    $lekcje->przedmiot = $request->przedmiot;
		
	    		
					    $lekcje->ocena = $request->ocena;
		
	    		
					    $lekcje->data_oceny = $request->data_oceny;
		
	    		
					    $lekcje->ocena_poprawkowa = $request->ocena_poprawkowa;
		
	    		
					    $lekcje->data_oceny_poprawkowej = $request->data_oceny_poprawkowej;
		
	    		
					    $lekcje->czas = $request->czas;
		
	    		
					    $lekcje->created_at = $request->created_at;
		
	    		
					    $lekcje->updated_at = $request->updated_at;
		
	    	    //$lekcje->user_id = $request->user()->id;
	    $lekcje->save();

	    return redirect('/lekcjes');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$lekcje = Lekcje::findOrFail($id);

		$lekcje->delete();
		return "OK";
	    
	}
	
	public function updejt(Lekcje $l)
    {
        if(
            request()->grade1
            AND
            (
                request()->grade1 < 2
                OR
                request()->grade1 > 5
            )
        )
        {
            request()->grade1 = null;
        }
        if(
            request()->grade2
            AND
            (
                request()->grade2 < 2
                OR
                request()->grade2 > 5
            )
        )
        {
            request()->grade2 = null;
        }
        
        
        $l->update([
            'ocena' => request()->grade1,
            'ocena_poprawkowa' => request()->grade2,
            'data_oceny' => request()->date1,
            'data_oceny_poprawkowej' => request()->date2,
        ]);
        return redirect()->back();
    }

	
}