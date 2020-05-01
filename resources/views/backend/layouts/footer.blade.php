<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="{{env('APP_URL')}}">{{env('APP_NAME')}}</a> <strong>|</strong> {{date('Y')}}</span>
        </div>
    </div>
</footer>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-info" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-sm btn-danger" href="{{ route('logout') }}" data-toggle="modal"
                   data-target="#logoutModal" onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
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
                   Close
                </a>
                <a href="" class="btn btn-danger btn-sm">
                    <span class="fa fa-trash-alt"></span> Delete
                </a>
            </div>
        </div>
    </div>
</div>
