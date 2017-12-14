---
title: "field"
_old_id: "1710"
_old_uri: "revo/formitfastpack/formitfastpack.field"
---

<div>- [Usage](extras/revo/formitfastpack/formitfastpack.field#Usage)
- [Snippet Parameters](http://rtfm.modx.com/extras/revo/formitfastpack/formitfastpack.field#Parameters)
- [Templating](extras/revo/formitfastpack/formitfastpack.field#Templating)
- [Using in PHP scripts](extras/revo/formitfastpack/formitfastpack.field#PHP)
- [More Examples](http://rtfm.modx.com/extras/revo/formitfastpack/formitfastpack.field#Examples)
- [Tutorial](http://rtfm.modx.com/extras/revo/formitfastpack/formitfastpack.tutorial)

</div>Usage
-----

 Call below the FormIt (or any other request-processing snippet) to generate a single HTML form field.

 For example: `[[!field? &name=`full_name` &type=`text` &label=`Enter your name:`]]`

 **Managing Defaults:**

- You can call the **fieldSetDefaults** snippet with any of the **field** snippet parameters to set the default values for _subsequently-processed_ **field** snippets.
- There is a complete property set in the dummy **fieldPropSetExample** snippet. You can copy this to the **field** snippet if desired. However, any property sets on the **field** snippet prevent the **fieldSetDefaults** snippet from working for those properties.

 **Simple Example Form:**

 ```
[[!FormIt? &prefix=`myprefix.` &submitVar=`submitForm`]]
<form action="[[~[[*id]]]]" method="post">
[[!fieldSetDefaults? &prefix=`myprefix.` &outer_tpl=`myWrapTpl` &resetDefaults=`1`]]
[[!field &name=`full_name` &type=`text` &class=`required`]]
[[!field &name=`favorite_color` &type=`checkbox` &options=`Blue||Red||Yellow`]]
[[!field &name=`location` &type=`select` &label=`Where are you from?` &options=`United States==US||New Zealand==NZ||Never Never Land==NNL`]]
[[!field &name=`message` &type=`textarea`]]
[[!field &name=`submitForm` &type=`submit` &label=` ` &message=`Submit Form`]]
</form>

```Snippet Parameters
------------------

 The most common parameter names are in **bold**.

 <table><tbody><tr><td> Parameter </td> <td> Description </td> <td> Default </td> </tr><tr><td> cache </td> <td> By default, caching is "auto". Auto caching works as follows:

- Simple fields without options, elements, or overrides are not cached, nor do they usually benefit from it. To enable caching to see if it helps performance specify &cache=`1`.
- Fields that have options use selective caching. To disable caching, specify &cache=`0`.

 Note that caching does not cache checked/ selected status or the following dynamically-generated placeholders: error, error\_class, and current\_value

 </td> <td> auto </td> </tr><tr><td> custom\_ph </td> <td> (OPTIONAL) Speed improvement. Listing your custom placeholders here or in a fieldSetDefaults call speeds up chunk processing by setting a blank default value. You do not need to list placeholders here that already have a value set somewhere else. </td> <td> class,multiple,array,header,   
 default,class,outer\_class,   
 label,note,note\_class,size,   
 title,req,message,clear\_message

 </td> </tr><tr><td> debug </td> <td> Turn on debugging. </td> <td> 0 </td> </tr><tr><td> delimiter\_template </td> <td> The template for the chunk type separator. </td> <td>`\<!-- [[+type]] -->`

 </td> </tr><tr><td> default\_delimiter </td> <td> If no outer\_type or type is specified, this will be used as the type for the purposes of processing the template chunk. </td> <td> default

 </td> </tr><tr><td>  **default\_value**  </td> <td> The default value to use if no value is found. </td> <td>   
</td> </tr><tr><td> error\_class </td> <td> The name of the class to use for the \[\[+error\_class\]\] placeholder. This placeholder is generated along with \[\[+error\]\] if a FormIt error is found for this field. </td> <td> error

 </td> </tr><tr><td> error\_prefix </td> <td> Usually automatically determined, you can override the prefix that is prepended to the field name for the purpose of getting the field errors from the MODX placeholders. </td> <td>   
</td> </tr><tr><td> inner\_element\_class </td> <td> The element class (modSnippet or modChunk). </td> <td> modChunk

 </td> </tr><tr><td> inner\_element </td> <td> Similar to inner\_html, but accepts the name of an element (a chunk or snippet for example). All of the placeholders and parameters are passed to the chunk. You can also specify an optional chunks\_path parameter that allows file-based chunks in the form name.chunk.tpl </td> <td>   
</td> </tr><tr><td> inner\_element\_properties </td> <td> A JSON array of additional parameters to pass. Example: {"tpl" : "myChunk"} </td> <td> \[\] </td> </tr><tr><td> inner\_html </td> <td> Specify your own HTML instead of using the field template. Useful if you want to use the outer\_tpl and smart caching but specify your own HTML for the field. </td> <td>   
</td> </tr><tr><td> key\_prefix </td> <td> To use the same field names for different forms on the same page, specify a key prefix. </td> <td>   
</td> </tr><tr><td> mark\_selected </td> <td> If left blank or set to zero, disables option marking. By default if "options" or an options override is specified, the field snippet will add a marker such as \\' checked="checked"\\' or (if the field type is "select") \\' selected="selected"\\' in the right place, assuming you are using HTML syntax for value (value="X"). You can specify the marker to use with the selected\_text option. This is a lot faster than using FormItIsSelected or FormItIsChecked. </td> <td> 1

 </td> </tr><tr><td>  **name**  </td> <td> The name of the field. </td> <td>   
</td> </tr><tr><td> options\_delimiter\_inner </td> <td> The delimiter used to separate the label from the value in the options parameter. </td> <td> == </td> </tr><tr><td> options\_delimiter\_outer </td> <td> The delimiter used to separate each option in the options parameter. </td> <td> || </td> </tr><tr><td>  **options**  </td> <td> If your field is a nested or group type, such as checkbox, radio, or select, specify the options in tv-style format like so: Label One==value1||Label Two==value2||Label Three==value3 or Value1||Value2||Value3. The field snippet uses a sub-type (specified by option\_type) to template the options. Setting this parameter causes smart caching to be enabled by default and "selected" or "checked" to be added to the currently selected option, as appropriate. See "mark\_slected" and "cache" parameters. </td> <td>   
</td> </tr><tr><td> options\_element\_class </td> <td> The element class (modSnippet or modChunk). </td> <td> modChunk

 </td> </tr><tr><td> options\_element </td> <td> Similar to options\_html, but accepts the name of an element (a chunk or snippet for example). All of the placeholders and parameters are passed to the chunk. You can also specify an optional chunks\_path parameter that allows file-based chunks in the form name.chunk.tpl </td> <td>   
</td> </tr><tr><td> options\_element\_properties </td> <td> A JSON array of additional parameters to pass. Example: {"tpl" : "myChunk"} </td> <td> \[\] </td> </tr><tr><td> options\_html </td> <td> You can specify your own HTML instead of using the &options parameter to generate options. For example, you might decide to pass in option value="something" data="something" if the type is set to "select". It otherwise acts exactly as if you had specified the options parameter for marking and caching purposes. </td> <td>   
</td> </tr><tr><td>  **option\_type**  </td> <td> Specify the field type used for each option. For &type=`select`, this defaults to "option". For &type=`checkbox` or &type=`radio`, this defaults to "bool". </td> <td>   
</td> </tr><tr><td>  **outer\_tpl**  </td> <td> The outer template chunk, which can be used for any HTML that stays consistent between fields. This is a good place to put your label tags and any wrapping li or div elements that wrap each field in your form. This template can be segmented by field type (or outer type) just like the inner template (&tpl). </td> <td> fieldWrapTpl

 </td> </tr><tr><td>  **outer\_type**  </td> <td> The outer type. The outer template chunk can divided just like the fieldTypesTpl, but with names unrelated to field types. If left empty, outer\_type will default to type. </td> <td>   
</td> </tr><tr><td>  **prefix**  </td> <td> The prefix used by the FormIt call this field is for - may also work with EditProfile, Register, etc... snippet calls. The prefix is also used for other purposes, such as getting and setting the value in the session. </td> <td> fi. </td> </tr><tr><td> selected\_text </td> <td> The text to use for marking options as selected, checked, or whatnot. Usually automatically determined based on the type, but this can be useful if you have a custom type or want something else. </td> <td>   
</td> </tr><tr><td> set\_type\_ph </td> <td> Sets these placeholders to either true or false depending on whether they match this field type. So, if the field type is text and text is listed here, the placeholder "text" will be set to 1, and the other types listed will be set to an empty string. </td> <td> text,textarea,checkbox,radio,select

 </td> </tr><tr><td> to\_placeholders </td> <td> If set, will set all of the placeholders as global MODx placeholders as well. </td> <td> 0 </td> </tr><tr><td>  **tpl**  </td> <td> The template chunk to use for templating all of the various fields. Each field is separated from the others by wrapping it - both above and below - with the following HTML comment: `<!-- fieldtype -->` , where fieldtype is the field type. </td> <td> fieldTypesTpl

 </td> </tr><tr><td>  **type**  </td> <td> The field type. Used to decide which subset of the tpl chunk to use. </td> <td> text </td> </tr><tr><td> use\_cookies </td> <td> If no value is found, get the value from the $\_COOKIES global array. The array key is use\_cookies\_prefix+prefix+name. </td> <td> 0 </td> </tr><tr><td> use\_cookies\_prefix </td> <td> The prefix to use for cookie storage. </td> <td> field.

 </td> </tr><tr><td> use\_formit </td> <td> Get the value from MODX placeholders such as those set by formit. The placeholder key is PREFIX+NAME (so you can make this compatible with Login and similar snippets by changing the prefix). </td> <td> 1 </td> </tr><tr><td> use\_get </td> <td> If no value is found, get the value from the $\_GET global array. The array key is the name of the field. </td> <td> 0 </td> </tr><tr><td> use\_request </td> <td> If no value is found, get the value from the $\_REQUEST global array. The array key is the name of the field. </td> <td> 0 </td> </tr><tr><td> use\_session </td> <td> If no value is found, get the value from the $\_SESSION global array. The array key is use\_session\_prefix+prefix+name. </td> <td> 0 </td> </tr><tr><td> use\_session\_prefix </td> <td> The prefix to use for session storage. </td> <td> field. </td></tr></tbody></table>Templating
----------

 Field snippets use the following two chunks by default to template inner and outer HTML, respectively: **FieldTypesTpl** and **FieldWrapTpl**. The **&tpl** and **&outer\_tpl** parameters can be used to change the names of these chunks.

 The **default templates** are installed in the `core/components/formitfastpack/elements/chunks/`. Future versions will include an option to install these chunks automatically, but for now you can copy and paste the content into chunks called "FieldTypesTpl" and "FieldWrapTpl".

 Special separators are used to separate the HTML for each type, allowing all of the field types to be managed with only two chunks.

 The **&type** and **&outer\_type** parameters can be used to change the inner and outer types. Field types that contain options also use a third type: **&****option\_type**. For example, a select field might use `&type=`select` &option_type=`option``.

 Which segment of the chunk is used for a particular type?

1. By default, the separators above and below the segment are `<!-- TYPE -->`, where TYPE is the type of the field. For example, if `&type=`text``, the separator (above and below the HTML field) is `<!-- text -->`.
2. If the separators for the type are not found, the snippet looks for the default separators: `<!-- default -->`
3. Finally, if the default separators are also not found, the entire chunk is used.

 Here is a subset of the default &tpl chunk ( **fieldTypesTpl**):

 ```
<pre class="brush: xml"><!-- default -->
<input type="[[+type]]" name="[[+name]]" id="[[+key]]" value="[[+current_value]]" class="[[+type]] [[+class]][[+error_class]]" />
<!-- default -->
<!-- hidden -->
  <input type="[[+type]]" name="[[+name]]" value="[[+current_value]]" />
<!-- hidden -->
<!-- textarea -->
  <textarea id="[[+key]]" class="[[+type]] [[+class]][[+error_class]]" name="[[+name]]">[[+current_value]]</textarea>
<!-- textarea -->

``` Here is the default &outer\_tpl chunk ( **fieldWrapTpl**):

 ```
<pre class="brush: xml"><!-- default -->
<div class="[[+outer_class]]" id="[[+name]]_wrap">
<label for="[[+name]]" title="[[+name:replace=`_== `:ucwords]]">[[+label:default=`[[+name:replace=`_== `:ucwords]]`]][[+req:notempty=` *`]]</label>
[[+inner_html]]
[[+note:notempty=`<span class="[[+note_class:default=`note`]]"><em>[[+note]]</em></span>`]]
[[+error:notempty=`<span class="[[+error_class]]">[[+error]]</span>`]]
</div>
<!-- default -->

```<div class="info"> The "note", "note\_field", and "req" placeholders above are examples of custom placeholders. </div>### Placeholders

 All of the parameters you pass into the snippet are available as placeholders. This allows you to add custom placeholders such as "required", "class", etc.... simply by passing them into the snippet as parameters.

 In addition, the following special placeholders are passed in:

 <table><tbody><tr><td> Placeholder </td> <td> Description </td> </tr><tr><td> inner\_html </td> <td> Used in the outer\_tpl to position the generated content, which will vary by field type. Simple example: `<li>[[+inner_html]]</li>` </td> </tr><tr><td> options\_html </td> <td> Used in the tpl to position the options html (only when using &options or an options override). Example: `<select name="[[+name]]">[[+options_html]]</select>` </td> </tr><tr><td> current\_value </td> <td> The value of the FormIt value for the field name. Exactly the same as writing \[\[!fi.fieldname\]\] for each fieldname (if the prefix is fi.). Never gets cached. </td> </tr><tr><td> error </td> <td> The value of the FormIt error message for the field name, if one is found. Exactly the same as writing \[\[!fi.error.fieldname\]\] for each fieldname (if the prefix is fi.). Never gets cached. </td> </tr><tr><td> error\_class </td> <td> set to the value of the error\_class parameter (default is " error") ONLY if a FormIt error for the field name is found. Exactly the same as using \[\[+error:notempty=` error`\]\]. </td> </tr><tr><td> key </td> <td> A unique but human-friendly identifier for each field or sub-field (useful for HTML id attributes). Generated from the key\_prefix, prefix, field name, and (only if using an option field) value. </td></tr></tbody></table>Using in PHP Scripts
--------------------

 You can write snippets to generate forms from a configuration by simply calling `$modx->runSnippet('field', $field_properties_array);` . For example:

 ```
<pre class="brush: php">$output = '';
$output .= $modx->runSnippet('field', array('name'=> 'name', 'type'=> 'text'));
$output .= $modx->runSnippet('field', array('name'=> 'email', 'type'=> 'email'));
return $output;

```More Examples
-------------

 Set the defaults for all field snippets lower down

 ```
[[!fieldSetDefaults? &prefix=`myprefix` &chunks_path=`/path/to/chunks/if/using/file/based/chunks/` &outer_class=`ui-widget` ]]

``` Type defaults to text:

 ```
[[!field? &name=`name`]]

``` Options use the same format as template variables: Label1==Value1||Another Label==another\_value. To use the same value for both label and value, just use Value1||Value2||Value3

 ```
[[!field? &type=`radio` &req=`1` &name=`color` &label=`Your Favorite Color:` &default=`` 
&options=`Red==red||Blue==blue||Other==default`
]]

``` ```
[[!field? &type=`radio` &label=` ` &options=`Publish==publish||Save as draft==save||Preview==preview` &name=`action` &default=``]]

``` Here, a different style of form fields is used by switching out of the default chunks. Use property sets to easily maintain various form styles around the site.

 ```
[[!field? &type=`text` &req=`1` &name=`email` &tpl=`aDifferentTemplate` &outer_tpl=`ADifferentOuterTpl`]]

``` You can disable the outer template:

 ```
[[!field? &type=`hidden` &outer_tpl=`` &name=`blank`]]

``` Here, there were too many options to list, so a chunk name is specified instead that contains the option HTML:

 ```
[[!field? &type=`select` &default=`1` &name=`country_id` &label=`Country:` &options_element=`optionsCountries`  &header=`Please select...`]]

``` A snippet can be used instead of a chunk:

 ```
[[!field? &type=`select` &name=`category` &req=`1` &multiple=`1` &title=`Choose some categories` &array=`1`
    &options_element=`mySnippetToListTopics` &options_element_class=`modSnippet` 
    &options_element_properties=`{"tpl":"fieldOptionTopic"}`
]]

``` &req=`1` is an example of a custom placeholder. In this case, it can be used to add an asterisk or something similar to the label using the notempty output filter

 ```
[[!field? &type=`textarea` &class=`elastic` &req=`1` &name=`message` &label=`Comment`]]

``` There is no need to specify a label if you have a naming convention for your form fields. For example, use \[\[+label:default=`\[\[+name:replace=`\_== `:ucwords\]\]`\]\] to generate a label in your templates. This is already done in the default templates.

 ```
[[!field? &type=`select` &name=`favorite_things` &multiple=`1` &array=`1` &options=`MODx==modx||Money==money||Power==power||Other==default`]]

``` Here is a custom field with a custom type. If you use options with a custom type, you need to specify the type of the options fields with &option\_type.

 ```
[[!field? &type=`customtype` &name=`custom_field_type` &_note=`Make sure you add this custom field to the &tpl chunk!` &custom_placeholder=`custom_value` &another_custom_placeholder=`And another custom value` &options=`One||Two||Three` &option_type=`radio`]]

``` You can even use field snippets for the submit field:

 ```
[[!field? &type=`submit` &name=`submitForm`]]

```