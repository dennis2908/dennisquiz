<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /><link rel="stylesheet" href="css/bootstrap4.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body>
<style>
body{
	
	font: italic small-caps bold 14px/30px Georgia, serif;
	background-image: url("images/background_a.jpg");
}
</style>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-body shadow border-0">
				<div class="text-left">
<h3><span class="badge badge-secondary p-1">Hasil Test Anda</span></h3>
</div>
<div class="text-center">
<h4 class="ml-auto">Benar : <span
                                class="badge badge-success p-2">{{session::get('score')}}</span>
                        </h4>
						<h4 class="ml-auto">Salah : <span
                                class="badge badge-danger p-2">{{session::get('incorrect')}}</span>
                        </h4>
</div>
<div class="text-left p-5">
{!! $html !!}
</div>
</div>
</div>
</div>
</div>
<script>
$(function() {
    // WARNING: Extremely hacky code ahead. jQuery mobile automatically
    // sets the current "page" height on page resize. We need to unbind the
    // resize function ONLY and reset all pages back to auto min-height.
    // This is specific to jquery 1.8

    // First reset all pages to normal
    $('[data-role="page"]').css('min-height', 'auto');

    // Is this the function we want to unbind?
    var check = function(func) {
        var f = func.toLocaleString ? func.toLocaleString() : func.toString();
        // func.name will catch unminified jquery mobile. otherwise see if
        // the function body contains two very suspect strings
        if(func.name === 'resetActivePageHeight' || (f.indexOf('padding-top') > -1 && f.indexOf('min-height'))) {
            return true;
        }
    };

    // First try to unbind the document pageshow event
    try {
        // This is a hack in jquery 1.8 to get events bound to a specific node
        var dHandlers = $._data(document).events.pageshow;

        for(x = 0; x < dHandlers.length; x++) {
            if(check(dHandlers[x].handler)) {
                $(document).unbind('pageshow', dHandlers[x]);
                break;
            }
        }
    } catch(e) {}

    // Then try to unbind the window handler
    try {
        var wHandlers = $._data(window).events.throttledresize;

        for(x = 0; x < wHandlers.length; x++) {
            if(check(wHandlers[x].handler)) {
                $(window).unbind('throttledresize', wHandlers[x]);
                break;
            }
        }
    } catch(e) {}
});
</script>
@if(Session::has('good'))
<script>
swal({
title: "Keren!",
     text: "Jawaban kamu benar",
     type: "success",
     timer: 1500,
	 icon:'success',
	 buttons:false
})
</script>
@php Session::forget('good') @endphp
@endif

@if(Session::has('bad'))
<script>
swal({
title: "Uppss!",
     text: "Jawaban kamu salah",
     type: "error",
     timer: 1500,
	 icon:'error',
	 buttons:false
})
</script>
@php Session::forget('bad') @endphp
@endif
</body>
</html> 