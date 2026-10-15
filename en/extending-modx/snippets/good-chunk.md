---
title: "Writing a Good Chunk"
_old_id: "159"
_old_uri: "2.x/developing-in-modx/basic-development/snippets/how-to-write-a-good-chunk"
---

## Do NOT Over-Rely on Output Modifier Logic!

[Output Modifiers](building-sites/tag-syntax/output-filters) are a small set of parser rules that manipulate data in your view layer — in Chunks and Templates.

The most common mistake is putting too much logic there. Some filter or an occasional `if` in a Chunk is fine; keep it to a minimum. MODX's architecture expects the view layer to stay clean, and heavy logic in Chunks and Templates works against that.

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

If your Chunks look like this, stop now: rethink the problem and move the logic into a Snippet or elsewhere.

### Reasons Why Output Modifiers Might Destroy Your Site

1. Increased Maintenance costs: it will take _much_ more time to edit your HTML if you obscure it with complex logic.
2. Speed! You cannot fully cache a dynamic Chunk or Template that uses logical conditions. Output Modifiers are much slower than simple PHP.
3. Unlike PHP, Output Modifier errors are not shown in the page output: they are written to the MODX error log (without a line number pointing into your Chunk), so it's much, _much_ harder to debug errors!
4. Output Modifiers do not use brackets, and it's impossible to match back-ticks in a text editor, so it's very easy to make syntax errors in your code.

<!-- MEDIA: output | nice | One error-log line written by a broken Output Modifier: date, level and the message with no line number pointing into the Chunk | Compose it from point 3 above; use invented data -->

If you really do need them, [this article](https://modx.com/blog/2012/09/14/tags-as-the-result-or-how-conditionals-are-like-mosquitoes/) shows how to use Output Modifiers as conditionals with a minimum of overhead.

## The Right Way to Do It

Keep your Chunks and Templates _clean_. They should be easy to read and easy to edit.

``` php
Dear [[+first_name]], it was nice to see you last [[+day_of_week]]
```

## Good Chunk tpl-keeping Checklist

1. Give your Chunk tpl a good description so people will know what it contains and which Snippets rely on it.
2. Do not include other Chunks in Chunks! Things can get very confusing if you start going down that rabbit-hole.
3. Use proper indenting so your HTML is easy to read.
4. If you do use some logic in your Chunk tpls, make sure you use it _responsibly_. **Do not nest tags**, and do not chain long if-else statements together. A good rule-of-thumb is this: if your Output Modifier does not fit on one line, then you should do it another way.

## See Also

1. [Templating Your Snippets](extending-modx/snippets/templating)
2. [Adding CSS and JS to Your Pages Through Snippets](extending-modx/snippets/register-assets)
3. [How to Write a Good Snippet](extending-modx/snippets/good-snippet)
