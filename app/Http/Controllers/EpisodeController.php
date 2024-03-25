<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Requests\EpisodeRequest;
use Illuminate\Support\Facades\Session;

class EpisodeController extends Controller
{
    
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $filter = Session::get('filterData', []);
        $peer = $this->setFilter($filter);
        $episodes = $peer->paginate(15);
       
        return view('episodes', [ 'episodes' => $episodes, 'filter' => $filter]);
    }

     /**
     * filter of the resource.
     */
    public function filter(EpisodeRequest $request)
    {
        $datas = $request->all();
        // Put filter data into the session
        Session::put('filterData', $datas);
        return redirect()->route('episodes');
    }

    /**
     * sort of the resource.
     */
    public function sort(Request $request)
    {
        $sortname = $request->name;

        $sortable = ['id', 'name', 'air_date', 'episode'];

       if (!in_array($sortname, $sortable)) {
            return redirect()->route('episodes');
       }
        $filter = Session::get('filterData', []);

        $sortby = explode('-',$filter['sortby'] ?? null);  
        if($sortname == $sortby[0]) {
            $filter['sortby'] = ($sortby[1] == 'asc') ? $sortname.'-desc' : $sortname.'-asc';
        } else {
            $filter['sortby'] = $sortname.'-asc';
        }

        // Put filter data into the session
        Session::put('filterData', $filter);
        return redirect()->route('episodes');
    }

    protected function setFilter($filter) {

        $peer = $this->getPeer();
        if($filter['query'] ?? false) {
            $peer->where('name', 'like', '%'.$filter['query'].'%');
        }
        if($filter['start'] ?? false) {
            $peer->where('air_date', '>=', $filter['start']);
        }
        if($filter['end']  ?? false) {
            $peer->where('air_date', '<=', $filter['end']);
        }
        if($filter['sortby'] ?? false) {
            $sortby = explode('-',$filter['sortby']);  
            $peer->orderBy($sortby[0], $sortby[1]);
        }
        return $peer;

    }

    protected function getPeer() {
        return Episode::with('characters');
    }

}
