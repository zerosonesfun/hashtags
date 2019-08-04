<?php

/*
 * This file is part of an extension for Flarum, called Fickle.
 * The creator of Fickle is Billy Wilcosky. Connect with Billy at https://wilcosky.com.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flarum\Extend;
use Flarum\Frontend\Document;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->head[] = '<script defer src="/assets/extensions/zerosonesfun-fickle-announcement/fickle.js"></script>';
        })
];
