<?php


/**
 * Debug fuction used in devlopment
 */
function debug_to_console( $data ) {
	$output = $data;
	if ( is_array( $output ) )
		$output = implode( ',', $output);

	echo "<script>console.log('" . $output . "');</script>";
}