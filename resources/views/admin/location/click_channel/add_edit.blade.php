@extends("admin.common.main")
@section("content")
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">{{ trans('Admin/text_message.CC_CreateLocation') }}</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <a href="{{ action('Admin\ClickchannelController@index') }}">{{ trans('Admin/text_message.home') }}</a> / <a href="{{ action('Admin\ClickchannelController@index') }}">{{ trans('Admin/text_message.groupClickchannel') }}</a> / {{ trans('Admin/text_message.CC_CreateLocation') }}
              </div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-6">
                          <form role="form" id="formSubmit" action="{{ $actionLink }}" method="post">
                              <div class="form-group">
                                  <label>{{ trans('Admin/text_message.CC_VideoName') }}</label>
                                  <input class="form-control" name="name" value="{{ inputValue('name', $data) }}">
                              </div>
                              <div class="form-group">

                                  <label>{{ trans('Admin/text_message.CC_VideoUrl') }}</label>
                                  <input class="form-control" name="link_url" value="{{ inputValue('link_url', $data) }}">
                              </div>
                              <div class="form-group">
                                  <label>{{ trans('Admin/text_message.CC_VideoStart') }}</label>
                                  <input class="form-control datepicker" name="start" value="{{ inputValue('start', $data) }}">
                              </div>
                              <!-- <div class='input-group date' id='startDate'>
                                <input type='text' class="form-control" name="startDate" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div> -->
                              <div class="form-group">
                                  <label>{{ trans('Admin/text_message.CC_VideoEnd') }}</label>
                                  <input class="form-control datepicker" name="end" value="{{ inputValue('end', $data) }}">
                              </div>
                              <div class="form-group">
                                  <label>{{ trans('Admin/text_message.status') }}</label>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" value="1" name="status" {{ (isset($data[0]->status) && $data[0]->status == 1 ? 'checked': '') }} id="optionsRadios1" value="yes">{{ trans('Admin/text_message.active') }}
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" value="0" name="status" {{ (isset($data[0]->status) && $data[0]->status == 0 ? 'checked': '') }} id="optionsRadios2" value="no">{{ trans('Admin/text_message.noneActive') }}
                                      </label>
                                  </div>
                              </div>

                            @if($action == 'edit')
                            <input type="hidden" name="_method" value="put" >
                            @endif

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn btn-success">{{ trans('Admin/text_message.CC_BT_crate') }}</button>
                            <button type="reset" class="btn btn-default">{{ trans('Admin/text_message.CC_BT_Reset') }}</button>
                          </form>
                      </div>
                      <!-- /.col-lg-6 (nested) -->
                  </div>
                  <!-- /.row (nested) -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
@endsection
