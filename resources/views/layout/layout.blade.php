<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<body>
<style>
body{
	
	font: italic small-caps bold 14px/30px Georgia, serif;
	background-image: url("images/background.jpg");
}
</style>
<div class="container">
<h2><span class="badge badge-secondary p-1">Jawab {{Session::get('length')}} Pertanyaan Berikut!</span></h2>
<h6><span class="badge badge-success p-1">Skor anda</span> : <span class="badge badge-success p-1">{{session::get('score')}}</span></h6>
@yield('content')
@if(Session::has('final_arr'))
<h4><span class="badge badge-primary p-1">Ini pertanyaan terakhir !!</span></h4>
@endif
</div>
</body>
</html> 