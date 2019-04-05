---
title: "MIGX.Using Grid Inline Editing"
_old_id: "1730"
_old_uri: "revo/migx/migx.tutorials/migx.using-grid-inline-editing"
---

Possible with MIGX 2.9 +

raw version for now - feel free, to make it a bit nicer!

Create MIGX-TV with editable grid-cells:

 Create new MIGX-TV
 In input-options put into the field 
 configurations: editablegridcells

 assign it to your Template

 Go to the MIGX-CMP to the tab MIGX
 Create a new config with

 Tab 'Settings' 
 name: editablegridcells
 unique MIGX ID: editablegridcells
 check the checkbox 'add items directly'

 Tab 'Columns'
 Create columns:

 Header: Text
 Field: text
 Cell-Editor: this.textEditor

 Header: Listbox
 Field: listbox
 Cell-Editor: this.listboxEditor

 Header: Checkbox
 Field: checkbox
 Renderer: this.renderSwitchStatusOptions
 onClicK: switchOption

 Add three RenderOptions:

 name: checkbox\_inactive
 value: 0
 image: assets/components/migx/style/images/cb\_empty.png

 name: checkbox\_active
 value: 1
 image: assets/components/migx/style/images/cb\_ticked.png

 and as fallback for other values:

 name: checkbox\_fallback
 check the ckeckbox: 'use as fallback'
 value: 
 image: assets/components/migx/style/images/cb\_empty.png

 at the Tab 'Handlers' check 'this.handleColumnSwitch'

 at the Tab 'Formtabs'

 Create a Tab with Caption 'Fields'
 Create three fields:

 Fieldname: text
 Caption: Text

 Fieldname: listbox
 Caption: Listbox
 input TV type: listbox
 Input Option Values: Value A||Value B||Value C||Value D

 Fieldname: checkbox
 Caption: Checkbox
 input TV type: checkbox
 Input Option Values: active==1
 Default Value: 0


 Inline-Editing:
 Double-click on a Cell
 The TextEditor needs 'Enter' to accept the new value!

 Editing or deleting multiple items at once:
 Select multiple rows (use shift or ctrl - key + left mouseclick)
 Do your inline-editing