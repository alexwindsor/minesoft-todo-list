#Follow-up Questions

##1. How long did you spend on the coding test?

About 8 hours 

##2. Which parts were the most challenging?

Organising the vue3 front-end code - I spent about 95% on my time on this writing the .vue and .js files.

##3. What would you add to your solution if you had time? What further improvements or features would you add?

..* There's a problem with the pagination - if you select 'all users' and click on page 4, then you select 'mine', it shows an empty page, because there is one one page of 'mine' todo lists. It needs to check if the page number is too high and revert to the highest number if it is.

..* Make the site work on a mobile

..* Need to change the factory to have random created / updated dates, rather than them all being the same

..* Options to order lists by date or alphabetically or by user etc..

..* Could create lots of feature tests

..* Could create an api for showing, searching, creating updating, deleting lists and todos

..* Could make the lists and todos searchable

..* Could create stats for how long it takes different users to get their todos completed

##4. How would you track down a performance issue in production? Have you ever had to do this?

With tests perhaps? There's always more to do, such as indexing database fields and also look at ways to optimnise the vue3 code to make it work faster and smoother,