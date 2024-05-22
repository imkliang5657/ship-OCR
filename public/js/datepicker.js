$(document).ready(function(){
    $(document).on('focus', '.datepicker', function() {
        $(this).datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
});