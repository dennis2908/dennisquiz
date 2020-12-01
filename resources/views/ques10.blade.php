@extends('layout.layout')
@section('content')
<form method="POST" action="{{route('submit')}}" >
@csrf
  <div class="row p-1">
    <div class="col-xl-12">
      <label for="answer"><b>{{$urut}}. Yang mana memberikan hasil 30 (Pilih Dua)</b></label>
    </div>
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
    <div class="col-md-3">
	  <input type="hidden" value="10" class="form-control" name="no_question">
    </div>
  </div>
	<div class="col-md-3 alert alert-danger" role="alert">
	  
	</div>  
  <div class="row p-1">
    <div class="col-md-3">
	  <button type="submit" id="checkBtn" class="btn btn-warning"><span class="badge badge-warning">Jawab</span></button>
    </div>
  </div>
</form>  

<script type="text/javascript">
$(document).ready(function () {
    $('.alert').hide();
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

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