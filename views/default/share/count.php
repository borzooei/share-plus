<?php

$list = '';
$num_of_share = share_count($vars['entity']);
$guid = $vars['entity']->getGUID();

if ($num_of_share) {
    // display the number of share
    if ($num_of_share == 1) {
        $share_string = elgg_echo('share:usersharethis', array($num_of_share));
    }
    else {
        $share_string = elgg_echo('share:userssharethis', array($num_of_share));
    }
    
    $params = array(
        'text' => $share_string,
        'title' => elgg_echo('share:see'),
        'rel' => 'popup',
        'href' => "#share-$guid");
    
    $list = elgg_view('output/url', $params);
    $list .= "<div class='elgg-module elgg-module-popup elgg-share hidden clearfix' id='share-$guid'>";
    $list .= elgg_list_annotations(array(
        'guid' => $guid,
        'annotation_name' => 'share',
        'limit' => 99,
        'list_class' => 'elgg-list-share'
    ));
    $list .= "</div>";
    echo $list;
}
