@extends('layout.layout')
@section('content')
<form method="POST" action="{{route('submit')}}" >
@csrf
    <label for="answer"><b>{{$urut}}. {{$question}}</b></label>
	<div class="col-md-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" value="20+10" name="answer[]">
            <label class="form-check-label">20+10</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" value="5+15" name="answer[]">
            <label class="form-check-label">5+15</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" value="15+25" name="answer[]">
            <label class="form-check-label">15+25</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" value="5+25" name="answer[]">
            <label class="form-check-label">5+25</label>
          </div>
        </div>
    <div class="col-md-4 alert alert-danger text-center" role="alert">
	</div>  
	<div class="text-center">
                             <input type="hidden" value="10" class="form-control" name="no_question">
                            <button type="submit" id="checkBtn" class="btn btn-warning mt-2 px-4">Jawab</button>
                        </div>
</form>  

<script type="text/javascript">
$(document).ready(function () {
    $('.alert').hide();
    $('#checkBtn').click(function() {
      checked = $('[name="answer[]"]:checked').length;
      let jjj = $('[name="answer[]"]:checked').val();
      console.log(121,checked);
      console.log(121,jjj);

      if(!checked) {
		$('.alert').show();
		$('.alert').html('Pilih Dua Jawaban');  
        return false;
      }
	  else if(checked == 1) {
        $('.alert').show();
		$('.alert').html('Pilih Dua Jawaban');  
        return false;
      }
	  else if(checked > 2) {
        $('.alert').show();
		$('.alert').html('Pilih Dua Jawaban');  
        return false;
      }
    });

    
});

</script>
@stop  