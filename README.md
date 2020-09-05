# Hashtags
Adds "hashtag to link" ability to Flarum by turning any word that begins with a "#" into a link. When the link is clicked, a search is performed for related posts. This does not track hashtag popularity. This is a very minimal extension which (besides the composer.json, readme.md, and license) is only 1 file. 51 lines, 1.85 KB.

As an added bonus, you may tag a phrase or multiple keywords with spaces, versus posting a traditional "hashtag." But, you will have to use a BBcode which looks like this (uses a "t" for tag):
`[t]your search phrase[/t]`

## Install
`composer require zerosonesfun/hashtags`

## Update
`composer update zerosonesfun/hashtags`

## Remove
`composer remove zerosonesfun/hashtags`
