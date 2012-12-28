<?php
defined('JPATH_BASE') or die;
class plgSystemUniform extends JPlugin {
  function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}

	function onAfterDispatch()	{
		if($this->detectFrontEnd()) {
			$doc = JFactory::getDocument();
			$doc->addScript("//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js");
			$doc->addScript(JURI::root(true) . '/plugins/system/uniform/js/jquery.uniform.js');
			$doc->addStyleSheet(JURI::root(true) . '/plugins/system/uniform/css/uniform.default.css');
			
			$doc->addScriptDeclaration('
			
			jQuery(document).ready(function($) {
				$("select, input:checkbox, input:radio, input:file").uniform();
			});	
			');
		}
	}
	function detectFrontEnd() {
		if(preg_match("#administrator/index.php#", $_SERVER['REQUEST_URI'])) {
			return false;
		}
		return true;

	}
}
?>
