<?php 

if ( ! function_exists('display_currency'))
{
	function display_currency($number)
	{
		return 'Rp.'.number_format($number, 0, '', '.'); 
	}
}