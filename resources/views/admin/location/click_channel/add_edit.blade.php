@extends("admin.common.main")
@section("content")
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">{{ trans('banner_messages.CC_CreateLocation') }}</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <a href="{{ action('Admin\ClickchannelController@index') }}">{{ trans('banner_messages.home') }}</a> / <a href="{{ action('Admin\ClickchannelController@index') }}">{{ trans('banner_messages.groupClickchannel') }}</a> / {{ trans('banner_messages.CC_CreateLocation') }}
              </div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-6">
                          <form role="form" id="formSubmit" action="{{ $actionLink }}" method="post">
                              <div class="form-group">
                                  <label>{{ trans('banner_messages.CC_VideoName') }}</label>
                                  <input class="form-control" name="location_name" value="{{ inputValue('location_name', $data) }}">
                              </div>
                              <div class="form-group">
                                  <label>{{ trans('banner_messages.CC_VideoUrl') }}</label>
                                  <input class="form-control" name="limit" value="{{ inputValue('limit', $data) }}">
                              </div>
                              <div class="form-group">
                                  <label>{{ trans('banner_messages.status') }}</label>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" value="1" name="status" {{ (isset($data[0]->status) && $data[0]->status == 1 ? 'checked': '') }} id="optionsRadios1" value="yes">{{ trans('banner_messages.active') }}
                                      </label>
                                  </div>
                                  <div class="radio">
                                      <label>
                                          <input type="radio" value="0" name="status" {{ (isset($data[0]->status) && $data[0]->status == 0 ? 'checked': '') }} id="optionsRadios2" value="no">{{ trans('banner_messages.noneActive') }}
                                      </label>
                                  </div>
                              </div>

                              @if($action == 'edit')
                            <input type="hidden" name="id" value="{{$data[0]->id}}" >
                            <input type="hidden" name="_method" value="put" >
                              @endif

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn btn-success">{{ trans('banner_messages.CC_BT_crate') }}</button>
                            <button type="reset" class="btn btn-default">{{ trans('banner_messages.CC_BT_Reset') }}</button>
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