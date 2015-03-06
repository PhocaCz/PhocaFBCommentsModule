<?php 
defined('_JEXEC') or die('Restricted access'); 

echo '<div id="phoca-facebook-comments">'."\n";


//FacebookSend
if ((int)$tmpl['fb_send_enable'] == 1){
    if ((int)$tmpl['fb_comment_enable'] == 1) {
		echo '<div class="pfbcs">'."\n"
         .'<fb:send href="'.$tmpl['uri'].'" font=""></fb:send>'
         .'</div>'."\n";
	} else {
		echo '<div class="pfbcs"><div id="fb-root"></div>'."\n"
         .'<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:send href="'.$tmpl['uri'].'" font=""></fb:send>'
         .'</div>'."\n";
	}
}

// Tweet
if ((int)$tmpl['tweet_enable'] == 1){
    echo '<div class="pfbct">'."\n"
         .'<a href="http://twitter.com/share" class="twitter-share-button"'
		 .'  data-count="horizontal" data-url="'.$tmpl['uri'].'"';
		 
		if ($tmpl['twitter_name'] != '') {
			echo ' data-via="'.$tmpl['twitter_name'].'"';
		}
		if ($tmpl['twitter_lang'] != '') {
			echo ' data-lang="'.$tmpl['twitter_lang'].'"';
		}	
		echo '>'
		 .JText::_('MOD_PHOCA_FACEBOOK_COMMENTS_TWEET').'</a>'
         .'<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>'
         .'</div>'."\n";
}
//PlusOne
if ((int)$tmpl['plusone_enable'] == 1){
    echo '<div class="pfbcp">'."\n"
         .'<g:plusone size="medium"></g:plusone>'
         .'<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>'
         .'</div>'."\n";
}
//MySpace
if ((int)$tmpl['myspace_enable'] == 1){
	$document	=& JFactory::getDocument();
	$document->addCustomTag('
<script type="text/javascript">
function MySpaceGetThis(U)
{
    var targetUrl = \'http://www.myspace.com/index.cfm?fuseaction=postto&u=\' + encodeURIComponent(U);
    window.open(targetUrl, \'ptm\', \'height=450,width=440\').focus();
}
</script>');
	echo '<div class="pfbcm">'."\n"
		.'<a href="javascript:MySpaceGetThis(\''.$tmpl['uri'].'\')">'
        .'<img src="http://cms.myspacecdn.com/cms//ShareOnMySpace/Myspace_btn_Share.png" border="0" alt="'
		. JText::_('MOD_PHOCA_FACEBOOK_COMMENTS_SHARE_ON_MYSPACE').'" /></a></div>'."\n";
}
// LinkedIn
if ((int)$tmpl['linkedin_enable'] == 1){
    echo '<div class="pfbci">'."\n"
         .'<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="'.$tmpl['uri'].'" data-counter="right" ></script>'
         .'</div>'."\n";
}

//FacebookLike
if ((int)$tmpl['fb_like_enable'] == 1){

	$colorSchemeL = '';
	if ((int)$tmpl['fb_color_scheme'] != '') {
		$colorSchemeL = 'colorscheme='.$tmpl['fb_color_scheme'];
	} else {
		$colorSchemeL = 'colorscheme=light';
	}

    echo '<div class="pfbcl">'."\n"
         .'<iframe src="http://www.facebook.com/plugins/like.php?app_id=133499630061802&amp;href='.$tmpl['uri'].'&amp;send=false&amp;layout=standard&amp;width='.(int)$tmpl['fb_like_width'].'&amp;show_faces='.$tmpl['fb_like_show_faces'].'&amp;action=like&amp;'.$colorSchemeL.'&amp;font&amp;height='.(int)$tmpl['fb_like_height'].'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.(int)$tmpl['fb_like_width'].'px; height:'.(int)$tmpl['fb_like_height'].'px;" allowTransparency="true"></iframe>'
         .'</div>'."\n";
}

if ($tmpl['fb_comment_app_id'] == '') {
	echo JText::_('MOD_PHOCA_FACEBOOK_COMMENTS_ERROR_FB_APP_ID_EMPTY');
} else if ((int)$tmpl['fb_comment_enable'] == 1) {
	
	$cCount = '';
	if ((int)$tmpl['fb_comment_count'] > 0) {
		$cCount = 'num_posts="'.$tmpl['fb_comment_count'].'"';
	}
	
	$colorScheme = '';
	if ($tmpl['fb_color_scheme'] != '') {
		$colorScheme = 'colorscheme="'.$tmpl['fb_color_scheme'].'"';
	}
	
	if ($tmpl['fb_comment_app_id'] != '') {
		//$tmpl['app']->addCustomHeadTag('<meta property="fb:app_id" content="'.$tmpl['fb_comment_app_id'].'" />');
		$document->addCustomTag('<meta property="fb:app_id" content="'.$tmpl['fb_comment_app_id'].'" />');
	}
	if ($tmpl['fb_comment_admins'] != '') {
		//$tmpl['app']->addCustomHeadTag('<meta property="fb:admins" content="'.$tmpl['fb_comment_admins'].'" />');
		$document->addCustomTag('<meta property="fb:admins" content="'.$tmpl['fb_comment_admins'].'" />');
	}
	
	echo '<script>(function(d){
  var js, id = \'facebook-jssdk\'; if (d.getElementById(id)) {return;}
  js = d.createElement(\'script\'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/'.  $tmpl['fb_comment_lang'] .'/all.js#xfbml=1&amp;appId='.$tmpl['fb_comment_app_id'].'";
  d.getElementsByTagName(\'head\')[0].appendChild(js);
}(document));</script>';
echo '<div class="pfbcc">';
echo '<fb:comments href="'.  $tmpl['uri'] .'" '.$cCount.' width="'.  (int)$tmpl['fb_comment_width'] .'" '.$colorScheme.'></fb:comments>';
echo '</div>';
	
	/*echo '<div class="pfbcc"><fb:comments href="'.  $tmpl['uri'] .'" simple="1" '. $cCount.' width="'.  (int)$tmpl['fb_comment_width'] .'"></fb:comments>'
		.'<div id="fb-root"></div>'
.'<script>
  window.fbAsyncInit = function() {
   FB.init({
     appId: \''.  $tmpl['fb_comment_app_id'] .'\',
     status: true,
	 cookie: true,
     xfbml: true
   });
 }; 
  (function() {
    var e = document.createElement(\'script\');
    e.type = \'text/javascript\';
    e.src = document.location.protocol + \'//connect.facebook.net/'.  $tmpl['fb_comment_lang'] .'/all.js\';
    e.async = true;
    document.getElementById(\'fb-root\').appendChild(e);
   }());
</script></div>'."\n";*/

}
echo '<div class="cb"></div></div>'."\n";


