<div class="modal fade " id="add-modal" aria-hidden="true" style="display:none" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Skill</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                @include('admin.inc.errors')

                <form method="POST" action="{{url("dashboard/skills/store")}}" id="add-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Name (en)</label>
                                <input type="text" name="name_en" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Name (ar)</label>
                                <input type="text" name="name_ar" class="form-control">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="custom-select form-control" name="cat_id">
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
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="add-form"  class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>