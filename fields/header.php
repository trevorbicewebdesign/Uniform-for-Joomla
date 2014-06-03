<?php
/**
 * @version   $Id: k2check.php 6824 2013-01-28 06:14:09Z btowles $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2013 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */


// no direct access
defined('_JEXEC') or die();
jimport('joomla.html.html');
jimport('joomla.form.formfield');
JHtml::_('behavior.framework', true);
/**
 * @package    RocketTheme
 * @subpackage rokstories.elements
 */
class JFormFieldHeader extends JFormField
{
	public function getInput() {
		//print_r($this->element['label']);
		//echo $this->element['label'];
		$header = "<h4 class='module-heading'>".$this->element['description']."</h4>";
		
		return $header;
	}
}