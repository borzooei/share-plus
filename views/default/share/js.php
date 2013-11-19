elgg.ui.sharePopupHandler = function(hook, type, params, options) {
	if (params.target.hasClass('elgg-share')) {
		options.my = 'right bottom';
		options.at = 'left top';
		return options;
	}
	return null;
};

elgg.register_hook_handler('getOptions', 'ui.popup', elgg.ui.sharePopupHandler);

elgg.provide('elgg.share');

elgg.share.init = function() {

};
elgg.share.share = function(guid) {
	button=$("#sharebutton"+guid);
	count=$("#sharecount"+guid);	
	elgg.action('share/share', {	
		data: {
			guid: guid
		}, 
		success: function(json) {
			if ($(json.output).children('guid:first').length>0) {    //having "guid" means shareing succeeds
				button.parent().html($(json.output).children('button:first').html());
				count.parent().html($(json.output).children('count:first').html());			
			}
		}
	});
	return;
};

elgg.share.delete = function(guid) {
	button=$("#sharebutton"+guid);
	count=$("#sharecount"+guid);	
	elgg.action('share/delete', {
		data: {
			guid: guid
		}, 
		success: function(json) {
			if ($(json.output).children('guid:first').length>0) {
				button.parent().html($(json.output).children('button:first').html());
				count.parent().html($(json.output).children('count:first').html());			
			}			
		}
	});
	return;
};

elgg.register_hook_handler('init', 'system', elgg.share.init);

