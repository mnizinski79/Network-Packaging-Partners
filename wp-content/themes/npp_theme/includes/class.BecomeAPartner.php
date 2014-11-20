<?php
require_once('class.ContactForm.php');

class BecomeAPartner extends ContactForm{


	function __construct($request, $admin_email){	
		parent::__construct($request, $admin_email);
	}

	function constructEmail(){
		
	}
}


?>