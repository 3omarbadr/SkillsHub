<div class="modal fade " id="edit-modal" aria-hidden="true" style="display:none" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Skill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                @include('admin.inc.errors')

                <!-- form start -->
                <form method="POST" action="{{url('dashboard/skills/update')}}" id="edit-form" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" id="edit-form-id">

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label>Name (en)</label>
                                <input type="text" name="name_en" class="form-control" id="edit-form-name-en">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Name (ar)</label>
                                <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="custom-select form-control" name="cat_id" id="edit-form-cat-id">
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name()}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="edit-form" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

@section('scripts')
<script>
    $('.edit-btn').click(function() {
        let id = $(this).attr('data-id')
        let nameEn = $(this).attr('data-name-en')
        let nameAr = $(this).attr('data-name-ar')
        let img = $(this).attr('data-img')
        let catId = $(this).attr('data-cat-id')
        // console.log(id, nameAr, nameEn);
        $('#edit-form-id').val(id)
        $('#edit-form-name-en').val(nameEn)
        $('#edit-form-name-ar').val(nameAr)
        $('#edit-form-cat-id').val(catId)
    })
</script>
@endsection