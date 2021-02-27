---
title: "Writing a Good Chunk"
_old_id: "159"
_old_uri: "2.x/developing-in-modx/basic-development/snippets/how-to-write-a-good-chunk"
---

We're putting this here because often a Snippet will use Chunks to format data.

## Do NOT Over-Rely on Output Modifier Logic!

What are [Output Modifiers](building-sites/tag-syntax/output-filters) "PHx")? It is a simplified set of parser rules and output modifies that allows you to manipulate data in your view layer (i.e. in your Chunks and Templates).

This is probably the single biggest mistake you can do: adding too much logic to your Chunks or templates. The beautiful thing about MODX as a framework is its adherence to sound architecture, and when you put too much logic in your view layer (i.e. in Chunks and Templates), you are destroying all that's good in this world. Sometimes you have to put an output filter or a little if statement into your Chunk, but please, keep it to an absolute minimum. It's a lot like morphine: morphine is a great pain-killer when used responsibly, but it is terribly addictive and it can destroy lives. Yes, that's a crazy analogy, but I have considered opening a "Rehab Center" for developers with bad coding habits.

### The WRONG Way to do It

Here's an example of a tpl Chunk that got completely out of hand:

``` php
[[+tv.RemovePin:eq=`active`:then=`[[+modx.user.id:memberof=`
Members`:then=`{address:'[[+tv.country]], [[+pagetitle]]', data:'<div class="googleBubble">
[[+tv.Socialicons:replace=`||==`:replace=`facebook==<img src="/assets/images/mapof/facebook.png"
alt="Facebook" width="16" height="16" class="pull-right mR2">`:replace=`linkedin==<img src="/assets/images/mapof/linkedin.png" alt="linked in" width="16" height="16" class="pull-right mR2">`:replace=`twitter==<img src="/assets/images/mapof/twitter.png" alt="twitter" width="16" height="16" class="pull-right mR2">`]]<b>[[+tv.GPGroupName:replace=`'==&apos;`:default=`Dr [[+createdby:userinfo=`fullname`:ucwords]]`]]</b><br>[[+tv.occupation:notempty=`Occupation: [[+tv.occupation]]<br>`]][[+tv.other:notempty=`Occupation: [[+tv.other]]<br><br>`]]
[[+content:replace=`
==<br>`:replace=`'==&apos;`:strip]]<br>[[+tv.leadadmin:notempty=`<br>Admin contact: [[+tv.leadadmin]]`]] [[+tv.opentomembers:notempty=`<br>Open to new members?: [[+tv.opentomembers]]`]]
<br>[[+tv.showEmailAddress:eq=`Yes`:then=`Email: <a href="mailto:[[+createdby:userinfo=`email`]]">
[[+createdby:userinfo=`email`]]</a>`:else=``]]</div>',options:{[[+tv.leadadmin:neq=``:then=`icon: new
google.maps.MarkerImage('/assets/images/mapof/pin-gold.png')`:else=`icon: new
google.maps.MarkerImage('/assets/images/mapof/pin-blue.png')`]]}},`:else=`{address:'[[+tv.country]], [[+pagetitle]]', data:'<div class="googleBubble"><h3>Login to view</h3><p>To view the details of this pin please <a href="[[~702]]">create an account</a> or <a href="[[~702]]">login</a></p>
</div>',options:{[[+tv.leadadmin:neq=``:then=`icon: new
google.maps.MarkerImage('/assets/images/mapof/pin-gold.png')`:else=`icon: new
google.maps.MarkerImage('/assets/images/mapof/pin-blue.png')`]]}},`]]`]]
```

If you are writing stuff like this for your site, _**stop now**_. You will save yourself _hours and hours_ of time if you rethink the problem and move all of that logic into a Snippet or put it somewhere else altogether.

### Reasons Why Output Modifiers Might Destroy Your Site

1. Increased Maintenance costs: it will take _much_ more time to edit your HTML if you obscure it with complex logic.
2. Speed! You cannot fully cache a dynamic Chunk or Template that uses logical conditions. Output Modifiers are much slower than simple PHP.
3. Unlike PHP, Output Modifiers do not send out error messages or line numbers, so it's much, _much_ harder to debug errors!
4. Output Modifiers do not use brackets, and it's impossible to match back-ticks in a text editor, so it's very easy to make syntax errors in your code.

There are hundreds if not thousands of MODX sites out there that have been corrupted and abused by having inefficient logical mayhem crammed into their Chunks and Templates. Yes, it's a great feature that you _can_ do some last-minute tweaking of data in your presentation layer, but it can be terribly abused and although your crazy Chunks might make sense to _you_, once another developer has to work on them, chances are good that they'll want to scrap the whole site and replace it with something more sensible.

One of the things that distinguishes MODX is that its view layer is clean (or it should be anyway). Implementing complex HTML and CSS is a breeze in MODX. Compare this to WordPress, Drupal, or Joomla: bids on eLance say it all. It is a lot more work to integrate templates using those other systems _because they all put logic into their view layers_. When you do that, you are defeating the entire purpose of the MODX MVC architecture.

If you really do need to use them, here is [an excellent article](https://modx.com/blog/2012/09/14/tags-as-the-result-or-how-conditionals-are-like-mosquitoes/) describing how to use Output Modifiers as conditionals with a minimum of overhead.

## The Right Way to Do It

Keep your Chunks and Templates _clean_. They should be easy to read and easy to edit.

``` php
Dear [[+first_name]], it was nice to see you last [[+day_of_week]]
```

See that? Simple. Short. Sweet.

## Good Chunk tpl-keeping Checklist

1. Give your Chunk tpl a good description so people will know what it contains and which Snippets rely on it.
2. Do not include other Chunks in Chunks! Things can get very confusing if you start going down that rabbit-hole.
3. Use proper indenting so your HTML is easy to read.
4. If you do use some logic in your Chunk tpls, make sure you use it _responsibly_. **Do not nest tags**, and do not chain long if-else statements together. A good rule-of-thumb is this: if your Output Modifier does not fit on one line, then you should do it another way.

**Rule of Thumb**
If your Chunk tpl uses an Output Modifier, **it should fit on one line**. If it is longer than one-line, then you should probably find another way to accomplish what you're doing, e.g. use a Snippet, or create another page to handle the variations.

## See Also

1. [Templating Your Snippets](extending-modx/snippets/templating)
2. [Adding CSS and JS to Your Pages Through Snippets](extending-modx/snippets/register-assets)
3. [How to Write a Good Snippet](extending-modx/snippets/good-snippet)
4. [How to Write a Good Chunk](extending-modx/snippets/good-chunk)
