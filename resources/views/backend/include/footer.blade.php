<!-- footer content -->

<footer>
    <div class="copyright-info">
        <p class="pull-right">Sigma Travel - Powered by <a href="https://grafiasteach.com">Grafias Technology</a>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
<!-- /page content -->

</div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="{{URL::to('backend/js/bootstrap.min.js')}}"></script>

<!-- gauge js -->
<script type="text/javascript" src="{{URL::to('backend/js/gauge/gauge.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/gauge/gauge_demo.js')}}"></script>
<!-- bootstrap progress js -->
<script src="{{URL::to('backend/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{URL::to('backend/js/nicescroll/jquery.nicescroll.min.js')}}"></script>
<!-- icheck -->
<script src="{{URL::to('backend/js/icheck/icheck.min.js')}}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{URL::to('backend/js/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/datepicker/daterangepicker.js')}}"></script>
<!-- chart js -->
<script src="{{URL::to('backend/js/chartjs/chart.min.js')}}"></script>

<script src="{{URL::to('backend/js/custom.js')}}"></script>

<!-- flot js -->
<!--[if lte IE 8]><script type="text/javascript" src="{{URL::to('backend/js/excanvas.min.js')}}"></script><![endif]-->
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.orderBars.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.time.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/date.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.spline.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.stack.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/curvedLines.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

{{--////////////////script for add more field///////////////--}}
<script type="text/javascript"  >
    $(document).ready(function(){
        var i=1;

        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<div id="row'+i+'"><div class="form-group col-lg-12" id="dynamic_field"> <label for="category">Itenerary <span class="required" style="color:red;">*</span> </label> <div> <textarea class="form-control" id="next_itenerary" name="next_itenerary[]" ></textarea> </div> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button> </div></div> ');
            CKEDITOR.replace("next_itenerary"  );
        });



        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

</script>

<script>
    CKEDITOR.replace( 'overview' );
</script>
<script>
    CKEDITOR.replace( 'itenerary' );
</script>
{{--
<script>s
    CKEDITOR.replace( 'next_itenerary' );
</script>--}}
<script>
    CKEDITOR.replace( 'trip_detail' );
</script>