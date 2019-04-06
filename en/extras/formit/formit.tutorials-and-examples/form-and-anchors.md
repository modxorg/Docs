---
title: "Form and anchors"
_old_id: "1734"
_old_uri: "revo/formit/formit.tutorials-and-examples/form-and-anchors"
---

 Jump to the form on error validation. [(http://forums.modx.com/thread/47715/jump-to-top-of-form-on-page-on-error-validation)](http://forums.modx.com/thread/47715/jump-to-top-of-form-on-page-on-error-validation)

 Example:

 ``` html
<form action="[[~[[*id]]]]#message" method="post" class="form">
<div id="message">
... Your message content here ...
</div>
... Your input fields here ...
</form>
```

1\. Add an anchor to the action.
2\. Add an ID to the html element where to jump to.
