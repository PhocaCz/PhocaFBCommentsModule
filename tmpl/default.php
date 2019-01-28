<?php
defined('_JEXEC') or die('Restricted access');
$document	= JFactory::getDocument();

echo '<div id="phoca-facebook-comments">'."\n";


//FacebookSend
if ((int)$t['fb_send_enable'] == 1){
    if ((int)$t['fb_comment_enable'] == 1) {
		echo '<div class="pfbcs">'."\n"
         .'<fb:send href="'.$t['uri'].'" font=""></fb:send>'
         .'</div>'."\n";
	} else {
		echo '<div class="pfbcs"><div id="fb-root"></div>'."\n"
         .'<script src="https://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:send href="'.$t['uri'].'" font=""></fb:send>'
         .'</div>'."\n";
	}
}

// Tweet
if ((int)$t['tweet_enable'] == 1){
    echo '<div class="pfbct">'."\n"
         .'<a href="https://twitter.com/share" class="twitter-share-button"'
		 .'  data-count="horizontal" data-url="'.$t['uri'].'"';

		if ($t['twitter_name'] != '') {
			echo ' data-via="'.$t['twitter_name'].'"';
		}
		if ($t['twitter_lang'] != '') {
			echo ' data-lang="'.$t['twitter_lang'].'"';
		}
		echo '>'
		 .JText::_('MOD_PHOCA_FACEBOOK_COMMENTS_TWEET').'</a>'
         .'<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>'
         .'</div>'."\n";
}
//PlusOne
if ((int)$t['plusone_enable'] == 1){
    echo '<div class="pfbcp">'."\n"
         .'<g:plusone size="medium"></g:plusone>'
         .'<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>'
         .'</div>'."\n";
}
//MySpace
if ((int)$t['myspace_enable'] == 1){
	$document->addCustomTag('
<script type="text/javascript">
function MySpaceGetThis(U)
{
    var targetUrl = \'https://www.myspace.com/index.cfm?fuseaction=postto&u=\' + encodeURIComponent(U);
    window.open(targetUrl, \'ptm\', \'height=450,width=440\').focus();
}
</script>');
	echo '<div class="pfbcm">'."\n"
		.'<a href="javascript:MySpaceGetThis(\''.$t['uri'].'\')">'
        .'<img src="https://cms.myspacecdn.com/cms//ShareOnMySpace/Myspace_btn_Share.png" style="border:none;" alt="'
		. JText::_('MOD_PHOCA_FACEBOOK_COMMENTS_SHARE_ON_MYSPACE').'" /></a></div>'."\n";
}
// LinkedIn
if ((int)$t['linkedin_enable'] == 1){
    echo '<div class="pfbci">'."\n"
         .'<script type="text/javascript" src="https://platform.linkedin.com/in.js"></script><script type="in/share" data-url="'.$t['uri'].'" data-counter="right" ></script>'
         .'</div>'."\n";
}

//FacebookLike
if ((int)$t['fb_like_enable'] == 1){

	$colorSchemeL = '';
	if ((int)$t['fb_color_scheme'] != '') {
		$colorSchemeL = 'colorscheme='.$t['fb_color_scheme'];
	} else {
		$colorSchemeL = 'colorscheme=light';
	}

    echo '<div class="pfbcl">'."\n"
         .'<iframe src="https://www.facebook.com/plugins/like.php?app_id=133499630061802&amp;href='.$t['uri'].'&amp;send=false&amp;layout=standard&amp;show_faces='.$t['fb_like_show_faces'].'&amp;action=like&amp;'.$colorSchemeL.'&amp;font&amp;height='.(int)$t['fb_like_height'].'"  style="border:none; overflow:hidden; width:'.htmlspecialchars($t['fb_like_width']).'; height:'.htmlspecialchars($t['fb_like_height']).';" ></iframe>'
         .'</div>'."\n";
}

if ($t['fb_comment_app_id'] == '') {
	echo JText::_('MOD_PHOCA_FACEBOOK_COMMENTS_ERROR_FB_APP_ID_EMPTY');
} else if ((int)$t['fb_comment_enable'] == 1) {

	$cCount = '';
	if ((int)$t['fb_comment_count'] > 0) {
		$cCount = 'num_posts="'.$t['fb_comment_count'].'"';
	}

	$colorScheme = '';
	if ($t['fb_color_scheme'] != '') {
		$colorScheme = 'colorscheme="'.$t['fb_color_scheme'].'"';
	}

	if ($t['fb_comment_app_id'] != '') {
		//$t['app']->addCustomHeadTag('<meta property="fb:app_id" content="'.$t['fb_comment_app_id'].'" />');
		$document->addCustomTag('<meta property="fb:app_id" content="'.$t['fb_comment_app_id'].'" />');
	}
	if ($t['fb_comment_admins'] != '') {
		//$t['app']->addCustomHeadTag('<meta property="fb:admins" content="'.$t['fb_comment_admins'].'" />');
		$document->addCustomTag('<meta property="fb:admins" content="'.$t['fb_comment_admins'].'" />');
	}

	echo '<script>(function(d){
  var js, id = \'facebook-jssdk\'; if (d.getElementById(id)) {return;}
  js = d.createElement(\'script\'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/'.  $t['fb_comment_lang'] .'/all.js#xfbml=1&amp;appId='.$t['fb_comment_app_id'].'";
  d.getElementsByTagName(\'head\')[0].appendChild(js);
}(document));</script>';
echo '<div class="pfbcc">';
echo '<fb:comments href="'.  $t['uri'] .'" '.$cCount.' width="'.  htmlspecialchars($t['fb_comment_width']) .'" '.$colorScheme.'></fb:comments>';
echo '</div>';

	/*echo '<div class="pfbcc"><fb:comments href="'.  $t['uri'] .'" simple="1" '. $cCount.' width="'.  (int)$t['fb_comment_width'] .'"></fb:comments>'
		.'<div id="fb-root"></div>'
.'<script>
  window.fbAsyncInit = function() {
   FB.init({
     appId: \''.  $t['fb_comment_app_id'] .'\',
     status: true,
	 cookie: true,
     xfbml: true
   });
 };
  (function() {
    var e = document.createElement(\'script\');
    e.type = \'text/javascript\';
    e.src = document.location.protocol + \'//connect.facebook.net/'.  $t['fb_comment_lang'] .'/all.js\';
    e.async = true;
    document.getElementById(\'fb-root\').appendChild(e);
   }());
</script></div>'."\n";*/

}
echo '<div class="cb"></div></div>'."\n";


