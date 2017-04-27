@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 align="center">E D I T  T A S K</h1>
        <div class="col-md-offset-3 col-md-6">
             <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- new task form -->
                 <form action="{{ url('update/'.$task->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-title" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-6">
                            <input type="text" name="title" id="task-title" value="{{ $task->title }}" class="form-control">
                        </div>
                        <br><br>
                        <label for="task-content" class="col-sm-3 control-label">Content</label>

                        <div class="col-sm-6">
                            <textarea type="text" name="content" id="task-content" class="form-control" style="resize:none;">{{ $task->content }}</textarea>
                        </div>
                    </div>      

                    <!-- Update Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection