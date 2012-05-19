<?php

function valida_email($email)
{


$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
// Run the preg_match() function on regex against the email address
if (preg_match($regex, $email)) {
     return true;
} else { 
	return false;
} 

}

?>