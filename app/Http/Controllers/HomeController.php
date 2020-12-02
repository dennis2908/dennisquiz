<?php

namespace App\Http\Controllers;

use Session;	

use Illuminate\Http\Request;

use App\answer;

class HomeController extends Controller
{	
    public $length=10;
	public $randSoal=11;
	
	function index(){
		//Session::put('array_rand',$this->randomNumbers(1,5,5));
		//Session::forget('score');
		//Session::flush();
		if(Session::has('final_arr') && Session::has('counter')){
			Session::forget('final_arr');
			Session::put('length',$this->length);
			Session::put('incorrect',$this->length - Session::get('score'));
			$html = "";
			$myanswer = Session::get('myanswer');
			$i=0;
			foreach(Session::get('array_randomxy') as $v){
				$getanswer = answer::where('id',$v)->first();
				if($myanswer[$i] == $getanswer['answer']){
					$match = "Benar";
					$icon = '<svg width="2em" style="color:green" height="2em" viewBox="0 0 16 16" class="bi bi-check-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
							</svg>';
					$iconsmall = '<svg width="1em" style="color:green" height="1em" viewBox="0 0 16 16" class="bi bi-check-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
							</svg>';		
				}
				else{
					$match = "Salah";
					$icon = '<svg width="2em" style="color:red" height="2em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
						</svg>';
					$iconsmall = '<svg width="1em" style="color:red" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
						</svg>';	
				}
				
				$html .= "<div class='col-xl-16 p-1'><label><b>".$icon." ".($i+1).". ".$getanswer['question']."</b></label></div>";
				$html .= "<div class='col-xl-16' style='margin-left:50px !important'><label><b> Jawaban Kamu : ".$myanswer[$i]."</b></label></div>";
				$html .= "<div class='col-xl-16' style='margin-left:50px !important'><label><b> Jawaban Benar : ".$getanswer['answer']."</b></label></div>";
				$html .= "<div class='col-xl-16' style='margin-left:50px !important'><label><b> Jawaban Kamu ".$match." ".$iconsmall."</b></label></div>";
				$i++;
			}
			Session::forget('myanswer');
			Session::forget('array_randomx');
			Session::forget('no_urut');
			return view('result',compact('html'));
		}
		
	    if(!Session::has('array_randomx'))
		{   
			Session::put('no_urut',1);
			$arracak = $this->randomNumbers(1,$this->length,$this->length);
			Session::put('array_randomx',$arracak);
			Session::put('array_randomxy',$arracak);
			Session::put('score',0);
			Session::put('incorrect',0);
			Session::put('counter',1);
			Session::forget('final_arr');			
		}
		
		$urut = Session::get('no_urut');
		
		if(!Session::has('counter')){
			$arracakf = Session::get('array_randomxy');
			$arracakf[$urut-1] = $this->randSoal;
			Session::put('array_randomxy',$arracakf);
			$question = answer::where('id',$this->randSoal)->first()['question'];
			return view('ques'.$this->randSoal,compact('urut','question'));
		}
		
		
		//dd(Session::get('array_randomx'));
		$array_rand = Session::get('array_randomx');
		$no = $array_rand[0];
		if(count(Session::get('array_randomx')) == 1){
			//dd(3423);
			Session::put('final_arr',1);
		}
		else
		{
			$arry_rand = Session::get('array_randomx');
			$newarray_rand = array_shift($arry_rand); 
			//dd($arry_rand);
			Session::put('array_randomx',$arry_rand);
		}
		
		Session::forget('counter');
		
		$question = answer::where('id',$no)->first()['question'];
		return view('ques'.$no,compact('question','urut'));
		//return view('ques11',compact('urut'));
		
	}
	
	function randomNumbers ($min,$max,$quantity){
		$numbers = range($min, $max);
		shuffle($numbers);
		return array_slice($numbers, 0, $quantity);
	}  
	
	function submit(Request $request){
		//dd($request->answer);
		if(!Session::has('myanswer')){
			Session::put('myanswer',[]);
		}
		
		$myanswer = Session::get('myanswer');
		
		$no_question = $request->no_question;
		$answer = answer::where('id',$no_question)->first()['answer'];
		$type = answer::where('id',$no_question)->first()['type'];
		$typeOne = ['Short response','Multiple choice single answer','matching pair'];
		$typeTwo = ['Multiple choice two correct'];
		//dd($answer);
		
		if(in_array($type,$typeOne)){
			if($answer == str_replace(" ","",$request->answer))
			{	
				$score = Session::get('score');
				Session::put('score',$score+1);
				Session::put('good',1);
			}
			else{
				Session::put('bad',1);
			}
			
			$anw = str_replace(" ","",$request->answer);
			
		}
		elseif(in_array($type,$typeTwo)){
			$anwdb = explode(' , ',$answer);
			if(count(array_intersect($request->answer, $anwdb)) == count($request->answer)){
				$score = Session::get('score');
				Session::put('score',$score+1);
				Session::put('good',1);
			}
			else{
				Session::put('bad',1);
			}
			
			$anw = implode(' , ',str_replace(" ","",$request->answer));
			
		
		}
		
		$myanswer[] = $anw;
		Session::put('myanswer',$myanswer);
		Session::put('counter',1);
		$no_urut = Session::get('no_urut');
		Session::put('no_urut',$no_urut+1);
		return redirect()->route('index');
	}
}