@extends('admin.layout')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('web.exams')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">{{__('web.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('web.exams')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pb-3">
                    @include('admin.inc.errors')
                    <form method="POST" action="{{url("dashboard/exams/update-questions/{$exam->id}/{$ques->id}")}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" value="{{$ques->title}}">
                                        </div>
                                    </div>
    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Right Ans.</label>
                                            <input type="number" name="right_ans"  value="{{$ques->right_ans}}" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Option 1</label>
                                            <input type="text" name="option_1" value="{{$ques->option_1}}" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Option 2</label>
                                            <input type="text" name="option_2" value="{{$ques->option_2}}" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Option 3</label>
                                            <input type="text" name="option_3" value="{{$ques->option_3}}" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Option 4</label>
                                            <input type="text" name="option_4" value="{{$ques->option_4}}" class="form-control">
                                        </div>
                                    </div>
    
                                </div>
                            <div>
                                {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                                <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
    $('#skill-select').select2();
});
</script>
@endsection