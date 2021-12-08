@extends('admin.layout')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('web.skills')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">{{__('web.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('web.skills')}}</li>
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
                            <h3 class="card-title">{{__('web.allskills')}}</h3>
    
                            <div class="card-tools">
                                <button type="button" class="btn btn-small btn-primary" data-toggle="modal" data-target="#add-modal">Add New</button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name (en)</th>
                                        <th>Name (ar)</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Active</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($skills as $skill)
                                <tbody id="skills-table">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$skill->name('en')}}</td>
                                        <td>{{$skill->name('ar')}}</td>
                                        <td>{{$skill->cat->name('en')}}</td>
                                        <td>
                                            <img src="{{asset('storage/uploads/skills/'.$skill->img)}}" height="50px">
                                        </td>
                                        <td>
                                            @if($skill->active)
            
                                            <span class="badge bg-success">yes</span>
                                            @else
            
                                            <span class="badge bg-danger">no</span>
            
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info edit-btn" data-id="{{$skill->id}}" data-name-en="{{$skill->name('en')}}" data-name-ar="{{$skill->name('ar')}}" data-cat-id="{{$skill->cat->id}}" data-toggle="modal" data-target="#edit-modal"><i class="fas fa-edit"></i></button>
                                            <a href="{{url("dashboard/skills/delete/$skill->id")}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                            <a href="{{url("dashboard/skills/toggle/$skill->id")}}" class="btn btn-sm btn-secondary"><i class="fas fa-toggle-on"></i></a>
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

                {{$skills->links()}}

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('admin.skills.partials.addModal')

@include('admin.skills.partials.editModal')

@endsection