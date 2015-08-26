#!/usr/bin/env php
<?php

$talk = __DIR__.'/talk.html';
$template = __DIR__.'/index.html';
$output = __DIR__.'/../reveal.js/index.html';

if (file_exists($talk)) {
    unlink($talk);
}

exec('pandoc -f markdown -t revealjs -o talk.html talk.md');

$talk_content = file_get_contents($talk);
$talk_content = str_replace(
    '<span class="kw">atom</span>',
    'atom',
    $talk_content
);

file_put_contents(
    $output,
    str_replace(
        '{TALK}',
        $talk_content,
        file_get_contents($template)
    )
);