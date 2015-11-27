@extends('app.roles')

@section('sub_content')
<div class="list">
    <div class="listTable">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="7">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 pull-right">
                                <a href="{{ URL::to('roles/new') }}" class="btn btn-info pull-right">{{ trans('app.addNew') }}</a>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th width="1"></th>
                    <th width="1"></th>
                    <th>{{ trans('app.role_name') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listData as $l)
	                <tr>
                        <td align="center">
                            @if($l->name != "admin")
                                <a href="{{ URL::to('roles/edit/'.$l->id) }}" class="btn btn-info fa fa-edit"></a>
                            @endif
                        </td>
	                    <td align="center">
                            @if($l->name != "admin")
                                <a  href="{{ URL::to('roles/delete/'.$l->id) }}" onClick="return confirm('{{ trans('app.del_btn_really_msg') }}');" class="btn btn-danger fa fa-trash"></a>
                            @endif
                        </td>
	                    <td>{{ $l->name }}</td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop