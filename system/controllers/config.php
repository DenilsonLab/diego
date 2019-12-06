<?php  

/**
 * 
 */
class PageConfigController
{
	
	public static function mostrarConfigModel(){
		$config = PageConfigModel::mostrarConfigModel("options");
		return $config;
	}
}
?>