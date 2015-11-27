@extends('app.users')

@section('sub_content')
<div class="list">
    <div class="listTable">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="8">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 pull-right">
                                <a href="{{ URL::to('users/new') }}" class="btn btn-info pull-right">{{ trans('app.addNew') }}</a>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th width="1"></th>
                    <th width="1"></th>
                    <th width="1"></th>
                    <th>{{ trans('app.username') }}</th>
                    <th>{{ trans('app.name_surname') }}</th>
                    <th>E-mail</th>
                    <th>{{ trans('app.role') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listData as $l)
	                <tr>
	                    <td align="center"><a href="{{ URL::to('users/edit/'.$l->id) }}" class="btn btn-info fa fa-edit"></a></td>
	                    <td align="center"><a  href="{{ URL::to('users/show/'.$l->id) }}" class="btn btn-warning fa fa-eye"></a></td>
                        <td align="center">
                            @if($l->username != "admin")
                                <a  href="{{ URL::to('users/delete/'.$l->id) }}" onClick="return confirm('{{ trans('app.del_btn_really_msg') }}');" class="btn btn-danger fa fa-trash"></a>
                            @endif
                        </td>
	                    <td>{{ @$l->username }}</td>
	                    <td>{{ @$l->adsoyad }}</td>
	                    <td>{{ @$l->email }}</td>
	                    <td>{{ @$l->role->name }}</td>
	                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop