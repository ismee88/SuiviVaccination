<script src="{{asset('backend/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('backend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('backend/js/script.js')}}"></script>

{{--switch-button-bootstrap--}}
<script src="{{asset('backend/switch-button-bootstrap/dist/bootstrap-switch-button.min.js')}}"></script>

@yield('scripts')

<script>
    setTimeout(function(){
        $('#alert').slideUp();
    },4000)
</script>