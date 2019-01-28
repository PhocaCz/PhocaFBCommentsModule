<?php
/*
 * @package		Joomla.Framework
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @component Phoca Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
defined('JPATH_BASE') or die;
jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldPhocaHead extends JFormField
{
	protected $type = 'PhocaHead';

	/*
	protected function getInput() {
        return '';
	}

	protected function getLabel() {

		// Temporary solution
		JHTML::stylesheet( 'media/mod_phoca_facebook_comments/options.css' );

		if ($this->element['default']) {

				return '<div class="tab-header ph-options-head">'
				.'<strong>'. JText::_($this->element['default']) . '</strong>'
				.'</div>';

		} else {
			return parent::getLabel();
		}
        echo '<div style="clear:both;"></div>';
	}
	*/

	public function renderField($options = array()) {

        JHTML::stylesheet( 'media/mod_phoca_facebook_comments/options.css' );

	    return '<div class="ph-options-head">'
            .'<strong>'. JText::_($this->element['default']) . '</strong>'
            .'</div>';
    }

}
?>
