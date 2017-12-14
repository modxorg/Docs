---
title: "GridEditor.Configuration"
_old_id: "1363"
_old_uri: "imported/grideditor.configuration"
---

GridEditor ConfigurationGridEditor is designed to be as flexible as possible when it comes to displaying, editing and filtering resources & fields in the grid. All aspects of the view are controlled via a JSON object stored in a configuration chunk. When looking for a config chunk, GridEditor will prefix grideditor.config. to the start of a chunk's name. Therefore you would create a chunk calledgrideditor.config.<span class="error">\[ConfigName\]</span>

### <a name="GridEditor.Configuration-Exampleconfigurationchunk"></a>Example configuration chunk

PHP's JSON support is very strict and will fail at the smallest deviation from strict formatting rules. I have plans add a more stable and capable json decoder in future versions, but for the moment be sure your config file follows these guidelines:

- All field names should be enclosed with double quotation marks "
- All strings should be enclosed with double quotation marks "
- No trailing commas on the property ```
  <pre class="brush: php">
  {
      /* ... */
      "title": "This is my page title"
  }
  
  ```### <a name="GridEditor.Configuration-TemplateSelectors"></a>Template Selectors
  
  An array of template names (as strings) or IDs (as integers) to restrict displayed resources to
  
  ```
  <pre class="brush: php">
  {
      /* ... */
      "grouping": "MyTvField"
  }
  
  ```### <a name="GridEditor.Configuration-FilterField"></a>Filter Field
  
  If specified, will create a dropdown selector of every unique value of the specified name field so that results can be filtered accordingly. Optional label attribute will set a label on the dropdown. Field listed must also appear in either the Resource or TV fields lists, or a warning will be thrown and the filter will be ignored
  
  ```
  <pre class="brush: php">
  {
      /* ... */
      "search": ["pagetitle","longtitle","introtext"]
  }
  
  ```### <a name="GridEditor.Configuration-ResourceControls"></a>Resource Controls
  
  An array of optional controls to offer on resources. Options are:
  
  <div class="table-wrap"><table class="confluenceTable"><tbody><tr><th class="confluenceTh"> Control </th><th class="confluenceTh"> Description </th></tr><tr><td class="confluenceTd"> publish </td><td class="confluenceTd"> Enable toggling of resource publish state from grid </td></tr><tr><td class="confluenceTd"> edit </td><td class="confluenceTd"> Provide a link to the resource editing page </td></tr><tr><td class="confluenceTd"> delete </td><td class="confluenceTd"> Provide a button that will delete the resource </td></tr><tr><td class="confluenceTd"> new </td><td class="confluenceTd"> Provide a link to the resource creation page </td></tr></tbody></table></div>```
  <pre class="brush: php">
  {
      /* ... */
      "fields": [{
          "field": "pagetitle",
          "label": "Title",
          "editable": true,
          "sortable": true
       },{
          "field": "contentType",
          "label": "Page Type",
          "editable": false
       },{
          "field": "introtext",
          "label": "Field hijacked as a date",
          "editable": true,
          "editor": "xdatetime"
       }]
  }
  
  ```### <a name="GridEditor.Configuration-TemplateVariablefields"></a>Template Variable fields
  
  Template Variable fields can be included alongside resource fields in the grid using the same parameters. Editor inputs are automatically detected from TV input type unless overridden in config.
  
  <div class="note">**Note:** At this time only text, textarea and single-select listboxes are fully supported by default. All other TV input types will default to a textfield editor unless an alternative editor is explicitely specified in the config file.</div>Fields can be configured using several parameters to customize their behaviour:
  
  <div class="table-wrap"><table class="confluenceTable"><tbody><tr><th class="confluenceTh"> Property </th><th class="confluenceTh"> Description </th><th class="confluenceTh"> Default </th></tr><tr><td class="confluenceTd"> field </td><td class="confluenceTd"> Name of the TV </td><td class="confluenceTd"> </td></tr><tr><td class="confluenceTd"> label </td><td class="confluenceTd"> Label to use for grid column </td><td class="confluenceTd"> Field name </td></tr><tr><td class="confluenceTd"> sortable </td><td class="confluenceTd"> Can this column be sorted in the grid? </td><td class="confluenceTd"> false </td></tr><tr><td class="confluenceTd"> editable </td><td class="confluenceTd"> Can this field be edited? </td><td class="confluenceTd"> false </td></tr><tr><td class="confluenceTd"> editor </td><td class="confluenceTd"> Override the default editor xtype </td><td class="confluenceTd"> textfield </td></tr><tr><td class="confluenceTd"> hidden </td><td class="confluenceTd"> Allows a field to be user for search/filtering but not appear in grid </td><td class="confluenceTd"> false </td></tr></tbody></table></div>
  - <div class="code panel" style="border-width: 1px;"><div class="codeContent panelContent">```
      <pre class="code-java">{
        /* ... */
        <span class="code-quote">"tvs"</span>: [{
              <span class="code-quote">"field"</span>: <span class="code-quote">"MyTvName"</span>,
              <span class="code-quote">"label"</span>: <span class="code-quote">"My TV Name"</span>,
              <span class="code-quote">"editable"</span>: <span class="code-keyword">true</span>,
              <span class="code-quote">"sortable"</span>: <span class="code-keyword">true</span>
           },{
              <span class="code-quote">"field"</span>: <span class="code-quote">"AnotherTvName"</span>,
              <span class="code-quote">"label"</span>: <span class="code-quote">"A Different TV"</span>,
              <span class="code-quote">"editable"</span>: <span class="code-keyword">false</span>
           }]
      }
      ```</div></div>