<?php
/* TREVOR BICE WEBDESIGN - webdesign.trevorbice.com */
defined('JPATH_BASE') or die;
class plgSystemUniform extends JPlugin {
	function __construct(&$subject, $config) {
		parent::__construct($subject, $config);
	}
	function onAfterInitialise()	{
		$doc 			= JFactory::getDocument();
		$noconflict		= $this->params->get('noconflict');	
		$display			= $this->params->get('display');
		$mainframe 		= JFactory::getApplication();
		if($display=='front') {
			if($mainframe->isSite()) {
					$doc->addScript("//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js");
					if($noconflict == 1) {
						$doc->addScript(JURI::root(true) . '/plugins/system/uniform/assets/js/noconflict.js');
					}
			}
		}
		else if($display=='back') {
			if(!$mainframe->isSite()) {
				$doc->addScript("//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js");
				if($noconflict == 1) {
					$doc->addScript(JURI::root(true) . '/plugins/system/uniform/assets/js/noconflict.js');
				}
			}
		}
		else {
			if($noconflict == 1) {
				$doc->addScript("//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js");
				$doc->addScript(JURI::root(true) . '/plugins/system/uniform/assets/js/noconflict.js');
			}
		}
	}
	function onBeforeCompileHead()	{
		$doc 		= JFactory::getDocument();
		$mainframe 	= JFactory::getApplication();
		$display	= $this->params->get('display');
		$theme		= $this->params->get('theme', 'default');		
		
		
		if($this->params->get('style_inputs')) {
			$fieldTypeArray[]	= "input[type=text], input[type=password]";
		}
		if($this->params->get('style_textarea')) {
			$fieldTypeArray[]	= "textarea";
		}
		if($this->params->get('style_checkbox')) {
			$fieldTypeArray[]	= "input:checkbox";
		}
		if($this->params->get('style_radio')) {
			$fieldTypeArray[]	= "input:radio";
		}
		if($this->params->get('style_file')) {
			$fieldTypeArray[]	= "input:file";
		}
		if($this->params->get('style_dropdown')) {
			$fieldTypeArray[]	= "select";
		}		
		
		if(count($fieldTypeArray)>0) {
			$fieldtypes = implode( ", ", $fieldTypeArray);
			$loadUniform = '
			jQuery(document).ready(function($) {
				$("'.$fieldtypes.'").uniform();	
			});
			';
			if($display=='front') {
				if($mainframe->isSite()) {
						$doc->addScript(JURI::root(true) . '/plugins/system/uniform/assets/js/jquery.uniform.js');
						$doc->addStyleSheet(JURI::root(true) . '/plugins/system/uniform/themes/'.$theme.'/css/uniform.css');
						$doc->addScriptDeclaration($loadUniform);
				}
			}
			else if($display=='back') {
				if(!$mainframe->isSite()) {
						$doc->addScript(JURI::root(true) . '/plugins/system/uniform/assets/js/jquery.uniform.js');
						$doc->addStyleSheet(JURI::root(true) . '/plugins/system/uniform/themes/'.$theme.'/css/uniform.css');
						$doc->addScriptDeclaration($loadUniform);
				}
			}
			else {
				$doc->addScript(JURI::root(true) . '/plugins/system/uniform/assets/js/jquery.uniform.js');
				$doc->addStyleSheet(JURI::root(true) . '/plugins/system/uniform/themes/'.$theme.'/css/uniform.css');
				$doc->addScriptDeclaration($loadUniform);
			}
		}
	}
}
?>