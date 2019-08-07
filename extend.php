<?php

/*
 * This file is part of an extension for Flarum, called Hashtags.
 * The idea behind Hashtags is from Billy Wilcosky. Connect with Billy at https://wilcosky.com.
 * But, it would not have been possible without Carl Winkelman who showed how to hook into posts. https://clarkwinkelmann.com/.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flarum\Extend;
use Flarum\Frontend\Document;

return [
    // Register extenders here to customize your forum!
(new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->foot[] = <<<HTML
<script>
  flarum.core.compat.extend.extend(flarum.core.compat['components/CommentPost'].prototype, 'config', function(output, isInitialized, context) {
    // context.contentHtml was updated by CommentPost.config() so we can simply compare it again
    if (context.customExtLastContentHtml !== context.contentHtml) {
      var siteURL = '',
        entries = this.element.querySelectorAll('.Post-body p'),
        i;console.log(entries);
  
      if ( entries.length > 0 ) {
        for (i = 0; i < entries.length; i = i + 1) {
          entries[i].innerHTML = entries[i].innerHTML.replace(/((?!([\S])).|^)#(\S+)\b/g,' <a href="'+siteURL+'search/$3" title="Find more posts tagged with #$3">#$3</a>');
        }
      }
    }

    // We store the new value in our own custom variable so we know if it changes on the next redraw
    context.customExtLastContentHtml = context.contentHtml;
  });
</script>
HTML;
        })
];
