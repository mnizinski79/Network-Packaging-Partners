<?php


class ContactForm{

	var $field_array; 
	var $recipient; // goal object
	
	function __construct($request, $recipient){
	
		$this->field_array = $request;
		$this->recipient = $recipient;

		
	}

	function constructEmail(){

	}

	function sendEmail(){

	}
}


?>