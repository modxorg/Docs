---
title: "MIGX.Using Grid Inline Editing"
_old_id: "1730"
_old_uri: "revo/migx/migx.tutorials/migx.using-grid-inline-editing"
---

In this Tutorial we will learn how to create an **Inline Editable Grid** with help of **MIGX**.

First we will create a **Template Variable** (TV). We will then create a **MIGX Configuration** to manage our TV records.

## Requirements

This tutorial is for **MODX 3.0.0-pl** and above.

To begin with we will need to install [MIGX](extras/migx "MIGX") using the Package Manager (**Requires MIGX 2.9 +**).

## Create MIGX-TV with editable grid-cells

### Create new MIGX TV

- Create a new **Template Variable** (TV) 
- In the **General Information** tab
- **Name**: 'countries'
- **Caption**: 'Countries'
- Click the **Input Options** tab
- **Input Type**: 'migx'
- **Configurations**: 'countriesconfig'
- Click the **Template Access** tab
- Check 'Access' for the **Template(s)** where you'd like to use your new TV
- **Save** your new TV

### Create new MIGX Configuration

- In the MODX menu - click **Extras**
- Click **MIGX**
- Click the **Add Item** button
  
#### Settings Tab

- **Name**: 'countriesconfig'
- **unique MIGX ID**: 'countriesconfig'
- Check the checkbox **Add Items directly**

#### Columns Tab

- Click the **Add Item** button
  - **Header**: 'Country'
  - **Field**: 'country'
  - **Cell-Editor**: 'this.textEditor'
  - Click **Save and Close**

- Click the **Add Item** button
  - **Header**: 'Continent'
  - **Field**: 'continent'
  - **Cell-Editor**: 'this.listboxEditor'
  - Click **Save and Close**

- Click the **Add Item** button
  - **Header**: 'Visited'
  - **Field**: 'visited'
  - **Renderer**: 'this.renderSwitchStatusOptions'
  - **on Click**: 'switchOption'
  - Under **Renderoptions**
    - Click **Add Item**
      - **Name**: 'Yes'
      - **value**: '1'
      - **Image**: 'assets/components/migx/style/images/tick.png'
      - Click **Save and Close**
    - Click **Add Item**
      - **Name**: 'No'
      - **value**: '0'
      - **Image**: 'assets/components/migx/style/images/cross.png'
      - Click **Save and Close**
    - Click **Add Item**
      - **Name**: 'Unspecified'
      - **Use as Fallback**: *check*
      - **value**: ''
      - **Image**: 'assets/components/migx/style/images/cross.png'
      - Click **Save and Close**
  - Click **Save and Close**

#### Handlers Tab

- Check **this.handleColumnSwitch**

#### Formtabs Tab

- Click the **Add Item** button
  - **Caption**: 'Countries'
  - Click **Add Item**
    - **Fieldname**: 'country'
    - **Caption**: 'Country'
    - Click **Save and Close**
  - Click **Add Item**
    - **Fieldname**: 'continent'
    - **Caption**: 'Continent'
    - **Input TV type**: 'listbox'
    - **Input Option Values**: 'Asia||Africa||Europe||North America||South America||Australia/Oceania||Antarctica'
    - Click **Save and Close**
  - Click **Add Item**
    - **Fieldname**: 'visited'
    - **Caption**: 'Visited'
    - **Input TV type**: 'checkbox'
    - **Input Option Values**: 'Yes==1'
    - **Default Value**: '0'
    - Click **Save and Close**
  - Click **Save and Close**
- Click **Save and Close** 

Inline-Editing:
Double-click on a Cell
The TextEditor needs 'Enter' to accept the new value!

Editing or deleting multiple items at once:
Select multiple rows (use shift or ctrl - key + left mouseclick)
Do your inline-editing
