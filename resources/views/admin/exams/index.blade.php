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
                <div class="col">
                    <div class="card">
                        @include('admin.inc.messages')
                        <div class="card-header">
                            <h3 class="card-title">{{__('web.allexams')}}</h3>
    
                            <div class="card-tools">
                                <a href="{{url('dashboard/exams/create')}}" class="btn btn-small btn-primary">Add New</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name (en)</th>
                                        <th>Name (ar)</th>
                                        <th>Image</th>
                                        <th>Skill</th>
                                        <th>Questions no.</th>
                                        <th>Active</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($exams as $exam)
                                <tbody id="exams-table">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$exam->name('en')}}</td>
                                        <td>{{$exam->name('ar')}}</td>
                                        <td>
                                            <img src="{{asset("storage/uploads/exams/$exam->img")}}" height="50px">
                                        </td>
                                        <td>{{$exam->skill->name('en')}}</td>
                                        <td>{{$exam->questions_no}}</td>
                                        <td>
                                            @if($exam->active)
            
                                            <span class="badge bg-success">yes</span>
                                            @else
            
                                            <span class="badge bg-danger">no</span>
            
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url("dashboard/exams/show/$exam->id")}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{url("dashboard/exams/show/$exam->id/questions")}}" class="btn btn-sm btn-success"><i class="fas fa-question"></i></a>
                                            <a href="{{url("dashboard/exams/edit/$exam->id")}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="{{url("dashboard/exams/delete/$exam->id")}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                            <a href="{{url("dashboard/exams/toggle/$exam->id")}}" class="btn btn-sm btn-secondary"><i class="fas fa-toggle-on"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center my-3">

                {{$exams->links()}}

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection