<?php
// no direct access
defined('_JEXEC') or die();
jimport('joomla.html.html');
jimport('joomla.form.formfield');
JHtml::_('behavior.framework', true);
class JFormFieldThemeselect extends JFormField {
	public function getInput() {
		// Initialize variables.
		$db = JFactory::getDbo();
		
		$rootDir 	= preg_replace("#administrator#", "", getcwd());
		$dirList	= scandir($rootDir."plugins/system/uniform/themes/");
		unset($dirList[0]);
		$dirList[1] = "default";
		foreach($dirList as $key=>$val) {
			if($val=='index.html') {
				unset($dirList[$key]);	
			}
		}
		rsort($dirList);

		$newList = array_merge(array(), $dirList);
		foreach($newList as $key=>$val) {
			$themeArray[$val] = ucfirst($val);	
		}
		return JHtml::_('select.genericlist', $themeArray, $this->name, trim($attr), 'value', 'text', $this->value);
	}
}