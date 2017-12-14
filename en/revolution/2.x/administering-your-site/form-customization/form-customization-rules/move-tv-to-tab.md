---
title: "Move TV to Tab"
_old_id: "1353"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-rules/move-tv-to-tab"
---

<a name="MoveTVtoTab-TheMoveTVtoTabRule"></a>The Move TV to Tab Rule
--------------------------------------------------------------------

The Move TV to Tab rule will move any TV to the tab you specify.

<a name="MoveTVtoTab-Usage"></a>Usage
-------------------------------------

Specify the ID of the tab to move to in the "name" field of the Rule. Then specify the TV's ID prefixed with 'tv' in the "value" field.

The list of available tabs is:

<div class="table-wrap"><table class="confluenceTable"><tbody><tr><th class="confluenceTh">ID</th><th class="confluenceTh">Description</th></tr><tr><td class="confluenceTd">modx-resource-settings</td><td class="confluenceTd">The first tab, or Create/Edit resource tab.</td></tr><tr><td class="confluenceTd">modx-page-settings</td><td class="confluenceTd">The second tab, or Page Settings tab.</td></tr></tbody></table></div>You can also create a tab with the [New Tab](display/revolution20/New+Tab "New Tab") rule and move a TV there.

<a name="MoveTVtoTab-Examples"></a>Examples
-------------------------------------------

An example rule for moving the TV 1 to the first tab in the Resource create page would look like so:

<span class="image-wrap" style="">![](download/attachments/18678100/rule-tvMove.png?version=1&modificationDate=1279291685000)</span>

<a name="MoveTVtoTab-SeeAlso"></a>See Also
------------------------------------------

 \[\[getResources@section? &parents=`1353` &context=`revolution`\]\]