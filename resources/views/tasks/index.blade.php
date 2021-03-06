@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 align="center">T A S K</h1>
        <div class="col-md-offset-3 col-md-6">
             <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- new task form -->
                <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-title" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-6">
                            <input type="text" name="title" id="task-title" class="form-control">
                        </div>
                        <br><br>
                        <label for="task-content" class="col-sm-3 control-label">Content</label>

                        <div class="col-sm-6">
                            <textarea type="text" name="content" id="task-content" class="form-control" style="resize:none;">

                            </textarea>
                        </div>
                    </div>      

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-plus"></i> Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <!-- TODO: Current Task -->
        </div>
    </div>
</div>
@endsection