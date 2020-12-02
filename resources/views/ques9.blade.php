@extends('layout.layout')
@section('content')
<form method="POST" autocomplete="off" action="{{route('submit')}}" >
@csrf
    <label for="answer"><b>{{$urut}}. {{$question}}</b></label>
	<div class="col-xl-12">
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
    <div class="col-md-16">
                        <input type="hidden" value="9" class="form-control" name="no_question">
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning mt-2 px-4">Jawab</button>
                        </div>
    </div>
</form>  
@stop  