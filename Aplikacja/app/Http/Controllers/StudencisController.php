<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Studenci;

use DB;

class StudencisController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('studencis.index', []);
	}

	public function create(Request $request)
	{
	    return view('studencis.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$studenci = Studenci::findOrFail($id);
	    return view('studencis.add', [
	        'model' => $studenci	    ]);
	}

	public function show(Request $request, $id)
	{
		$studenci = Studenci::findOrFail($id);
	    return view('studencis.show', [
	        'model' => $studenci	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM studenci a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE imie LIKE '%".$_GET['search']['value']."%' ";
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
		$studenci = null;
		if($request->id > 0) { $studenci = Studenci::findOrFail($request->id); }
		else { 
			$studenci = new Studenci;
		}
	    

	    		
			    $studenci->id = $request->id?:0;
				
	    		
					    $studenci->imie = $request->imie;
		
	    		
					    $studenci->nazwisko = $request->nazwisko;
		
	    		
					    $studenci->pesel = $request->pesel;
		
	    		
					    $studenci->data_urodzenia = $request->data_urodzenia;
		
	    		
					    $studenci->album = $request->album;
		
	    		
					    $studenci->wydzial = $request->wydzial;
		
	    		
					    $studenci->semestr = $request->semestr;
		
	    		
					    $studenci->grupa = $request->grupa;
		
	    		
					    $studenci->kierunek = $request->kierunek;
		
	    		
					    $studenci->created_at = $request->created_at;
		
	    		
					    $studenci->updated_at = $request->updated_at;
		
	    	    //$studenci->user_id = $request->user()->id;
	    $studenci->save();

	    return redirect('/studencis');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$studenci = Studenci::findOrFail($id);

		$studenci->delete();
		return "OK";
	    
	}
	
	public function zapisz(\App\Studenci $id)
    {
        \App\Lekcje::create([
            'student' => $id->id,
            'grupa' => $id->grupa,
            'wykladowca' => request()->wykladowca,
            'przedmiot' => request()->przedmiot,
            'czas' => \App\Czasy::first()->czas,
        ]);
        
        return redirect()->back();
    }

	
}