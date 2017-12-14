---
title: "AnythingRating"
_old_id: "1699"
_old_uri: "evo/anythingrating"
---

 **AnythingRating**

 MODX Snippet for Ajax Dynamic Star Rating

 **Features:**

- Uses AJAX Post (simple javascript, no framework like jQuery needed)
- Unobtrusive (works with javascript disabled)
- Use as many rating groups you want
- Rate as many items you want without any TV definition
- Checks not only against IP upon vote but includes also a cookie check
- Precise rating to a 2 decimal place
- Pre-loads common images
- Multi-languages (French, English, ...)
- Tested in IE 6, IE 7, Firefox 2.x, Opera and Safari
- Rating group - Define your rating group once only per page:
- Choose the number of "stars" (or any other image)
- Define an end date for the contest
- Style the rating information you want with the template - eg: 3.25/5 stars 65% (205 votes)
- Change the "star" image by changing the css style sheet
- Precise the number of IP addresses stored. Store the more recent addresses
- Decide if multi-vote is allowed or not
- Choose if only registered users could vote
- Rate anything you want with a unique id:
- Link your rated item to a rating group for contest
- Ability to set 'novote' option to not allow users to vote for this item
- Initialize the first rating from a named Template Variable of a document
- Display top rated items of a rating group:
- Choose the number of top rated items
- Choose to display the "best" or the "worst"
- Define the linked information (title, description, image, link) from an other table
- Style the top rated results you want with the template
- Display as many you want your top rated lists

 Weary of this contest? Simply drop the rating group table!

 **Installation:**

1. Upload the folder _assets/snippets/anythingrating_ in the corresponding folder in your installation.
2. Create a new snippet called AnythingRating with contents of the file _install/assets/snippets/anythingRating.tpl_
3. Add the following minimal snippet calls on your page:
4. First on each page, a rating group definition: \[!AnythingRating? &define=`1` &atrGrp=`grpName`!\] where 'grpName' is the rating group name of items you want to rate.
5. Then anywhere in your page (usually near the item): \[!AnythingRating? &atrGrp=`grpName` &atrId=`idItem`!\] where 'idItem' is the id of each rated item. Could be \[_id_\] or \[+maxigallery.picture.id+\] with a maxigallery template or any other relevant id you want.
6. If you want display the top rated items on other pages: \[\[AnythingRating? &getTopRated=`1` &atrGrp=`grpName` &topTable=`site\_content` &topTitle=`pagetitle`\]\] where 'site\_content' is an example of table where to search the titles of rated items
7. May be edit the css/anythingRating.css file and adapt the styles to change how your rating widget looks
8. May be edit the templates/anythingRating.tpl.html file and adapt the template to change how your rating widget looks. Do the same with templates/topRated.tpl.html. Look at the possible placeholders to customize your templates
9. Enjoy anythingRating!

 **Change the anythingRating folder location**

 To change the location of the anythingRating snippet folder :

