@extends('layout.layout')
@section('content')
<style>
#div1, #div2,#div3 {
  float: left;
  width: 110px;
  height: 70px;
  margin: 10px;
  padding: 10px;
  border: 1px solid black;
}
#div4, #div5,#div6 {
  float: left;
  width: 110px;
  height: 70px;
  margin: 13px;
  padding: 13px;
}

img {
  height: 45px;
}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<form method="POST" action="{{route('submit')}}" >
<input name="answer" id="answer" type="hidden" value="4+4">
@csrf
  <div class="row p-1">
    <div class="col-xl-1">
      <label for="answer"><b>{{$urut}}. Yang mana memberikan hasil 6 (Drag Gambar jawabannya Ke Kolom Pasangannya) </b></label>
    </div>
	<div class="col-xl-6">
			<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
			  <input id="div1answer" type="hidden" value="4+4">
			  <img src="images/answer.jpg" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
			</div>

			<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
			<input id="div2answer" type="hidden" value="2+4">
			</div>

			<div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">
			<input id="div3answer" type="hidden" value="3+4">
			</div>

    </div>
	<div class="col-xl-6">
			<div id="div4">4 + 4
			</div>

			<div id="div5">2 + 4</div>

			<div id="div6">3 + 4</div>

    </div>
    <div class="col-md-3">
	  <input type="hidden" value="8" class="form-control" name="no_question">
    </div>
  </div>	
  <div class="row p-1">
    <div class="col-xl-1">
	  <button type="submit" id="checkBtn" class="btn btn-warning"><span class="badge badge-warning">Jawab</span></button>
    </div>
  </div>
</form>  
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

</script>
@stop  