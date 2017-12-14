---
title: "ExerPlan"
_old_id: "1359"
_old_uri: "revo/exerplan"
---

<div>- [ExerPlan](#ExerPlan-ExerPlan)
  - [Download](#ExerPlan-Download)
  - [Development and Bug Reporting](#ExerPlan-DevelopmentandBugReporting)
- [Custom Manager Page (CMP)](#ExerPlan-CustomManagerPage%28CMP%29)
  - [Settings](#ExerPlan-Settings)
  - [Workouts](#ExerPlan-Workouts)
  - [Users](#ExerPlan-Users)
- [Snippets](#ExerPlan-Snippets)
  - [exerplan.Exercises](#ExerPlan-exerplan.Exercises)
      - [Properties](#ExerPlan-Properties)
  - [exerplan.Galleries](#ExerPlan-exerplan.Galleries)
      - [Properties](#ExerPlan-Properties)
  - [exerplan.Assessments](#ExerPlan-exerplan.Assessments)
      - [Properties](#ExerPlan-Properties)
- [Examples](#ExerPlan-Examples)
- [Default Chunks](#ExerPlan-DefaultChunks)
  - [exerplan.exercises.item](#ExerPlan-exerplan.exercises.item)
  - [exerplan.exercises.wrapper](#ExerPlan-exerplan.exercises.wrapper)
  - [exerplan.gallery.item](#ExerPlan-exerplan.gallery.item)
  - [exerplan.gallery.wrapper](#ExerPlan-exerplan.gallery.wrapper)
  - [exerplan.assessment.item](#ExerPlan-exerplan.assessment.item)
  - [exerplan.assessment.wrapper](#ExerPlan-exerplan.assessment.wrapper)

</div>ExerPlan
========

ExerPlan is en exercise planner for a health care or sport training type websites.   
Each of the workouts can have galleries (such as pictures, downloadable files, or video sources) as additional information to the members, eg: about the instructional material.

ExerPlan was written by goldsky and first released on May 25th, 2013.

Download
--------

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, available here: <http://modx.com/extras/package/exerplan>

Development and Bug Reporting
-----------------------------

ExerPlan is stored and developed in GitHub, and can be found here: <https://github.com/goldsky/ExerPlan>

Custom Manager Page (CMP)
=========================

The admin/manager users get a very easy UI for them to manage the workouts.

To understand how it works, I'll explain it backward, start from the setting.

Settings
--------

[![](/download/thumbnails/45940741/settings.png)](/download/attachments/45940741/settings.png)

In here uses are able to set some of the basic settings for drop downs:

1. Media Types   
  This option makes categorization of which file types you want to select. This is related with the **&mediaTypes** property on the snippet call.
2. Sources   
  This option is set to apply some Data/API/Embed code for some of the sources. If it's localhost, then you can ignore that requirements.
3. Difficulty Levels   
  The level of the workout

Workouts
--------

[![](/download/thumbnails/45940741/workouts-grid.png)](/download/attachments/45940741/workouts-grid.png)

This is where the list of the workouts that will be provided for the members/usergroups of the website.   
On the same tab, admin/manager users can set the galleries, by clicking the "Manage Galleries" button.

[![](/download/thumbnails/45940741/workouts-gallery-window.png)](/download/attachments/45940741/workouts-gallery-window.png)

By selecting the left tree of workouts list, admin/manager users can see the grid/table of galleries that have been set before.   
To add new gallery, they can simply click the "Add > Add URL Address" button.

This is where the admin/manager users give the URL address of the galleries, and set the Gallery Sources and Types to apply the additional Data/API/Embed code if there is any.

Users
-----

[![](/download/thumbnails/45940741/user-tree-workouts.png)](/download/attachments/45940741/user-tree-workouts.png)

At last, at the first dashboard, there is the Users tree under the Usergroups tree.   
By selecting the Usergroup name, admin/manager users can see the workouts for the Usergroups.   
By selecting the User name, they can see the workouts for the user, based on the (multiple) usergroups they are within, and of course the additional Individual workouts for the specific user only.

And how about the additional Galleries for this specific user?

[![](/download/thumbnails/45940741/user-tree-galleries.png)](/download/attachments/45940741/user-tree-galleries.png)

Admin/manager users can show the members some videos/pictures/documents from any website sources, eg: the members' own captured video for evaluation.

And the last but not least,

[![](/download/thumbnails/45940741/user-tree-assessments.png)](/download/attachments/45940741/user-tree-assessments.png)

the admin/manager users/mentors can give some assessments about the members.   
FYI, at this moment, this is one way comments, so no respond will be available at the front-end.

Snippets
========

There are 3 snippets available:

1. exerplan.Exercises
2. exerplan.Galleries
3. exerplan.Assessments

All of these snippets have (as the default) **&requireAuth=`1`** property is set, which then output the list that has been set for the logged in user only.   
For all snippets, to get a brief of the placeholders, use **&toArray=`1`** property.   
On the chunk properties, **@BINDINGs** means you can use **@FILE:** to refer the template to the physical file, or **@CODE:** or **@INLINE:** for the inline the code.

exerplan.Exercises
------------------

This snippet show the workouts that have been set for the members.

### Properties

<table><tbody><tr><th>property   
</th><th>description   
</th><th>options   
</th><th>default   
</th></tr><tr><td>**requireAuth**</td><td>is authorization required to see the output?</td><td>bool</td><td>1</td></tr><tr><td>userId</td><td>get the workouts that apply to this user</td><td>int</td><td> </td></tr><tr><td>sortby</td><td>sort the list by this selection</td><td>the field's name of the workouts table</td><td>id</td></tr><tr><td>sortdir</td><td>sort the list by this direction</td><td>enum(asc,desc)</td><td>asc</td></tr><tr><td>phsPrefix</td><td>placeholder's prefix of the output</td><td>string</td><td>exerplan.</td></tr><tr><td>groupByUsergroups</td><td>_not yet implemented_</td><td> </td><td> </td></tr><tr><td>getGalleries</td><td>include the galleries of each workout</td><td>bool</td><td> </td></tr><tr><td>gallerySource</td><td>if this is used, then filter the output by this media source</td><td>string</td><td> </td></tr><tr><td>galleryMediatype</td><td>if this is used, then filter the output by this media type</td><td>string</td><td> </td></tr><tr><td>galleryPrefix</td><td>add more placeholder's prefix for the gallery</td><td>string</td><td>gallery.</td></tr><tr><td>getUsergroupWorkouts</td><td>Is getting workouts for user groups?</td><td>bool</td><td>1</td></tr><tr><td>getUserWorkouts</td><td>Is getting workouts for user?</td><td>bool</td><td>1</td></tr><tr><td>tplItem</td><td>chunk name, or use any of @BINDINGs for workout rows</td><td>string</td><td>exerplan.exercises.item</td></tr><tr><td>itemSeparator</td><td>separator of each of item templates output</td><td>string</td><td>"\\n"</td></tr><tr><td>tplWrapper</td><td>chunk name, or use any of @BINDINGs for wrapper</td><td>string</td><td>exerplan.exercises.wrapper</td></tr><tr><td>tplGalleryItem</td><td>chunk name, or use any of @BINDINGs for gallery's rows inside the gallery's wrapper</td><td>string</td><td>exerplan.gallery.item</td></tr><tr><td>gallerySeparator</td><td>separator of each of gallery's item templates output</td><td>string</td><td>"\\n"</td></tr><tr><td>tplGalleryWrapper</td><td>chunk name, or use any of @BINDINGs for gallery's wrapper</td><td>string</td><td>exerplan.gallery.wrapper</td></tr><tr><td>**toArray**</td><td>dump the placeholders output, rather parse them in the chunk</td><td>bool</td><td> </td></tr><tr><td>toPlaceholder</td><td>place the output into the given name of the placeholder</td><td>string</td><td> </td></tr></tbody></table>exerplan.Galleries
------------------

This snippet show the **individual Galleries** that have been given for the members, or the Galleries for the specified workout.

### Properties

<table><tbody><tr><th>property   
</th><th>description   
</th><th>options   
</th><th>default   
</th></tr><tr><td>**requireAuth**</td><td>is authorization required to see the output?</td><td>bool</td><td>1</td></tr><tr><td>userId</td><td>get the workouts that apply to this user</td><td>int</td><td> </td></tr><tr><td>sortby</td><td>sort the list by this selection</td><td>the field's name of the workouts table</td><td>id</td></tr><tr><td>sortdir</td><td>sort the list by this direction</td><td>enum(asc,desc)</td><td>asc</td></tr><tr><td>phsPrefix</td><td>placeholder's prefix of the output</td><td>string</td><td>exerplan.</td></tr><tr><td>workoutId</td><td>the ID of the workout</td><td>int</td><td> </td></tr><tr><td>gallerySource</td><td>if this is used, then filter the output by this media source</td><td>string</td><td> </td></tr><tr><td>galleryMediatype</td><td>if this is used, then filter the output by this media type</td><td>string</td><td> </td></tr><tr><td>galleryPrefix</td><td>add more placeholder's prefix for the gallery</td><td>string</td><td>gallery.</td></tr><tr><td>getUsergroupWorkouts</td><td>Is getting workouts for user groups?</td><td>bool</td><td>1</td></tr><tr><td>getUserWorkouts</td><td>Is getting workouts for user?</td><td>bool</td><td>1</td></tr><tr><td>tplItem</td><td>chunk name, or use any of @BINDINGs for gallery's rows</td><td>string</td><td>exerplan.gallery.item</td></tr><tr><td>itemSeparator</td><td>separator of each of item templates output</td><td>string</td><td>"\\n"</td></tr><tr><td>tplWrapper</td><td>chunk name, or use any of @BINDINGs for gallery's wrapper</td><td>string</td><td>exerplan.gallery.wrapper</td></tr><tr><td>**toArray**</td><td>dump the placeholders output, rather parse them in the chunk</td><td>bool</td><td> </td></tr><tr><td>toPlaceholder</td><td>place the output into the given name of the placeholder</td><td>string</td><td> </td></tr></tbody></table>exerplan.Assessments
--------------------

This snippet show the assessments that have been set for the members, or from the specified assessor.

### Properties

<table><tbody><tr><th>property   
</th><th>description   
</th><th>options   
</th><th>default   
</th></tr><tr><td>**requireAuth**</td><td>is authorization required to see the output?</td><td>bool</td><td>1</td></tr><tr><td>assesseeId</td><td>get the assessments for this user</td><td>int</td><td> </td></tr><tr><td>assessorId</td><td>get the assessments from this user</td><td>int</td><td> </td></tr><tr><td>**showHidden**</td><td>Show hidden assessments?</td><td>bool</td><td> </td></tr><tr><td>sortby</td><td>sort the list by this selection</td><td>the field's name of the workouts table</td><td>id</td></tr><tr><td>sortdir</td><td>sort the list by this direction</td><td>enum(asc,desc)</td><td>asc</td></tr><tr><td>phsPrefix</td><td>placeholder's prefix of the output</td><td>string</td><td>exerplan.</td></tr><tr><td>assessmentPrefix</td><td>add more placeholder's prefix for the assessment's output</td><td>string</td><td>assessment.</td></tr><tr><td>tplItem</td><td>chunk name, or use any of @BINDINGs for assessment's rows</td><td>string</td><td>exerplan.assessment.item</td></tr><tr><td>itemSeparator</td><td>separator of each of item templates output</td><td>string</td><td>"\\n"</td></tr><tr><td>tplWrapper</td><td>chunk name, or use any of @BINDINGs for assessment's wrapper</td><td>string</td><td>exerplan.assessment.wrapper</td></tr><tr><td>**toArray**</td><td>dump the placeholders output, rather parse them in the chunk</td><td>bool</td><td> </td></tr><tr><td>toPlaceholder</td><td>place the output into the given name of the placeholder</td><td>string</td><td> </td></tr></tbody></table>Examples
========

```
<pre class="brush: html">
[[!Login]]<br>

<!-- &toArray is commented out, remove _ to run -->
[[!exerplan.Galleries?
&requireAuth=`1`
&userId=`[[+modx.user.id]]`
&galleryMediatype=`video`
&_toArray=`1` 
]]

[[!exerplan.Assessments?
&requireAuth=`1`
&assesseeId=`[[+modx.user.id]]`
&_toArray=`1`
]]

```Default Chunks
==============

exerplan.exercises.item
-----------------------

```
<pre class="brush: html">
<div id="exerplan-exercise-[[+exerplan.id]]">
    <div>Exercise: [[+exerplan.name]]</div>
    <div>Description: [[+exerplan.description]]</div>
    <div>Goal: [[+exerplan.goal]]</div>
    <div>Level: [[+exerplan.level_name]]</div>
    <div>Sets: [[+exerplan.set]]</div>
    <div>Reps: [[+exerplan.repetition]]</div>
    [[+exerplan.usergroup:notempty=`
    <div>Usergroup: [[+exerplan.usergroup]]</div>
    `]]
    [[+exerplan.galleries:notempty=`
    [[+exerplan.galleries]]
    `]]
</div>

```exerplan.exercises.wrapper
--------------------------

```
<pre class="brush: html">
<div>
    [[+exerplan.items]]
</div>

```exerplan.gallery.item
---------------------

```
<pre class="brush: html">
<div id="exerplan-gallery-item-[[+exerplan.gallery.id]]">
    [[+exerplan.gallery.url:notempty=`
    <div>
        <a href="[[+exerplan.gallery.url]]"
           title="[[+exerplan.gallery.description]]"
           class="lightbox">
            [[+exerplan.gallery.name]]
        </a>
    </div>
    `:default=`
    <div>[[+exerplan.gallery.name]]</div>
    `]]
    <div>[[+exerplan.gallery.description]]</div>
</div>

```exerplan.gallery.wrapper
------------------------

```
<pre class="brush: html">
<div id="exerplan-exercise-gallery-wrapper">
    [[+exerplan.gallery.items]]
</div>

```exerplan.assessment.item
------------------------

```
<pre class="brush: html">
<div
    id="exerplan-assessment-item-[[+exerplan.assessment.id]]"
    [[+exerplan.assessment.row_index:mod:is=`0`:then=`
    style="border-top: 1px dotted #ddd; border-bottom: 1px dotted #ddd; background-color: #ddd; padding: 10px;"
    `:else=`
    style="border-top: 1px dotted #ddd; border-bottom: 1px dotted #ddd; background-color: #efefef;padding: 10px;"
    `]]
    >
    <div
        style="font-style: italic; font-size: smaller; color: grey;"
        >By: [[+exerplan.assessment.assessor.fullname:notempty=`
        [[+exerplan.assessment.assessor.fullname]]
        `:default=`
        [[+exerplan.assessment.assessor.username]]
        `]], [[+exerplan.assessment.created_on:date=`%d-%m-%Y`]]
    </div>
    <div>[[+exerplan.assessment.assessment]]</div>
</div>

```exerplan.assessment.wrapper
---------------------------

```
<pre class="brush: html">
<div id="exerplan-exercise-assessment-wrapper">
    [[+exerplan.assessment.items]]
</div>

```