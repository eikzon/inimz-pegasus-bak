<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Admin\ClickchannelRequest;
use App\Http\Controllers\Controller;
use App\Model\Admin\ClickChannel;
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
    $Setdata['data'] = ClickChannel::where(['location_id' => 3])->orderBy('sort_order','desc')->get();
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
    $exp_link_url                   = explode('?v=',$request->link_url); /* explode url youtube */
    $dataInsert                     = $request->except(['_method','_token','height']) ;
    if($exp_link_url){
      $upDateData['link_url'] = last($exp_link_url);
    }
    $dataInsert['location_id']      = 3; /* Location View Page */
    $dataInsert['sort_order']       = ClickChannel::where(['location_id' => 3])->max('sort_order')+1;
    $dataInsert['user_id']          = 1 ;
    ClickChannel::create(beforeSql($dataInsert));
    return redirect()->action($this->controller_path.'index');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(int $id)
  {

  }
  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(int $id)
  {
    $specified = ClickChannel::find($id);
    if($specified){
      $setData['data'] = ClickChannel::where(['id' => $id])->get();
      if(!empty($setData['data']))
      {
        $setData['actionLink']      = action($this->controller_path.'update', ['id' => $id]) ;
        $setData['action']          = 'edit' ;
        return View::make($this->default_path.'add_edit', $setData) ;
      }
      else
      {
        return View::make($this->default_path.'index', $setData) ;
      }
    }
    else
    {
      return redirect()->action($this->controller_path.'index');
    }
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
    if($request->has('chg_status')){
      $specified = ClickChannel::find($id);
      if($specified){
        ClickChannel::where(['id'=>$id])->update(['status'=>$status]);
        return true;
      }
    } else {
      $exp_link_url                   = explode('?v=',$request->link_url); /* explode url youtube */
      $upDateData = $request->except(['_token','_method']);
      $upDateData['link_url']         = last($exp_link_url);
      ClickChannel::where(['id' => $id])->update($upDateData);
      return redirect()->action($this->controller_path.'index');
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(int $id)
  {
    ClickChannel::find($id)->delete();
    return 1; /* === true */
  }
}