1. change the definition of ATR\_PATH in snippet code. define('ATR\_SPATH', 'assets/snippets/anythingRating/');
2. change the definition of ATR\_RELATIVE\_BASE\_PATH in _includes/anythingRating\_process.php_ define('ATR\_RELATIVE\_BASE\_PATH','../../../');
3. in the _js/anythingRating.js_ file change the \_atrbase value: var \_atrbase = 'assets/snippets/anythingRating/';

 **Parameters**

 **General**

 <table><tbody><tr><td> **Property** </td> <td> **Description** </td> <td> **Default** </td> </tr><tr><td> define </td> <td> Set the definition of a group of rated items </td> <td> 0 </td> </tr><tr><td> getTopRated </td> <td> Display top rated items </td> <td> 0 </td> </tr><tr><td> atrGrp </td> <td> **(Mandatory)** Unique rating group name – Any combination of characters a-z, underscores, and numbers 0-9 </td> <td> ratings </td></tr></tbody></table> **Rating group definition (define=1)**

 <table><tbody><tr><td> **Property** </td> <td> **Description** </td> <td> **Default** </td> </tr><tr><td> language </td> <td> Snippet language </td> <td> MODX manager\_language </td> </tr><tr><td> nbStars </td> <td> Number of stars </td> <td> 5 </td> </tr><tr><td> nbIP </td> <td> Number of IP adresses stored </td> <td> all </td> </tr><tr><td> endDate </td> <td> End date to vote </td> <td> unlimited </td> </tr><tr><td> canVote </td> <td> Comma separated list of web user groups allowed to vote. The user should be logged-in as user of this web group. 'all' for a public vote without registration </td> <td> all </td> </tr><tr><td> multiVote </td> <td> Allow a user to vote many times </td> <td> 0 </td> </tr><tr><td> atrCss </td> <td> Path & name of the css file to use </td> <td> assets/snippets/anythingRating/css/anythingRating.css </td> </tr><tr><td> atrTpl </td> <td> Path & name of the template file to use </td> <td> assets/snippets/anythingRating/templates/anythingRating.tpl.html </td></tr></tbody></table> Look at css/anythingRating.css to style the text and the rating widget.

 **Rated item**

 <table><tbody><tr><td> **Property** </td> <td> **Description** </td> <td> **Default** </td> </tr><tr><td> atrId </td> <td> **(Mandatory)** Unique id for this anythingRating instance – Any combination of characters a-z, underscores, and numbers 0-9 </td> <td> 0 </td> </tr><tr><td> noVotes </td> <td> disallow (display votes only) / allow the vote for this item </td> <td> 0 </td> </tr><tr><td> init </td> <td> Initialize the vote with a rating value or from content of a template Variable </td> <td> 0 </td></tr></tbody></table> init could be: - a numeric value >=1 and <= &nbStars - a data as follow TVname\[:docId\] where TVName is a name of TV. By default the value come from the TV of the current document. docId notice which document take into account for the TV TVName. The content of the TV should contain a rating\_value or rating\_value:nb\_votes

 **Get Top Rated items (getTopRated=1)**

 <table><tbody><tr><td> **Property** </td> <td> **Description** </td> <td> **Default** </td> </tr><tr><td> topNb </td> <td> Number of rated items to be displayed </td> <td> 5 </td> </tr><tr><td> topDir </td> <td> Display the best or the worst rated items (best, worst) </td> <td> best </td> </tr><tr><td> topTpl </td> <td> Path & name of the template file to use to display the top rated list </td> <td> assets/snippets/anythingRating/templates/topRated.tpl.html </td> </tr><tr><td> topLabel </td> <td> Label of the top rated item used in the title of top/worst rated results (used by $ _lang\['atr\_bestlabel'\] and $_lang\['atr\_worstlabel'\] in language files) </td> <td> items </td> </tr><tr><td> topTable </td> <td> **(Mandatory)** Table name of the rated items </td> </tr><tr><td> topIdField </td> <td> Id field of the rated items </td> <td> id </td> </tr><tr><td> topTitleField </td> <td> Title field of the rated items </td> <td> title </td> </tr><tr><td> topDescrField </td> <td> Possible description field of the rated items </td> </tr><tr><td> topImageField </td> <td> Possible image field of the rated items </td> </tr><tr><td> topLinkField </td> <td> Possible link field of the rated items </td></tr></tbody></table> **Placeholders**

 A list of the available placeholders that could be used in the templates:

 **AnythingRatingTpl**

 Look for the default content in assets/snippets/anythingRating/templates/anythingRating.tpl.html

 <table><tbody><tr><td> **Placeholder** </td> <td> **Description** </td> </tr><tr><td> atr.scoreSection </td> <td> score section </td> </tr><tr><td> atr.intro </td> <td> score introduction label </td> </tr><tr><td> atr.rating </td> <td> rating value </td> </tr><tr><td> atr.nbstars </td> <td> number of "stars" </td> </tr><tr><td> atr.lbstars </td> <td> label for "stars" </td> </tr><tr><td> atr.nbvotes </td> <td> number of votes </td> </tr><tr><td> atr.lbvotes </td> <td> label for "votes" </td> </tr><tr><td> atr.msgSection </td> <td> message section </td></tr></tbody></table> **topRatedTpl**

 Look for the default content in `assets/snippets/anythingRating/templates/topRated.tpl.html

 <table><tbody><tr><td> **Placeholder** </td> <td> **Description** </td> </tr><tr><td> atr.groupid </td> <td> rating group name </td> </tr><tr><td> atr.baseurl </td> <td> web site base url </td> </tr><tr><td> atr.ratingid </td> <td> id of the rated item </td> </tr><tr><td> atr.hdrank </td> <td> label for "rank" </td> </tr><tr><td> atr.hdscore </td> <td> label for "score" </td> </tr><tr><td> atr.hdnbvotes </td> <td> label for "nb votes" </td> </tr><tr><td> atr.hdtitle </td> <td> label for "title" </td> </tr><tr><td> atr.hddescr </td> <td> label for "descr" see topDescrField parameter </td> </tr><tr><td> atr.hdimage </td> <td> label for "image" see topImageField parameter </td> </tr><tr><td> atr.hdlink </td> <td> label for "link" see topLinkField parameter </td> </tr><tr><td> atr.rank </td> <td> rank </td> </tr><tr><td> atr.rating </td> <td> score (rating value) </td> </tr><tr><td> atr.nbstars </td> <td> number of "stars" </td> </tr><tr><td> atr.lbstars </td> <td> label for "stars" </td> </tr><tr><td> atr.nbvotes </td> <td> number of votes </td> </tr><tr><td> atr.lbvotes </td> <td> label for "votes" </td> </tr><tr><td> atr.title </td> <td> title </td> </tr><tr><td> atr.descr </td> <td> description see topDescrField parameter </td> </tr><tr><td> atr.image </td> <td> image see topImageField parameter </td> </tr><tr><td> atr.link </td> <td> link see topLinkField parameter </td></tr></tbody></table> **Examples**

 **Rating group definition**

 ```
