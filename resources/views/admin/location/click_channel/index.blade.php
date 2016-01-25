@extends("admin.common.main")
@section("title")
    {{ trans('banner_messages.groupUser') }}
@endsection
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('banner_messages.groupClickchannel') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-body">

                <div class="pull-left">
                    <form class="form-inline" actioon="{{ action('Admin\LocationController@index') }}">
                        <input type="text" class="form-control" id="" name="q" value="{{ (isset($search)?$search:'') }}">
                        <button type="submit" class="btn btn-default">{{ trans('banner_messages.search') }}</button>
                    </form>
                </div>


                <div class="pull-right">
                    <a href="{{ action('Admin\ClickchannelController@create') }}" class="btn btn-default">{{ trans('banner_messages.CC_CreateLocation') }}</a>
                </div>

            </div>

        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ action('Admin\DashboardController@index') }}">{{ trans('banner_messages.home') }}</a> / {{ trans('banner_messages.groupClickchannel') }}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>{{ trans('banner_messages.id') }}</th>
                                    <th>{{ trans('banner_messages.clickchannel_thumbnail') }}</th>
                                    <th>{{ trans('banner_messages.status') }}</th>
                                    <th>{{ trans('banner_messages.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <!-- @include('admin.common.pagination') -->
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
