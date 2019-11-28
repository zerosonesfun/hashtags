<?php

/*
 * Hashtags is a Flarum extension created by Billy Wilcosky.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For instructions, please view the README file.
 */

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
(new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->foot[] = <<<HTML
<script type="text/javascript" src="/assets/extensions/zerosonesfun-hashtags/purify.min.js"></script>
<script>
  flarum.core.compat.extend.extend(flarum.core.compat['components/CommentPost'].prototype, 'config', function(output, isInitialized, context) {
    if (context.customExtLastContentHtml !== context.contentHtml) {
    var els = document.getElementsByTagName("p");
    for(var i = 0, all = els.length; i < all; i++){   
         els[i].classList.add('Post-paragraph');
     }
    var elss = document.getElementsByClassName("PostMention");
    for(var i = 0, all = elss.length; i < all; i++){   
         elss[i].parentNode.classList.remove('Post-paragraph');
     }
      var siteURL = '/',
        entries = this.element.querySelectorAll('.Post-paragraph'),
        i;
  
      if ( entries.length > 0 ) {
        for (i = 0; i < entries.length; i = i + 1) {
          entries[i].innerHTML = entries[i].innerHTML.replace(/((?!([\S])).|^)#(\S+)\b/g,DOMPurify.sanitize(' <a href="'+siteURL+'all?q=$3" class="hashTag" title="Find more posts related to $3">#$3</a>'));
        }
      }
    }
    context.customExtLastContentHtml = context.contentHtml;
  });
</script>
HTML;
        }),
        (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[t]{TEXT100}[/t]',
                '<a href="/all?q={TEXT100}" class="tagPhrase" title="Find more posts related to {TEXT100}">{TEXT100}</a>'
            );
        })
];
