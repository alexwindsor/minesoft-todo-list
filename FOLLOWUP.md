# Follow-up Questions

## 1. How long did you spend on the coding test?

About 8 hours - it was a good exercise for me to try out different ways of using Vue3 and Laravel together.
I have done more advanced laravel and vue code here:

* https://github.com/alexwindsor/highfreq
* http://alexphpdev.ddns.net/highfreq/

## 2. Which parts were the most challenging?

Organising the vue3 front-end code - I spent about 95% on my time on this writing the .vue and .js files.

## 3. What would you add to your solution if you had time? What further improvements or features would you add?

* Make the site work on a mobile

* Put lots of comments in the code explaining what is going on

* Need to change the factory to have random created / updated dates, rather than them all being the same

* Options to order lists by date or alphabetically or by user etc

* Create lots of feature tests

* Create an api for showing, searching, creating updating, deleting lists and todos

* Make the lists and todos searchable

* Create stats for how long it takes different users to get their todos completed

## 4. How would you track down a performance issue in production? Have you ever had to do this?

I would work out what the steps are to recreate the problem. Echoing out any variables or arrays to the screen to try to identify the problem. Feature tests can help avoid that, as well as thorough manual tests. I had big problems with pagination, partly due to a bug in inertia.js whereby uri's get doubled up. Never assume that just because a site works in development that it will work exactly the same once deployed in production.
