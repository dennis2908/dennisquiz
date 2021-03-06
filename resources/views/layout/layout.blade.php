<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body>
<style>
body{
	
	font: italic small-caps bold 14px/30px Georgia, serif;
	background-image: url("images/background.jpg");
}
</style>

<div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-body shadow border-0">
                    <div class="d-flex flex-row align-item-center mb-3">
                        <h5 class="mr-auto">Jawab {{Session::get('length')}} Pertanyaan Berikut!</h5>
						<h6 class="ml-auto">Skor Anda : <span
                                class="badge badge-success p-2">{{session::get('score')}}</span>
                        </h6>
                    </div>
					<div class="d-flex flex-row align-item-center mb-3">
						@if(Session::has('final_arr'))
						<h6 class="mr-auto"><span class="badge badge-primary p-1">Ini pertanyaan terakhir !!</span></h6>
						@endif
                    </div>
					@yield('content')
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