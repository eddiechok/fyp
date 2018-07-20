<?php
function presentPrice($price) {
	return 'RM '.number_format((float)$price, 2);
}

function productImage($path) {
	return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}
?>