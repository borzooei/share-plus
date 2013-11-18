<?php

if (!isset($vars['annotation'])) {
    return true;
}

$share = $vars['annotation'];

$user = $share->getOwnerEntity();
if (!$user) {
    return true;
}

$user_icon = elgg_view_entity_icon($user, 'tiny');
$user_link = elgg_view('output/url', array(
    'href' => $user->getURL(),
    'text' => $user->name,
    'is_trusted' => true
));

$share_string = elgg_echo('share:this');

$friendlytime = elgg_view_friendly_time($share->time_created);

if ($share->canEdit()) {
    $delete_button = elgg_view("output/confirmlink", array(
        'href' => "action/share/delete?id={$share->id}",
        'text' => "<span class=\"elgg-icon elgg-icon-delete float-alt\"></span>",
        'confirm' => elgg_echo('share:delete:confirm'),
        'encode_text' => false
));
}

$body = <<<HTML
<p class="mbn">
	$delete_button
	$user_link $share_string
	<span class="elgg-subtext">
		$friendlytime
	</span>
</p>
HTML;

echo elgg_view_image_block($user_icon, $body);
