@extends('layout.layout')
@section('content')
<form method="POST" action="{{route('submit')}}" >
@csrf
  <div class="row p-1">
    <div class="col-xl-1">
      <label for="answer"><b>{{$urut}}. Mana lebih besar 9000, 200 atau 700</b></label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" name="answer" required>
	  <input type="hidden" value="6" class="form-control" name="no_question">
    </div>
  </div>	
  <div class="row p-1">
    <div class="col-xl-1">
	  <button type="submit" class="btn btn-warning"><span class="badge badge-warning">Jawab</span></button>
    </div>
  </div>
</form>  
@stop  