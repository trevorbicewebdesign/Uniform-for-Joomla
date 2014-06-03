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
class JFormFieldThemeselect extends JFormField
{
	public function getInput() {
		// Initialize variables.
		$db = JFactory::getDbo();
		
		$rootDir 	= preg_replace("#administrator#", "", getcwd());
		$dirList	= scandir($rootDir."plugins/system/uniform/themes/");
		unset($dirList[0]);
		$dirList[1] = "default";
		rsort($dirList);

		$newList = array_merge(array(), $dirList);
		foreach($newList as $key=>$val) {
			$themeArray[$val] = ucfirst($val);	
		}
		// print_r($themeArray );
		/*
		// Initialize some field attributes.
		$attr = '';
		$attr .= $this->element['class'] ? ' class="' . (string)$this->element['class'] . '"' : '';
		// To avoid user's confusion, readonly="true" should imply disabled="true".
		if ((string)$this->element['readonly'] == 'true' || (string)$this->element['disabled'] == 'true') {
			$attr .= ' disabled="disabled"';
		}
		$attr .= $this->element['size'] ? ' size="' . (int)$this->element['size'] . '"' : '';
		$attr .= $this->element['multiple'] ? ' multiple="multiple"' : '';
		// Initialize JavaScript field attributes.
		$attr .= $this->element['onchange'] ? ' onchange="' . (string)$this->element['onchange'] . '"' : '';

		$mitems = array();


			$query = 'SELECT m.* FROM #__k2_categories m WHERE published=1 AND trash = 0 ORDER BY parent, ordering';
			$db->setQuery($query);
			$mitems   = $db->loadObjectList();
			$children = array();
			if ($mitems) {
				foreach ($mitems as $v) {
					$v->title     = $v->name;
					$v->parent_id = $v->parent;
					$pt           = $v->parent;
					$list         = @$children[$pt] ? $children[$pt] : array();
					array_push($list, $v);
					$children[$pt] = $list;
				}
			}
			$list   = JHtml::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0);
			$mitems = array();

			foreach ($list as $item) {
				$item->treename = JString::str_ireplace('&#160;', '- ', $item->treename);
				$mitems[]       = JHtml::_('select.option', $item->id, '   ' . $item->treename);
			}
			*/
		return JHtml::_('select.genericlist', $themeArray, $this->name, trim($attr), 'value', 'text', $this->value);
	}
}