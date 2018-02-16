---
title: "TV Default"
_old_id: "313"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-rules/tv-default"
---

<a name="TVDefault-TheTVDefaultValueRule"></a>The TV Default Value Rule
-----------------------------------------------------------------------

The TV Default Value Rule, if set, will set the default value for a TV.

<div class="note">This only works on "create" Actions, **not** "update" Actions.</div><a name="TVDefault-Usage"></a>Usage
-----------------------------------

The values for the Rule should be as follows:

- **Name**: The ID of the TV prefixed with 'tv'; for example, for the TV with ID 23, 'tv23'
- **Containing Panel**: 'modx-panel-resource'
- **Rule**: 'TV Default Value'
- **Value**: The value you want to set as the default.

<a name="TVDefault-Examples"></a>Examples
-----------------------------------------

An example Rule of setting the default value for a TV with ID 23 to "test" is:

<span class="image-wrap" style="">![](download/attachments/18678098/fc-tvDefault.png?version=1&modificationDate=1280153441000)</span>

<a name="TVDefault-SeeAlso"></a>See Also
----------------------------------------

 \[\[getResources@section? &parents=`313` &context=`revolution`\]\]