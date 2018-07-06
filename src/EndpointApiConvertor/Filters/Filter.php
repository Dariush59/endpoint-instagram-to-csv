<?php 

namespace EndpointApiConvertor\Filters;

use Exception;

class Filter 
{
	public function getUSort( array $data ) : array
	{
		try{
				uasort($data, function($a, $b) { 
					return ($a['likes']['count'] <=> $b['likes']['count']);
				});
			

			return $data;
		} 
		catch( Throwable $e ){
			throw new Exception( $e->getMessage() );
		}
	}
}



?>