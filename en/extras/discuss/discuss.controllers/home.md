---
title: "home"
_old_id: "816"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.home"
---

The Home controller is the main forum overview. It contains listings of categories and boards within them, and can also contain an overview of recent posts.

## Basic Information

| Since Version         | 1.0                            |
| --------------------- | ------------------------------ |
| Controller File       | controllers/web/home.class.php |
| Controller Class Name | DiscussHomeController          |
| Controller Template   | pages/home.tpl                 |
| Manifest Name         | home                           |

## Options

If you don't know what the manifest is, please go back to the [Getting Started](/extras/discuss/discuss.getting-started "Discuss.Getting Started") document. The options below need to go into the "board" options array of the manifest.

| Key                    | Default             | Description                                                                                                                                                                   |
| ---------------------- | ------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| showBoards             | true                | Choose if you want to see boards or not... you'll probably want this :) Gets set to the \[\[+boards\]\] placeholder.                                                          |
| showRecentPosts        | false               | Enable if you want to get recent posts in the \[\[+recent\_posts\]\] placeholder. Uses the postTpl (default=post/disThreadLi) chunk for each post.                            |
| showLogoutActionButton | false               | If enabled sets a \[\[+discuss.authLink\]\] placeholder (including <a> tag) to log the user out. The \[\[+discuss.authLink\]\] placeholder is available by default for login. |
| showLoginForm          | false               | If enabled sets a \[\[+discuss.loginForm\]\] placeholder with the contents of the dislogin chunk.                                                                             |
| hideIndexBreadcrumbs   | false               | If enabled, the breadcrumbs will be hidden on the homepage.                                                                                                                   |
|                        |                     |                                                                                                                                                                               |
|                        |                     | **Recent Posts**                                                                                                                                                              |
| postTpl                | post/disThreadLi    | Chunk used for each individual post.                                                                                                                                          |
| limit                  | 10                  | Amount of recent posts to view.                                                                                                                                               |
|                        |                     |                                                                                                                                                                               |
|                        |                     | **Boards**                                                                                                                                                                    |
| lastPostTpl            | board/disLastPostBy | Fills the \[\[+lastPost\]\] placeholder. Available placeholders:                                                                                                              |
- createdon 
- user (disUser ID) 
- username 
- thread (ID) 
- id (last post ID) 
- url (URL to the last post0 
- author\_link |
|  |  | rray( 
 'createdon' => strftime($modx->getOption('discuss.date\_format'),strtotime($board\['last\_post\_createdon'\])), 
 'user' => $board\['last\_post\_author'\], 
 'username' => $username, 
 'thread' => $board\['last\_post\_thread'\], 
 'id' => $board\['last\_post\_id'\], 
 'url' => $board\['last\_post\_url'\], 
 'author\_link' => $canViewProfiles ? '<a href="'.$discuss->request->makeUrl('u/'.$board\['last\_post\_username'\]).'">'.$username.'</a>' : $username, 
 ); |
|  |  |  |
|  |  |  |
|  |  |  |
|  |  |  |
|  |  |  |
|  |  |  |

a

rray(

 'createdon' => strftime($modx->getOption('discuss.date\_format'),strtotime($board\['last\_post\_createdon'\])),

 'user' => $board\['last\_post\_author'\],

 'username' => $username,

 'thread' => $board\['last\_post\_thread'\],

 'id' => $board\['last\_post\_id'\],

 'url' => $board\['last\_post\_url'\],

 'author\_link' => $canViewProfiles ? '<a class="dis-last-post-by" href="'.$discuss->request->makeUrl('u/'.$board\['last\_post\_username'\]).'">'.$username.'</a>' : $username,

 );