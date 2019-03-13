---
title: "Administrator Policy"
_old_id: "218"
_old_uri: "2.x/administering-your-site/security/policies/permissions/permissions-administrator-policy"
---

## The Administrator Policy

This policy is packaged into MODx and is given to users on the 'mgr' context who want to have full access to managing MODx content.

## Default Permissions

| Name                        | Description of Access                                                                                                                                    |
| --------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- |
| about                       | The About page.                                                                                                                                          |
| access\_permissions         | Any Access Permission-related pages and actions.                                                                                                         |
| action\_ok                  |
| actions                     | The [Actions](developing-in-modx/advanced-development/custom-manager-pages/actions-and-menus "Actions and Menus") page.                                  |
| change\_password            | User can change their user password.                                                                                                                     |
| change\_profile             | User can change their profile.                                                                                                                           |
| content\_types              | The [Content Types](making-sites-with-modx/structuring-your-site/resources/content-types "Content Types") page.                                          |
| create                      | Basic "create" access on objects.                                                                                                                        |
| credits                     | View the Credits page.                                                                                                                                   |
| customize\_forms            | View and manage the [Customizing the Manager](administering-your-site/customizing-the-manager "Customizing the Manager") page.                           |
| database                    | The System Info page                                                                                                                                     |
| database\_truncate          | The ability to truncate a database table.                                                                                                                |
| delete\_category            | To delete or remove any Categories.                                                                                                                      |
| delete\_chunk               | To delete or remove any [Chunks](making-sites-with-modx/structuring-your-site/chunks "Chunks").                                                          |
| delete\_context             | To delete or remove any [Contexts](administering-your-site/contexts "Contexts").                                                                         |
| delete\_document            | To delete or remove any [Resources](making-sites-with-modx/structuring-your-site/resources "Resources").                                                 |
| delete\_eventlog            | To empty the Event Log.                                                                                                                                  |
| delete\_plugin              | To delete or remove any [Plugins](developing-in-modx/basic-development/plugins "Plugins").                                                               |
| delete\_snippet             | To delete or remove any [Snippets](developing-in-modx/basic-development/snippets "Snippets").                                                            |
| delete\_template            | To delete or remove any [Templates](making-sites-with-modx/structuring-your-site/templates "Templates").                                                 |
| delete\_tv                  | To delete or remove any [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables").                        |
| delete\_role                | To delete or remove any [Roles](administering-your-site/security/roles "Roles").                                                                         |
| delete\_user                | To delete or remove any [Users](administering-your-site/security/users "Users").                                                                         |
| edit\_category              | To edit any Categories.                                                                                                                                  |
| edit\_chunk                 | To edit any [Chunks](making-sites-with-modx/structuring-your-site/chunks "Chunks").                                                                      |
| edit\_context               | To edit any [Contexts](administering-your-site/contexts "Contexts").                                                                                     |
| edit\_document              | To edit any [Resources](making-sites-with-modx/structuring-your-site/resources "Resources").                                                             |
| edit\_locked                | Allows a user to override a lock and edit a locked Resource.                                                                                             |
| edit\_parser                |
| edit\_plugin                | To edit any [Plugins](developing-in-modx/basic-development/plugins "Plugins").                                                                           |
| edit\_role                  | To edit any [Roles](administering-your-site/security/roles "Roles").                                                                                     |
| edit\_snippet               | To edit any [Snippets](developing-in-modx/basic-development/snippets "Snippets").                                                                        |
| edit\_template              | To edit any [Templates](making-sites-with-modx/structuring-your-site/templates "Templates").                                                             |
| edit\_tv                    | To edit any [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables").                                    |
| edit\_user                  | To edit any [User](administering-your-site/security/users "Users").                                                                                      |
| element\_tree               | The ability to view the Elements Tree on the left nav.                                                                                                   |
| empty\_cache                | To empty the site cache.                                                                                                                                 |
| export\_static              | To export the site to static HTML.                                                                                                                       |
| file\_manager               | To use the file manager, including creating/deleting files.                                                                                              |
| file\_tree                  | To view the Files Tree on the left nav.                                                                                                                  |
| flush\_sessions             | Can flush Sessions across the site.                                                                                                                      |
| frames                      | To use the MODx Manager UI at all.                                                                                                                       |
| help                        | To view the Help page.                                                                                                                                   |
| home                        | To view the Welcome page.                                                                                                                                |
| import\_static              | To view or use the Import pages.                                                                                                                         |
| languages                   | To edit or view Lexicon Languages.                                                                                                                       |
| lexicons                    | To edit or view Lexicons and [Internationalization](developing-in-modx/advanced-development/internationalization "Internationalization").                |
| list                        | Basic permission to "list" any object. List means to get a collection of objects.                                                                        |
| load                        | Basic permission to "load" any object, or be able to return it as an instance at all.                                                                    |
| logout                      | To be able to logout as a user.                                                                                                                          |
| logs                        | To view the logs, such as error and manager logs.                                                                                                        |
| menus                       | To edit or save any top Menu items.                                                                                                                      |
| messages                    | To send or view any personal Messages.                                                                                                                   |
| namespaces                  | To edit or view [Namespaces](developing-in-modx/advanced-development/namespaces "Namespaces").                                                           |
| new\_category               | To create a new Category.                                                                                                                                |
| new\_chunk                  | To create a new [Chunk](making-sites-with-modx/structuring-your-site/chunks "Chunks").                                                                   |
| new\_context                | To create a new [Context](administering-your-site/contexts "Contexts").                                                                                  |
| new\_document               | To create a new [Resources](making-sites-with-modx/structuring-your-site/resources "Resources").                                                         |
| new\_plugin                 | To create a new [Plugin](developing-in-modx/basic-development/plugins "Plugins").                                                                        |
| new\_role                   | To create a new [Role](administering-your-site/security/roles "Roles").                                                                                  |
| new\_snippet                | To create a new [Snippet](developing-in-modx/basic-development/snippets "Snippets").                                                                     |
| new\_template               | To create a new [Template](making-sites-with-modx/structuring-your-site/templates "Templates").                                                          |
| new\_tv                     | To create a new [Template Variable](making-sites-with-modx/customizing-content/template-variables "Template Variables").                                 |
| new\_user                   | To create a new [User](administering-your-site/security/users "Users").                                                                                  |
| packages                    | To use any Transport Packages in the [Package Management](developing-in-modx/advanced-development/package-management "Package Management") system.       |
| property\_sets              | To view and edit [Properties and Property Sets](making-sites-with-modx/customizing-content/properties-and-property-sets "Properties and Property Sets"). |
| providers                   | To view and edit [Providers](developing-in-modx/advanced-development/package-management/providers "Providers") across the site.                          |
| publish\_document           | To publish or unpublish any Resource.                                                                                                                    |
| purge\_deleted              | To empty the Recycle Bin.                                                                                                                                |
| remove                      | Basic permission to remove any object.                                                                                                                   |
| remove\_locks               | To remove all existing Locks throughout the site.                                                                                                        |
| resource\_tree              | To view the Resource Tree in the left nav.                                                                                                               |
| save                        | Basic save permission for any object.                                                                                                                    |
| save\_category              | To save any Categories.                                                                                                                                  |
| save\_chunk                 | To save any [Chunks](making-sites-with-modx/structuring-your-site/chunks "Chunks").                                                                      |
| save\_context               | To save any [Contexts](administering-your-site/contexts "Contexts").                                                                                     |
| save\_document              | To save any [Resources](making-sites-with-modx/structuring-your-site/resources "Resources").                                                             |
| save\_plugin                | To save any [Plugins](developing-in-modx/basic-development/plugins "Plugins").                                                                           |
| save\_role                  | To save any [Roles](administering-your-site/security/roles "Roles").                                                                                     |
| save\_snippet               | To save any [Snippets](developing-in-modx/basic-development/snippets "Snippets").                                                                        |
| save\_template              | To save any [Templates](making-sites-with-modx/structuring-your-site/templates "Templates").                                                             |
| save\_tv                    | To save any [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables").                                    |
| save\_user                  | To save any [User](administering-your-site/security/users "Users").                                                                                      |
| search                      | To use the Search page.                                                                                                                                  |
| settings                    | To view and edit any System Settings.                                                                                                                    |
| steal\_locks                | To "steal" locks, overriding a current lock on a document.                                                                                               |
| unlock\_element\_properties | To be able to edit the default properties for any Element.                                                                                               |
| view                        | Basic permission to "view" any object.                                                                                                                   |
| view\_category              | To view any Categories.                                                                                                                                  |
| view\_chunk                 | To view any [Chunks](making-sites-with-modx/structuring-your-site/chunks "Chunks").                                                                      |
| view\_context               | To view any [Contexts](administering-your-site/contexts "Contexts").                                                                                     |
| view\_document              | To view any [Resources](making-sites-with-modx/structuring-your-site/resources "Resources").                                                             |
| view\_eventlog              | To view the Event Log.                                                                                                                                   |
| view\_offline               |
| view\_plugin                | To view any [Plugins](developing-in-modx/basic-development/plugins "Plugins").                                                                           |
| view\_role                  | To view any [Roles](administering-your-site/security/roles "Roles").                                                                                     |
| view\_snippet               | To view any [Snippets](developing-in-modx/basic-development/snippets "Snippets").                                                                        |
| view\_template              | To view any [Templates](making-sites-with-modx/structuring-your-site/templates "Templates").                                                             |
| view\_tv                    | To view any [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables").                                    |
| view\_unpublished           | To view any unpublished [Resources](making-sites-with-modx/structuring-your-site/resources "Resources").                                                 |
| view\_user                  | To view any [User](administering-your-site/security/users "Users").                                                                                      |
| workspaces                  | To utilize [Package Management](developing-in-modx/advanced-development/package-management "Package Management").                                        |

## Custom Permissions

If you have created your own actions and menu items (e.g. if you have created a [Custom Manager Page](developing-in-modx/advanced-development/custom-manager-pages/custom-manager-pages-tutorial "Custom Manager Pages Tutorial")), then you can define custom permission items when you create the menu item (System --> Actions --> Create Menu) that correspond to permissions listed here.

![](/download/attachments/18678342/MODX+Custom+Permission.jpg?version=1&modificationDate=1331314961000)

## See Also

1. [Permissions - Administrator Policy](administering-your-site/security/policies/permissions/permissions-administrator-policy)
2. [Permissions - Resource Policy](administering-your-site/security/policies/permissions/permissions-resource-policy)
