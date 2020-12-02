@extends('layout.layout')
@section('content')
<style>
#div1, #div2,#div3 {
  float: left !important;
  width: 100px !important;
  height: 70px !important;
  margin: 10px !important;
  padding: 10px !important;
  border: 1px solid black !important;;
}


img {
  height: 45px !important;
  width: 80px !important;
}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<form method="POST" autocomplete="off" action="{{route('submit')}}" >
<input name="answer" id="answer" type="hidden" value="4+4">
@csrf
  <label for="answer"><b>{{$urut}}. {{$question}}</b></label>

	<div class="col-xl-12">
			<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
			  <input id="div1answer" type="hidden" value="4+4">
			  <img src="images/answer.jpg" ondragstart="drag(event)" id="drag1" width="88" height="31">
			</div>

			<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
			<input id="div2answer" type="hidden" value="2+4">
			</div>

			<div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">
			<input id="div3answer" type="hidden" value="3+4">
			</div>
			
			<div class="col-md-12" style="clear:left;"><div class="col-md-3" style="float:left !important;margin-left:10px !important">4+4</div>
			<div style="float:left !important;margin-left:5px !important" class="col-md-3">2+4</div><div style="float:left !important;margin-left:-10px;position:fix !important" class="col-md-3">3+4</div>
			</div>
			</div>

			<div>
			</div>

			<div >
			</div>
    <div class="row p-5 col-xl-14">
                        <div class="text-center x-5" style="margin-top:20px;margin-left:-230px">
						<input type="hidden" value="8" class="form-control" name="no_question">
                        
                            <button type="submit" style='margin-bottom:50px' class="btn btn-warning mt-2 px-4">Jawab</button>
                        </div>
    </div>
    </div>	
</form>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
  
  

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
	
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
  
  console.log(ev.target.id);
  $('#answer').val($('#'+ev.target.id+"answer").val());
}
function touchHandler(event) {
    var touch = event.changedTouches[0];

    var simulatedEvent = document.createEvent("MouseEvent");
        simulatedEvent.initMouseEvent({
        touchstart: "mousedown",
        touchmove: "mousemove",
        touchend: "mouseup"
    }[event.type], true, true, window, 1,
        touch.screenX, touch.screenY,
        touch.clientX, touch.clientY, false,
        false, false, false, 0, null);

    touch.target.dispatchEvent(simulatedEvent);
    event.preventDefault();
}

function init() {
    document.addEventListener("touchstart", touchHandler, true);
    document.addEventListener("touchmove", touchHandler, true);
    document.addEventListener("touchend", touchHandler, true);
    document.addEventListener("touchcancel", touchHandler, true);
}
</script>
@stop  