# Follow-up Questions

## 1. How long did you spend on the coding test?

About 8 hours - it was a good exercise for me to try out different ways of using Vue3 and Laravel together.
I have done more advanced laravel and vue code here:

* https://github.com/alexwindsor/highfreq
* http://alexphpdev.ddns.net/highfreq/

## 2. Which parts were the most challenging?

Organising the vue3 front-end code - I spent about 95% on my time on this writing the .vue and .js files.

## 3. What would you add to your solution if you had time? What further improvements or features would you add?

* There's a problem with the pagination - if you select 'all users' and click on page 4, then you select 'mine', it shows an empty page, because there is one one page of 'mine' todo lists. It needs to check if the page number is too high and revert to the highest number if it is.

* Make the site work on a mobile

* Need to change the factory to have random created / updated dates, rather than them all being the same

* Options to order lists by date or alphabetically or by user etc

* Could create lots of feature tests

* Could create an api for showing, searching, creating updating, deleting lists and todos

* Could make the lists and todos searchable

* Could create stats for how long it takes different users to get their todos completed

## 4. How would you track down a performance issue in production? Have you ever had to do this?

Feature tests can help avoid that, as well as thorough manual tests. I had a big problem with pagination, partly due to a bug in inertia.js whereby uri's get doubled up. Never assume that just because a site works in development that it will work exactly the same once deployed in production.
