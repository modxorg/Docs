---
title: "Discuss.Controllers.home"
_old_id: "816"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.home"
---

The Home controller is the main forum overview. It contains listings of categories and boards within them, and can also contain an overview of recent posts.

<div>- [Basic Information](#Discuss.Controllers.home-BasicInformation)
- [Options](#Discuss.Controllers.home-Options)

</div>Basic Information
-----------------

<table><tbody><tr><td>Since Version</td><td>1.0</td></tr><tr><td>Controller File</td><td>controllers/web/home.class.php</td></tr><tr><td>Controller Class Name</td><td>DiscussHomeController   
</td></tr><tr><td>Controller Template</td><td>pages/home.tpl</td></tr><tr><td>Manifest Name</td><td>home</td></tr></tbody></table>Options
-------

If you don't know what the manifest is, please go back to the [Getting Started](/extras/revo/discuss/discuss.getting-started "Discuss.Getting Started") document. The options below need to go into the "board" options array of the manifest.

<table><tbody><tr><th>Key</th><th>Default</th><th>Description</th></tr><tr><td>showBoards   
</td><td>true</td><td>Choose if you want to see boards or not... you'll probably want this :) Gets set to the \[\[+boards\]\] placeholder.</td></tr><tr><td>showRecentPosts   
</td><td>false</td><td>Enable if you want to get recent posts in the \[\[+recent\_posts\]\] placeholder. Uses the postTpl (default=post/disThreadLi) chunk for each post.</td></tr><tr><td>showLogoutActionButton   
</td><td>false</td><td>If enabled sets a \[\[+discuss.authLink\]\] placeholder (including <a> tag) to log the user out. The \[\[+discuss.authLink\]\] placeholder is available by default for login.</td></tr><tr><td>showLoginForm   
</td><td>false</td><td>If enabled sets a \[\[+discuss.loginForm\]\] placeholder with the contents of the dislogin chunk.</td></tr><tr><td>hideIndexBreadcrumbs   
</td><td>false</td><td>If enabled, the breadcrumbs will be hidden on the homepage.</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td>**Recent Posts**</td></tr><tr><td>postTpl</td><td>post/disThreadLi   
</td><td>Chunk used for each individual post.</td></tr><tr><td>limit</td><td>10</td><td>Amount of recent posts to view.</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td>**Boards**</td></tr><tr><td>lastPostTpl   
</td><td>board/disLastPostBy   
</td><td>Fills the \[\[+lastPost\]\] placeholder. Available placeholders:   
- createdon   
- user (disUser ID)   
- username   
- thread (ID)   
- id (last post ID)   
- url (URL to the last post0   
- author\_link</td></tr><tr><td> </td><td> </td><td>rray(   
 'createdon' => strftime($modx->getOption('discuss.date\_format'),strtotime($board\['last\_post\_createdon'\])),   
 'user' => $board\['last\_post\_author'\],   
 'username' => $username,   
 'thread' => $board\['last\_post\_thread'\],   
 'id' => $board\['last\_post\_id'\],   
 'url' => $board\['last\_post\_url'\],   
 'author\_link' => $canViewProfiles ? '<a href="'.$discuss->request->makeUrl('u/'.$board\['last\_post\_username'\]).'">'.$username.'</a>' : $username,   
 );   
</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td> </td><td> </td><td> </td></tr></tbody></table>a

rray(

 'createdon' => strftime($modx->getOption('discuss.date\_format'),strtotime($board\['last\_post\_createdon'\])),

 'user' => $board\['last\_post\_author'\],

 'username' => $username,

 'thread' => $board\['last\_post\_thread'\],

 'id' => $board\['last\_post\_id'\],

 'url' => $board\['last\_post\_url'\],

 'author\_link' => $canViewProfiles ? '<a class="dis-last-post-by" href="'.$discuss->request->makeUrl('u/'.$board\['last\_post\_username'\]).'">'.$username.'</a>' : $username,

 );