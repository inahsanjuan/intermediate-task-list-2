@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
			@if (count($tasks) > 0)
			    <div class="panel panel-default">
			        <div class="panel-heading">
			            Current Tasks
			        </div>

			        <div class="panel-body">
			            <table class="table table-striped task-table">

			                <!-- Table Headings -->
			                <thead>
			                    <th>Task Title</th>
                                <th>Task Content</th>
                                <th>&nbsp;</th>
			                    <th>&nbsp;</th>
			                </thead>

			                <!-- Table Body -->
			                <tbody align="left">
			                    @foreach ($tasks as $task)
			                    <tr>
			                        <!-- Task Name -->
			                        <td class="table-text">
			                            <div><a type="button" data-toggle="modal" data-target="#myModal-{{ $task->id }}" style="text-decoration:none;">
                                            {{ str_limit($task->title, 15) }}</a>
                                            <div id="myModal-{{ $task->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">{{ $task->title }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{ $task->content }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
			                        </td>
                                    <td>
                                        <div> {{ str_limit($task->content, 30) }} </div>
                                        <!--  <div><a data-toggle="tooltip" title="{{ $task->content }}" style="text-decoration:none;">
                                         {{ str_limit($task->content, 30) }} </div></a> -->
                                    </td>
                                    <td>
                                        <form action="{{ url('view/'.$task->id) }}" method="POST">
                                         {{ csrf_field() }}
                                         {{ method_field('PUT') }}
                                            @if ($task->status == FALSE)
                                                <a data-toggle="tooltip" title="Incomplete" style="text-decoration:none;">
                                                <button type="submit" name="status" id="check-status-{{ $task->id }}" class="btn btn-default" value=1>✔</button></a>
                                            @else
                                                <a data-toggle="tooltip" title="Complete" style="text-decoration:none;">
                                                <button type="submit" name="status" id="check-status-{{ $task->id }}" class="btn btn-primary" value=0>✔</button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('edit/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <a data-toggle="tooltip" title="Update" style="text-decoration:none;">
                                            <button type="submit" id="edit-task-{{ $task->id }}" class="btn btn-default">
                                              <i class="fa fa-btn fa-trash"></i>Ꙟ
                                            </button></a>
                                        </form>
                                    </td>
			                        <td>
			                            <form action="{{ url('task/'.$task->id) }}" method="POST">
			                                                {{ csrf_field() }}
			                                                {{ method_field('DELETE') }}
			                            	<a data-toggle="tooltip" title="Delete" style="text-decoration:none;">
                                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
			                                        <i class="fa fa-btn fa-trash"></i>✗
			                            	</button></a>
			                            </form>
			                        </td>
			                    </tr>
			                    @endforeach
			                </tbody>
			            </table>
			        </div>
			    </div>           
		    @endif
	    </div>
    </div>
</div>
@endsection
