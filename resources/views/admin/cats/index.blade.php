@extends('admin.layout')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('web.cats')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">{{__('web.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('web.cats')}}</li>
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
                    @include('admin.inc.messages')
                    <div class="card-header">
                        <h3 class="card-title">{{__('web.allcats')}}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-small btn-primary" data-toggle="modal" data-target="#add-modal">Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name (en)</th>
                            <th>Name (ar)</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($cats as $cat)
                    <tbody id="cats-table">
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cat->name('en')}}</td>
                            <td>{{$cat->name('ar')}}</td>
                            <td>
                                @if($cat->active)

                                <span class="badge bg-success">yes</span>
                                @else

                                <span class="badge bg-danger">no</span>

                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info edit-btn" data-id="{{$cat->id}}" data-name-en="{{$cat->name('en')}}" data-name-ar="{{$cat->name('ar')}}" data-toggle="modal" data-target="#edit-modal"><i class="fas fa-edit"></i></button>
                                <a href="{{url("dashboard/categories/delete/$cat->id")}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="{{url("dashboard/categories/toggle/$cat->id")}}" class="btn btn-sm btn-secondary"><i class="fas fa-toggle-on"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-center my-3">

                {{$cats->links()}}

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('admin.cats.partials.addModal')

@include('admin.cats.partials.editModal')

@endsection

@section('scripts')
<script>
    $('.edit-btn').click(function() {
        let id = $(this).attr('data-id')
        let nameEn = $(this).attr('data-name-en')
        let nameAr = $(this).attr('data-name-ar')
        // console.log(id, nameAr, nameEn);
        $('#edit-form-id').val(id)
        $('#edit-form-name-en').val(nameEn)
        $('#edit-form-name-ar').val(nameAr)
    })
</script>
@endsection