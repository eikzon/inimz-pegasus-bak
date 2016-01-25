<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Admin\clickchannelRequest;
use App\Http\Controllers\Controller;
use App\Model\Admin\Location;
use View,Config;

class ClickchannelController extends Controller
{
    /**
    * DateCreate 2016-01-25
    * Create By inimz
    */
    private $default_path = 'admin.location.click_channel.';
    private $controller_path = 'Admin\ClickchannelController@';

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $Setdata['data'] = [];
        return View::make($this->default_path.'index', $Setdata) ;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $setData['actionLink']      = action($this->controller_path.'store') ;
        $setData['action']          = 'create' ;
        $setData['data']            = [];
        return View::make($this->default_path.'add_edit', $setData) ;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  App\Http\Requests\Admin\clickchannelRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(clickchannelRequest $request)
    {
      $dataInsert                     = $request->except(['_token','width','height']) ;
      // $dataInsert['size_display']     = $request->input('width').','.$request->input('height');
      // $dataInsert['user_id']          = $request->session()->get('backoffice')['id'] ;
      Location::create(beforeSql($dataInsert));
      return redirect()->action($this->default_path.'index');
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

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  App\Http\Requests\Admin\clickchannelRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(clickchannelRequest $request, int $id)
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
