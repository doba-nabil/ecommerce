<!-- jQuery -->
<script src="{{ asset('backend/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('backend/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Data table JavaScript -->
<script src="{{ asset('backend/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bower_components/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bower_components/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/js/export-table-data.js') }}"></script>
<!-- Slimscroll JavaScript -->
<script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<!-- Bootstrap Daterangepicker JavaScript -->
<script src="{{ asset('backend/vendors/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
<!-- Form Flie Upload Data JavaScript -->
<script src="{{ asset('backend/js/form-file-upload-data.js') }}"></script>
<!-- Init JavaScript -->
{{--<script src="{{ asset('backend/js/dashboard-data.js') }}"></script>--}}
<script src="{{ asset('backend/js/init.js') }}"></script>
<script src="{{ asset('backend/js/dashboard-data.js') }}"></script>
<!-- Custom -->
<script src="{{ asset('common/custom.js') }}"></script>
<script src="{{ asset('backend/js/custom.js') }}"></script>
<script>
    $(".select").select2({
        dir: "rtl"
    })
</script>
<script>
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="size[]" placeholder="اسم المقاس" class="llll"/><a href="#" class="remove_field btn btn-danger">ازالة</a></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
</script>
@section('backend-footer')

@show