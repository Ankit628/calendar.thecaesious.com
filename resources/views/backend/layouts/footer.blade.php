<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="{{env('APP_URL')}}">{{env('APP_NAME')}}</a> {{date('Y')}}</span>
        </div>
    </div>
</footer>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete this?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-right">
                <a href="javascript:void(0)" class="btn btn-sm btn-info" data-dismiss="modal" aria-label="Close">
                    <span class="fa fa-trash-alt"></span> Close
                </a>
                <a href="" class="btn btn-danger btn-sm">
                    <span class="fa fa-trash-alt"></span> Delete
                </a>
            </div>
        </div>
    </div>
</div>
