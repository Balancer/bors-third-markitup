<?php

// Тестировать можно на http://admin.aviaport.wrk.ru/job/vacancies/3737/

class jquery_markitup
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
		jquery::load();
//TODO: убрать после сноса из конфигов.
//		$base = config('jquery.markitup.base');
//		$set  = config('jquery.markitup.sets.bbcode');
		$set = '/_bors-3rd/jquery/plugins/bors/markitup-sets/bbcode';
		$set_js  = config('jquery.markitup.set.js', "$set/set.js");

		template_css('/bower-asset/markitup/markitup/skins/simple/style.css');
		template_css("$set/style.css");

		template_js_include('/bower-asset/markitup/markitup/jquery.markitup.js');
		template_js_include($set_js);
	}
}
