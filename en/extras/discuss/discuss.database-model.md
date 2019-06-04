---
title: "Database Model"
_old_id: "824"
_old_uri: "revo/discuss/discuss.database-model"
---

The Discuss xPDO model can be viewed on Github. This page highlights the most important fields for the most important objects for reference of other documentation materials. Please note that this document lists types as the phptype in the schema: the way the developer or user interacts with it, not necessarily the way it is stored.

[View the entire (XML xPDO) schema on Github](https://github.com/modxcms/Discuss/blob/develop/_build/schema/discuss.mysql.schema.xml).

## disCategory - Categories

| Field               | Type (length) | Description                                                 |
| ------------------- | ------------- | ----------------------------------------------------------- |
| name                | string (255)  | Name of the category                                        |
| description         | string        | Description of the category                                 |
| collapsible         | bool (10)     | If the category should be allowed to be collapsible or not. |
| rank                | int (10)      | Sort order for categories                                   |
| default\_moderators | string        |                                                             |
| default\_usergroups | string        |                                                             |
| integrated\_id      | int (10)      | Old ID for when data has been imported.                     |

## disBoard - Boards

| Fieldname            | Type (length) | Description                                                   |
| -------------------- | ------------- | ------------------------------------------------------------- |
| id                   |               |                                                               |
| category             | integer (10)  | ID of the category (disCategory) this board belongs to        |
| parent               | integer (10)  | ID of the board this board is a child off                     |
| name                 | string (255)  | Name of the board                                             |
| description          | text          | Description of the board. Can probably contain HTML.          |
| last\_post           | integer (10)  | ID of the last post in this board.                            |
| num\_topics          | integer (10)  | Number of topics that exist in this board.                    |
| num\_replies         | integer (10)  | Number of the replies that exist in this board.               |
| total\_posts         | integer (10)  | Number of posts that exist in this board.                     |
| ignorable            | boolean (10)  | Wether this board can be ignored by users or not.             |
| rank                 | integer (10)  | Sort order for boards.                                        |
| map                  | string (255)  | ??                                                            |
| minimum\_post\_level | integer (10)  | ?? all, member, moderator or administrator? 0/1/2/3?          |
| status               | integer (4)   | Status of the board (active, inactive or archived)            |
| locked               | boolean (10)  | Wether this board is locked for posts or not.                 |
| integrated\_id       | integer (10)  | ??                                                            |
| rtl                  | boolean (10)  | Wether this board should use right to left formatting or not. |

## disThread - Threads

| Fieldname      | Type (length)        | Description                                                             |
| -------------- | -------------------- | ----------------------------------------------------------------------- |
| id             |                      |                                                                         |
| class\_key     | string (120)         | The type of thread, defaults to disThreadDiscussion                     |
| board          | integer (10)         | ID of the board this thread lives in                                    |
| title          | string (255)         | Name of the board                                                       |
| post\_first    | integer (10)         | ID of the first post in the thread (also the parent for threaded posts) |
| post\_last     | integer (10)         | ID of the last post in the thread.                                      |
| post\_last\_on | integer (11)         | UNIX timestamp of when the last post was added.                         |
| author\_first  | integer (10)         | ID of the user that created the first post in the thread.               |
| author\_last   | integer (10)         | ID of the user that created the last post in the thread.                |
| replies        | integer (10)         | Amount of replies on the thread.                                        |
| views          | integer (10)         | Amount of views on the thread.                                          |
| locked         | integer (10)         | ?? Should probably be a boolean indicating a locked thread.             |
| answered       | boolean (true/false) | Wether the thread was answered                                          |
| sticky         | integer (10)         | ?? Should probably be a boolean indicating a stickied thread.           |
| private        | boolean (true/false) | Wether the thread is private or not                                     |
| users          | mediumtext           | Comma separated list of users involved in the thread.                   |
| last\_view\_ip | string (120)         | Last IP that viewed the thread                                          |
| integrated\_id | integer (10)         | ??                                                                      |
| participants   | text                 | similar to users?                                                       |

This class is extended by:

- disThreadDiscussion
- disThreadQuestion

## disPost - Posts

| Field          | Type (length) | Description                                                                                                                                                                                                           |
| -------------- | ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| board          | int           | ID of the disBoard the post is in                                                                                                                                                                                     |
| thread         | int           | ID of the disThread the post belongs to                                                                                                                                                                               |
| parent         | int           | ID of the disPost that is the parent of this object. There is always one root post with a parent of 0 which is the first post in the thread, others are threaded and usually referencing the last post on the thread. |
| title          | string (255)  | Title of the post, usually "Re: `<name of thread>`" but can be different depending on reply forms.                                                                                                                    |
| message        | string        | The posts' content.                                                                                                                                                                                                   |
| author         | int           | ID of the disUser object who authored the post.                                                                                                                                                                       |
| createdon      | int           | Unix timestamp of the time this post was created                                                                                                                                                                      |
| editedon       | int           | Unix timestampe of the time this post was edited (if it was edited, that is)                                                                                                                                          |
| editedby       | int           | ID of the disUser object who edited the post.                                                                                                                                                                         |
| icon           | string (255)  | ?? Unused                                                                                                                                                                                                             |
| allow\_replies | bool (1       | 0)                                                                                                                                                                                                                    | Does not seem to be used.                       |
| rank           | string        | Ranking order within thread.                                                                                                                                                                                          |
| ip             | string (255)  | IP of the poster                                                                                                                                                                                                      |
| integrated\_id | int           | Used for keeping IDs from imports.                                                                                                                                                                                    |
| depth          | int (10)      | Depth of the current post inside the threaded model.                                                                                                                                                                  |
| answer         | bool (1       | 0)                                                                                                                                                                                                                    | Wether this post is marked as an answer or not. |

## disPostAttachment - Attachments

| Field            | Type (length) | Description                                 |
| ---------------- | ------------- | ------------------------------------------- |
| post             | int (10)      | ID of the post this attachment was added to |
| board            | int (10)      | ID of the board the post is in              |
| filename         | string (255)  | Name and path to the file                   |
| createdon        | date          | When the attachment was added               |
| filesize         | int (10)      | Size of the attachment.. guess in bytes.    |
| downloads        | int (10)      | Amount of downloads                         |
| integrated\_id   | int (10)      | ID of the attachment if imported.           |
| integrated\_data | string        | Extra data of an attachment import          |

## disUser - Users

In sso mode this is automatically synced with your MODX users (modUser).

| Field                 | Type (length) | Description                                                                                                                                                                                  |
| --------------------- | ------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| user                  | int           | ID of the modUser account this user belongs to.                                                                                                                                              |
| username              | string (120)  | Username of the user.                                                                                                                                                                        |
| password              | string (120)  | Password of the user.                                                                                                                                                                        |
| email                 | string (200)  | Email of the user.                                                                                                                                                                           |
| ip                    | string (120)  | The IP last used to login to this account.                                                                                                                                                   |
| createdon             | date string   | The time this user was created (registered / imported)                                                                                                                                       |
| name\_first           | string (100)  | First name of the user                                                                                                                                                                       |
| name\_last            | string (100)  | Last name of the user                                                                                                                                                                        |
| gender                | string (10)   | Gender of the user                                                                                                                                                                           |
| birthdate             | date string   | The date the user was born                                                                                                                                                                   |
| website               | string (255)  | website of the user                                                                                                                                                                          |
| location              | string (255)  | Location the user lives                                                                                                                                                                      |
| status                | int (10)      | Status of the user, one of the following: 0 (INACTIVE), 1 (ACTIVE), 2 (UNCONFIRMED), 3 (BANNED), 4 (AWAITING\_MODERATION). Use the Discuss::STATUS\_NAME constants when referencing in code. |
| confirmed             | bool (1       | 0)                                                                                                                                                                                           | If the user is confirmed.                                                    |
| confirmedon           | date          | When the user was confirmed                                                                                                                                                                  |
| last\_login           | date          | When the user last logged in to the forums                                                                                                                                                   |
| last\_active          | date          | When the user was last active in the forums                                                                                                                                                  |
| ignore\_boards        | string        | Comma separated list of boards the user wants to ignore.                                                                                                                                     |
| signature             | string        | Signature of the user.                                                                                                                                                                       |
| title                 | string (255)  | Title.                                                                                                                                                                                       |
| avatar                | string        | Link to avatar                                                                                                                                                                               |
| avatar\_service       | string (255)  | Name/reference to service used for avatar (gravatar by default)                                                                                                                              |
| thread\_last\_visited | int (10)      | ID of the thread the user last visited                                                                                                                                                       |
| synced                | bool (1       | 0)                                                                                                                                                                                           | If the user was synced with the modUser table (or other custom data source). |
| syncedat              | date          | When the user was last synced                                                                                                                                                                |
| salt                  | string (255)  | user salt                                                                                                                                                                                    |
| integrated\_Id        | int (10)      | Old storage of IDs for importing                                                                                                                                                             |
| display\_name         | string (255)  | Name the user entered to be used for display                                                                                                                                                 |
| use\_display\_name    | bool (1       | 0)                                                                                                                                                                                           | If the display name needs to be used, or if the username should be shown.    |
