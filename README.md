# Hashtags
Adds "hashtag to link" ability to Flarum. To be clear, this will simply look for a word which starts with "#" and turn it into a link. The link will perform a search if clicked. This does not do anything like track the popularity of hashtags. Still, it can be very helpful to be able to quick point someone to a specific search term this way: Click #puppies, and you'll find more posts on puppies.

Also as an added bonus, you can tag a phrase or multiple keywords with spaces, versus posting a traditional "hashtag." But, you will have to use a new BBcode which looks like this (uses a "t"):
`[t]your search phrase[/t]`

## Install
`composer require zerosonesfun/hashtags`

## Update
`composer update zerosonesfun/hashtags`
