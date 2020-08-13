<?php 

set_error_handler('buckyErrorHandler',E_ALL);

function buckyErrorHandler($number, $text, $thefile, $theline){
	if(ob_get_length()) ob_clean();
	$errorMessage = 'Error:' . $number . chr(10) . 
					'Message:' . $text . chr(10) .
					'File:' .$thefile . chr(10).
					'Line:' .$thefile; 
		echo $errorMessage;
		exit;
}

?>