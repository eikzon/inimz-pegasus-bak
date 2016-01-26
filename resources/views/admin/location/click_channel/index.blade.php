@extends("admin.common.main")
@section("title")
  {{ trans('Admin/text_message.groupUser') }}
@endsection
@section("content")
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ trans('Admin/text_message.groupClickchannel') }}</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel-body">
        <div class="pull-left">
          <form class="form-inline" actioon="{{ action('Admin\LocationController@index') }}">
            <input type="text" class="form-control" id="" name="q" value="{{ (isset($search)?$search:'') }}">
            <button type="submit" class="btn btn-default">{{ trans('Admin/text_message.search') }}</button>
          </form>
        </div>
        <div class="pull-right">
          <a href="{{ action('Admin\ClickchannelController@create') }}" class="btn btn-default">{{ trans('Admin/text_message.CC_CreateLocation') }}</a>
        </div>
      </div>
    </div>
<<<<<<< HEAD
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{ action('Admin\DashboardController@index') }}">{{ trans('Admin/text_message.home') }}</a> / {{ trans('Admin/text_message.groupClickchannel') }}
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>{{ trans('Admin/text_message.id') }}</th>
                  <th>{{ trans('Admin/text_message.clickchannel_name') }}</th>
                  <th>{{ trans('Admin/text_message.clickchannel_thumbnail') }}</th>
                  <th>{{ trans('Admin/text_message.clickchannel_sort') }}</th>
                  <th>{{ trans('Admin/text_message.status') }}</th>
                  <th>{{ trans('Admin/text_message.action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $val)
                  <tr>
                    <td align="center">{{ $val->id }}</td>
                    <td align="center">{{ $val->name }}</td>
                    <td align="center"><embed width="200" height="150" src="http://www.youtube.com/embed/{{ $val->link_url }}"></td>
                    <td align="center">{{ $val->sort_order }}</td>
                    <td align="center">
                      @if ($val->status == 1)
                        {{ trans('Admin/text_message.CC_status_open') }}
                      @else ($val->status == 2)
                        {{ trans('Admin/text_message.CC_status_close') }}
                      @endif
                    </td>
                    <td align="center">
                      <a href="{{ action('Admin\ClickchannelController@edit', ['id'=>$val->id]) }}" class="btn btn-default">{{ trans('Admin/text_message.CC_bt_edit') }}</a>
                      <button onclick="deleteFn('{{ action('Admin\ClickchannelController@destroy',['id'=>$val->id]) }}')" type="reset" class="btn btn-danger">{{ trans('Admin/text_message.CC_bt_delete') }}</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
          <!-- @include('admin.common.pagination') -->
=======
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ action('Admin\DashboardController@index') }}">{{ trans('Admin/text_message.home') }}</a> / {{ trans('Admin/text_message.groupClickchannel') }}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>{{ trans('Admin/text_message.id') }}</th>
                                    <th>{{ trans('Admin/text_message.clickchannel_name') }}</th>
                                    <th>{{ trans('Admin/text_message.clickchannel_thumbnail') }}</th>
                                    <th>{{ trans('Admin/text_message.clickchannel_sort') }}</th>
                                    <th>{{ trans('Admin/text_message.status') }}</th>
                                    <th>{{ trans('Admin/text_message.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td align="center">{{ $val->id }}</td>
                                    <td align="center">{{ $val->name }}</td>
                                    <td align="center"><embed width="200" height="150" src="{{ $val->link_url }}"></td>
                                    <td align="center">
                                      @if ($val->status == 1)
                                        {{ trans('Admin/text_message.CC_status_open') }}
                                      @else ($val->status == 2)
                                        {{ trans('Admin/text_message.CC_status_close') }}
                                      @endif
                                    </td>
                                    <td align="center">
                                      <a href="{{ action('Admin\ClickchannelController@edit', ['id'=>$val->id]) }}" class="btn btn-default">{{ trans('Admin/text_message.CC_bt_edit') }}</a>
                                      <button onclick="deleteFn('{{ action('Admin\ClickchannelController@destroy',['id'=>$val->id]) }}')" type="reset" class="btn btn-danger">{{ trans('Admin/text_message.CC_bt_delete') }}</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <!-- @include('admin.common.pagination') -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
>>>>>>> feature_backup
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <!-- /.row -->
@endsection
