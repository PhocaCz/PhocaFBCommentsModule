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

use Joomla\CMS\Uri\Uri;

$app = JFactory::getApplication();
JHTML::stylesheet('media/mod_phoca_facebook_comments/style.css' );


$t = array();
$t['only_full_article'] 	= $params->get( 'only_full_article', 0 );

if ($t['only_full_article'] == 1) {
	$option 	= $app->input->get('option', '');
	$view 		= $app->input->get('view', '');
	$id 		= $app->input->get('id', '');
	if ($option == 'com_content' && $view == 'article' && (int)$id > 0) {

	} else {
		return true;
	}
}

$uri 		= Uri::getInstance();
$getParams 	= $params->get( 'get_params', 'start,limitstart,template,fb_comment_id' );
$getParamsArray = explode(',', $getParams);
if (!empty($getParamsArray) ) {
	foreach($getParamsArray as $key => $value) {
		$uri->delVar($value);
	}
}

$t['uri']					= $uri->toString();
$t['fb_comment_app_id'] 	= $params->get( 'fb_comment_app_id', '' );
$t['fb_comment_width'] 		= $params->get( 'fb_comment_width', '100%' );
$fbCommentWidth             = (int)$t['fb_comment_width'];
if ((string)$t['fb_comment_width'] === (string)$fbCommentWidth) {
    $t['fb_comment_width'] = $t['fb_comment_width'] . 'px';
}
$t['fb_comment_lang'] 		= $params->get( 'fb_comment_lang', 'en_US' );
$t['fb_comment_enable'] 	= $params->get( 'fb_comment_enable', 1 );

$t['fb_like_width'] 		= $params->get( 'fb_like_width', '498px' );
$fbLikeWidth                = (int)$t['fb_like_width'];
if ((string)$t['fb_like_width'] === (string)$fbLikeWidth) {
    $t['fb_like_width'] = $t['fb_like_width'] . 'px';
}

$t['fb_like_height'] 		= $params->get( 'fb_like_height', '26px' );
$fbLikeHeight               = (int)$t['fb_like_height'];
if ((string)$t['fb_like_height'] === (string)$fbLikeHeight) {
    $t['fb_like_height'] = $t['fb_like_height'] . 'px';
}


$t['fb_like_show_faces'] 	= $params->get( 'fb_like_show_faces', 'false' );
$t['linkedin_enable'] 		= $params->get( 'linkedin_enable', 1 );
$t['tweet_enable'] 			= $params->get( 'tweet_enable', 1 );
$t['twitter_name'] 			= $params->get( 'twitter_name', 1 );
$t['twitter_lang'] 			= $params->get( 'twitter_lang', '' );
$t['plusone_enable'] 		= $params->get( 'plusone_enable', 1 );
$t['myspace_enable'] 		= $params->get( 'myspace_enable', 1 );
$t['fb_send_enable'] 		= $params->get( 'fb_send_enable', 1 );
$t['fb_like_enable'] 		= $params->get( 'fb_like_enable', 1 );
$t['fb_comment_count'] 		= $params->get( 'fb_comment_count', '' );
//$t['app'] 					= JFactory::getApplication();
$t['fb_color_scheme'] 		= $params->get( 'fb_color_scheme', '' );
$t['fb_comment_admins']		= $params->get( 'fb_comment_admins', '');
$output							= '';

require(JModuleHelper::getLayoutPath('mod_phoca_facebook_comments'));
?>
