@extends('layout.layout')
@section('content')
<form method="POST" action="{{route('submit')}}" >
@csrf
  <div class="row p-1">
    <div class="col-xl-1">
      <label for="answer"><b>{{$urut}}. Yang mana memberikan hasil 40</b></label>
    </div>
	<div class="col-xl-2">
          <div class="form-check">
            <input type="radio" class="form-check-input" value="20+10" name="answer" required>
            <label class="form-check-label">20+10</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" value="30+30"  name="answer">
            <label class="form-check-label">30+30</label>
          </div>
          <div class="form-check">
            <input type="radio" name="answer" value="20+20" class="form-check-input">
            <label class="form-check-label">20+20</label>
          </div>
          <div class="form-check">
            <input type="radio" name="answer" value="5+10" class="form-check-input">
            <label class="form-check-label">5+10</label>
          </div>
        </div>
    <div class="col-md-3">
	  <input type="hidden" value="9" class="form-control" name="no_question">
    </div>
  </div>	
  <div class="row p-1">
    <div class="col-xl-1">
	  <button type="submit" class="btn btn-warning"><span class="badge badge-warning">Jawab</span></button>
    </div>
  </div>
</form>  
@stop  