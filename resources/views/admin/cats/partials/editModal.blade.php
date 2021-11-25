<div class="modal fade " id="edit-modal" aria-hidden="true" style="display:none" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @include('admin.inc.errors') --}}

                <!-- form start -->
                <form method="POST" action="{{url('dashboard/categories/update')}}" id="edit-form">

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
