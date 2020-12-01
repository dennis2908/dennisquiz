@extends('layout.layout')
@section('content')
<form method="POST" action="{{route('submit')}}" >
@csrf
  <label for="answer"><b>{{$urut}}. Mana lebih kecil 8000, 4000, 20000 atau 6000</b></label>
                        <input type="text" class="form-control" name="answer" required>
                        <input type="hidden" value="11" class="form-control" name="no_question">
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning mt-2 px-4">Jawab</button>
                        </div>
</form>  
@stop  