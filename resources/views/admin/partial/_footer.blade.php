<script src="{{asset('assets/admin')}}/js/jquery.min.js"></script>
<script src="{{asset('assets/admin')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets/admin')}}/js/modernizr.min.js"></script>
<script src="{{asset('assets/admin')}}/js/detect.js"></script>
<script src="{{asset('assets/admin')}}/js/fastclick.js"></script>
<script src="{{asset('assets/admin')}}/js/jquery.slimscroll.js"></script>
<script src="{{asset('assets/admin')}}/js/jquery.blockUI.js"></script>
<script src="{{asset('assets/admin')}}/js/waves.js"></script>
<script src="{{asset('assets/admin')}}/js/wow.min.js"></script>
<script src="{{asset('assets/admin')}}/js/jquery.nicescroll.js"></script>
<script src="{{asset('assets/admin')}}/js/jquery.scrollTo.min.js"></script>

<script src="{{asset('assets/admin')}}/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Datatables-->
<script src="{{asset('assets/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables/responsive.bootstrap.min.js"></script>

<script src="{{asset('assets/admin')}}/pages/dashborad.js"></script>

<script src="{{asset('assets/admin')}}/js/app.js"></script>
<script src="{{asset('assets/admin/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/admin/js/sweetalert2@10.js')}}"></script>

{!! Toastr::message() !!}

<script type="text/javascript">
    @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}','Error', {closeButton:true, progressBar:true})
        @endforeach
    @endif
</script>

