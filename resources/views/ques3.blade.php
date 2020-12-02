@extends('layout.layout')
@section('content')
<form method="POST" action="{{route('submit')}}" >
@csrf
    <label for="answer"><b>{{$urut}}. {{$question}}</b></label>
                        <input type="text" class="form-control" name="answer" required>
                        <input type="hidden" value="3" class="form-control" name="no_question">
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning mt-2 px-4">Jawab</button>
                        </div>
</form>  
@stop  