<?php

namespace B2\jQuery;

class markItUp
{
	static function appear($id, $settings = 'mySettings')
	{
		self::load();

		jquery::on_ready("
w=jQuery('$id').parents('td').width()
m=jQuery('$id').markItUp($settings).css('height', function() {
	var h = jQuery(this).css('line-height').match(/(\d+)(.*)/)
	return (h[1]*jQuery(this).attr('rows'))+h[2]
}).css('width', w)
jQuery('.markItUp').css('width', w)
");
//	jQuery('#bbcode').height(300);
	}

	static function load()
	{
		\B2\jQuery::load();
		$base = config('jquery.markitup.base');
		$set  = config('jquery.markitup.sets.bbcode');
		$set_js  = config('jquery.markitup.set.js', "$set/set.js");

		template_css("$base/skins/simple/style.css");
		template_css("$set/style.css");

		template_js_include("$base/jquery.markitup.js");
		template_js_include($set_js);
	}
}
