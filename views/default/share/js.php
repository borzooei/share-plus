elgg.ui.sharePopupHandler = function(hook, type, params, options) {
	if (params.target.hasClass('elgg-share')) {
		options.my = 'right bottom';
		options.at = 'left top';
		return options;
	}
	return null;
};

elgg.register_hook_handler('getOptions', 'ui.popup', elgg.ui.sharePopupHandler);
