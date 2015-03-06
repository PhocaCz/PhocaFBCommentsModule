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
 
defined('_JEXEC') or die('Restricted access');

$menu 		=& JSite::getMenu();
$document	=& JFactory::getDocument();
JHTML::stylesheet('modules/mod_phoca_facebook_comments/assets/style.css' );
$tmpl = array();
$tmpl['only_full_article'] 	= $params->get( 'only_full_article', 0 );
if ($tmpl['only_full_article'] == 1) {
	$option 	= JRequest::getVar('option', '');
	$view 		= JRequest::getVar('view', '');
	$id 		= JRequest::getVar('id', '');
	if ($option == 'com_content' && $view == 'article' && (int)$id > 0) {
	
	} else {
		return true;
	}
}
$uri 		= &JFactory::getURI();
$getParams 	= $params->get( 'get_params', 'start,limitstart,template,fb_comment_id' );
$getParamsArray = explode(',', $getParams);
if (!empty($getParamsArray) ) {
	foreach($getParamsArray as $key => $value) {
		$uri->delVar($value);
	}
}

$tmpl['uri']					= $uri->toString();
$tmpl['fb_comment_app_id'] 		= $params->get( 'fb_comment_app_id', '' );
$tmpl['fb_comment_width'] 		= $params->get( 'fb_comment_width', '500' );
$tmpl['fb_comment_lang'] 		= $params->get( 'fb_comment_lang', 'en_US' );
$tmpl['fb_comment_enable'] 		= $params->get( 'fb_comment_enable', 1 );
$tmpl['fb_like_width'] 			= $params->get( 'fb_like_width', '498' );
$tmpl['fb_like_height'] 		= $params->get( 'fb_like_height', '26' );
$tmpl['fb_like_show_faces'] 	= $params->get( 'fb_like_show_faces', 'false' );
$tmpl['linkedin_enable'] 		= $params->get( 'linkedin_enable', 1 );
$tmpl['tweet_enable'] 			= $params->get( 'tweet_enable', 1 );
$tmpl['twitter_name'] 			= $params->get( 'twitter_name', 1 );
$tmpl['twitter_lang'] 			= $params->get( 'twitter_lang', '' );
$tmpl['plusone_enable'] 		= $params->get( 'plusone_enable', 1 );
$tmpl['myspace_enable'] 		= $params->get( 'myspace_enable', 1 );
$tmpl['fb_send_enable'] 		= $params->get( 'fb_send_enable', 1 );
$tmpl['fb_like_enable'] 		= $params->get( 'fb_like_enable', 1 );
$tmpl['fb_comment_count'] 		= $params->get( 'fb_comment_count', '' );
//$tmpl['app'] 					= JFactory::getApplication();
$tmpl['fb_color_scheme'] 		= $params->get( 'fb_color_scheme', '' );
$tmpl['fb_comment_admins']		= $params->get( 'fb_comment_admins', '');
$output							= '';

require(JModuleHelper::getLayoutPath('mod_phoca_facebook_comments'));
?>