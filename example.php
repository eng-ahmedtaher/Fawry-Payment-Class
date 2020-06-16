<?php 
	
	// Require Class Fawry
	require_once 'Class/Fawry.php';

	echo "This is Payment Page with Fawry Pay <br />";

	// Print SandBox JS for Fawry Payment
	echo Fawry::jsSandBox();

	// Print Button Payment CheckOut
	echo Fawry::payment('ar-eg', 'is0N+YQzlE4=', 23222, 'Ahmed Taher', '0123456789', 'ahmedtaherinfo0@gmail.com', 12, 'Order Description', 24, 1522, 'Order Number 12', 20.00, 1, '15inch', '25inch', '1.25kg', '1.25kg', 'success.php', 'fail.php', null);

?>