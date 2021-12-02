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
                    <form method="POST" action="{{url("dashboard/exams/update/$exam->id")}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Name (en)</label>
                                        <input type="text" name="name_en" value="{{$exam->name('en')}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Name (ar)</label>
                                        <input type="text" name="name_ar" value="{{$exam->name('ar')}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Description (en)</label>
                                        <textarea rows="5" name="desc_en" class="form-control">{{$exam->desc('en')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Description (ar)</label>
                                        <textarea rows="5" name="desc_ar" class="form-control">{{$exam->desc('ar')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Skill</label>
                                        <select class="form-control" id="skill-select" name="skill_id">
                                        @foreach ($skills as $skill)
                                            <option value="{{$skill->id}}" @if ($exam->skill_id == $skill->id) selected @endif >{{$skill->name('en')}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Difficulty</label>
                                        <input type="number" name="difficulty" value="{{$exam->difficulty}}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Duration (mins.)</label>
                                        <input type="number" name="duration_mins" value="{{$exam->duration_mins}}" class="form-control">
                                    </div>
                                </div> 
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success">Submit</button>
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