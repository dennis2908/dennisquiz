<?php

namespace App\Http\Controllers;

use Session;	

use Illuminate\Http\Request;

use App\answer;

class HomeController extends Controller
{	
    public $length=10;

	public function __construct()
    {
		Session::put('length',$this->length);
	
		//Session::put('array_acak',$this->randomNumbers(1,5,5));
		
        
		/*
		if(!Session::has('array_acak'))
		{
			Session::put('array_acak',$this->randomNumbers(1,5,5));
			
		}
		
		dd(Session::get('array_acak'));
		*/
		
		
	
    }
	function index(){
		//Session::put('array_rand',$this->randomNumbers(1,5,5));
		//Session::forget('score');
		//Session::flush();
		if(Session::has('final_arr') && Session::has('counter')){
			Session::forget('final_arr');
			Session::put('length',$this->length);
			Session::put('incorrect',$this->length - Session::get('score'));
			return view('result');
		}
		
		if(!Session::has('counter')){
			$array_rand = Session::get('array_randomx');
			if(!$array_rand){
			  $urut = $this->length;	
			}
			else{
				$urut = ($this->length) - count($array_rand);
			}
			return view('ques11',compact('urut'));
		}
		
		if(!Session::has('array_randomx'))
		{
			Session::put('array_randomx',$this->randomNumbers(1,$this->length,$this->length));
			Session::put('score',0);
			Session::put('incorrect',0);
			Session::put('counter',1);
			Session::forget('final_arr');			
		}
		
		
		//dd(Session::get('array_randomx'));
		$array_rand = Session::get('array_randomx');
		$urut = ($this->length+1) - count($array_rand);
		$no = $array_rand[0];
		if(count(Session::get('array_randomx')) == 1){
			//dd(3423);
			Session::put('final_arr',1);
			Session::forget('array_randomx');
		}
		else
		{
			$arry_rand = Session::get('array_randomx');
			$newarray_rand = array_shift($arry_rand); 
			//dd($arry_rand);
			Session::put('array_randomx',$arry_rand);
		}
		
		Session::forget('counter');
		
		return view('ques'.$no,compact('urut'));
		//return view('ques11',compact('urut'));
		
	}
	
	function randomNumbers ($min,$max,$quantity){
		$numbers = range($min, $max);
		shuffle($numbers);
		return array_slice($numbers, 0, $quantity);
	}  
	
	function submit(Request $request){
		//dd($request->answer);
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
			}
		}
		elseif(in_array($type,$typeTwo)){
			$anwDB = explode(',',$answer);
			if(count(array_intersect($request->answer, $anwDB)) == count($request->answer)){
				$score = Session::get('score');
				Session::put('score',$score+1);
			}
		}
		
		Session::put('counter',1);
		
		return redirect()->route('index');
	}
}