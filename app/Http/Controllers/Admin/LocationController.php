<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\LocationRequest;
use App\Http\Controllers\Controller;
use App\Model\Admin\Location;
use View,Config;

class LocationController extends Controller
{
    /**
    * DateCreate 2016-01-21
    * Create By golf
    */

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if ($request->has('q'))
        {
            $search                 = e($request->input('q')) ;
            $setData['data']        = Location::orWhere('id', 'LIKE', '%'.$search.'%')
                                        ->orWhere('group_name', 'LIKE', '%'.$search.'%')
                                        ->orderBy('id', 'desc')
                                        ->paginate(Config::get('admin.defultRecord'));

            $setData['pagination']  = $setData['data']->appends(['q' => $request->input('q')])->links() ;
            $setData['search']      = $request->input('q') ;
        }
        else
        {
            $setData['data']        = Location::with('user')->orderBy('id' , 'desc')
                                        ->paginate(Config::get('admin.defultRecord'));

            $setData['pagination']  = $setData['data']->links() ;
        }

        return View::make('admin.location.index', $setData) ;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $setData['actionLink']      = action('Admin\LocationController@store') ;
        $setData['action']          = 'create' ;
        $setData['data']            = [];
        return View::make('admin.location.add_edit', $setData) ;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  App\Http\Requests\Admin\LocationRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(LocationRequest $request)
    {
        $dataInsert                     = $request->except(['_token','width','height']) ;
        $dataInsert['size_display']     = $request->input('width').','.$request->input('height');
        $dataInsert['user_id']          = $request->session()->get('backoffice')['id'] ;
        Location::create(beforeSql($dataInsert));
        return redirect()->action('Admin\LocationController@index');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(int $id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(int $id)
    {
        $setData['data']                = Location::where('id', $id)->get() ;
        $cutData                        = explode(',', $setData['data'][0]['size_display']);

        $setData['data'][0]['width']    = $cutData[0];
        $setData['data'][0]['height']   = $cutData[1];

        // d($setData['data']->toArray()) ;
        $setData['actionLink']      = action('Admin\LocationController@update',['id'=>$id]) ;

        if ($setData['data'])
        {
            $setData['action']      = 'edit' ;
            return View::make('admin.location.add_edit', $setData) ;
        }
        else
        {
            return abort(404);
        }
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  App\Http\Requests\Admin\LocationRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(LocationRequest $request, int $id)
    {
        d($_POST) ;
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(int $id)
    {
        //
    }
}