<pre class="brush: php">[!AnythingRating?
&define=`1`
&atrGrp=`photos`
!]

``` This simpliest snippet call defines the 'photos' rating group with:

- a storage of 'all' IP addresses of voters per item
- a widget with 5 images (define by default css file)
- an 'unlimited' date for this contest
- language set as the language of the MODx manager

```
<pre class="brush: php">[!AnythingRating?
&define=`1`
&atrGrp=`travelbook`
&language=`francais-utf8`
&canVote=`travel`
&nbIP=`200`
&nbStars=`10`
&endDate=`2008-06-30`
&atrTpl=`@FILE:assets/snippets/anythingRating/templates/travelBookTpl.tpl.html`
&atrCss=`@FILE:assets/snippets/anythingRating/css/travelBookCss.css`
!]

``` This snippet call defines the 'travelbook' rating group with:

- language set as francais-utf8
- only web users of the "travel" web group could vote
- a storage of a maximum of 200 IP addresses of voters per item
- a widget with 10 images (defined by the css file)
- 2006-06-30 as the end date for the contest
- the file travelBookTpl.tpl.html as template file
- the file travelBookCss.css as css file

 **Rated item**

 ```
<pre class="brush: php">[!AnythingRating?
&atrGrp=`travelbook`
&atrId=`[*id*]`
!]

```- 'travelbook' is the rating group which regroup the rated items
- \[_id_\] is for example the id of the current document you want to rate

```
<pre class="brush: php">[[AnythingRating?
&atrGrp=`travelbooks`
&atrId=`[+id+]`
&init=`opinion:[+id+]`
]]

```- 'travelbook' is the rating group which regroup the rated items
- \[+id+\] is the id of your rated item (travelbook)
- the initial value of rating come from the TV 'opinion' of the document \[+id+\] (snippet called for example from the Ditto item list template)

```
<pre class="brush: php">[!AnythingRating?
&atrGrp=`photos`
&atrId=`[+maxigallery.picture.id+]`
!]

```- 'photos' is the rating group which regroup the rated items
- \[+maxigallery.picture.id+\] is for example the id of the image you want to rate (snippet called from the maxigallery picture template, to re-use the photo id)

 These basic calls renders an anythingRating widget.

 Language, images and display parameters are provided by the rating group photos

 ```
<pre class="brush: php">[!AnythingRating?
&atrGrp=`products`
&atrId=`[*id*]`
&noVotes=`1`
&init=`opinion`
!]

``` where:

- 'products' is the rating group which regroup the rated items
- \[_id_\] is for example the id of the current document you want to rate
- display the vote only (Votes not allowed)
- initialize the vote from the TV 'opinion'

 **Get top Rated items**

 ```
<pre class="brush: php">[[AnythingRating?
&getTopRated=`1`
&atrGrp=`travelbook`
&topTableField=`site_content`
&topTitleField=`pagetitle`
&topLabel=`travelbooks`
]]

``` This simpliest snippet call display the top rated items of the 'travelbooks' contest:

- display the 5 best rated items
- id, title and description of rated items come from the 'site\_content' table
- id field used is by default 'id'
- the label used for the title of the top rated results is 'travelbooks'
- title field use the pagetitle field of the 'site\_content' table
- description, image and link fields are by default not used
- the default template used is: assets/snippets/anythingRating/templates/topRated.tpl.html

```
<pre class="brush: php">[!AnythingRating?
&getTopRated=`1`
&topDir=`worst`
&atrGrp=`photos`
&topNb=`3`
&topTpl=`@FILE:assets/snippets/anythingRating/templates/anotherTopRated.tpl.html`
&topTable=`maxigallery`
&topDescrField=`descr`
&topImageField=`filename`
&topLinkField=`gal_id`
&topLabel=`photos`
!]

``` This snippet call display the top rated items of the 'photos' contest:

- display the 3 worst rated items!
- the template used is: assets/snippets/anythingRating/templates/anotherTopRated.tpl.html
- id, title and description of rated items come from the 'maxigallery' table
- id field and title field used are by default 'id' and 'title'
- description field, of the 'maxigallery' table, used is 'descr'
- image field used is 'filename'
- link field used is 'gal\_id'
- the label used for the title of the worst rated results is 'photos'

 **Where find more support**

1. Look at MODX Community Forums -> Add-ons -> General Repository Items Support -> [Support/Comments for AnythingRating](http://forums.modx.com/forums/thread/38448/support-comments-for-anythingrating#dis-post-219069)

 **Credits**

 Partly based on Ajax Dynamic Star Rating 1.6 by Jordan Boesch (www.boedesign.com)   
 and modified by Coroico (www.modx.wangba.fr)

 **Copyright & Licencing:**

 Licensed under Creative Commons [http://creativecommons.org/licenses/by-nc-nd/2.5/...](http://creativecommons.org/licenses/by-nc-nd/2.5/ca/)