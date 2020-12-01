@extends('layout.layout')
@section('content')
<style>
#div1, #div2,#div3 {
  float: left;
  width: 190px;
  height: 70px;
  margin: 10px;
  padding: 10px;
  border: 1px solid black;
}
#div4, #div5,#div6 {
  float: left;
  width: 190px;
  height: 70px;
  margin: 13px;
  padding: 13px;
}

.draggable {
    touch-action: none
}

img {
  height: 45px;
  width: 170px;
}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<form method="POST" action="{{route('submit')}}" >
<input name="answer" id="answer" type="hidden" value="4+4">
@csrf
  <label for="answer"><b>{{$urut}}. Yang mana memberikan hasil 6 (Drag Gambar jawabannya Ke Kolom Pasangannya) </b></label>

	<div class="col-md-16">
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

    </div>
	<div class="col-md-16">
			<div id="div4">4 + 4
			</div>

			<div id="div5">2 + 4</div>

			<div id="div6">3 + 4</div>

    </div>
    <div class="col-md-16">
                        <input type="hidden" value="8" class="form-control" name="no_question">
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning mt-2 px-4">Jawab</button>
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