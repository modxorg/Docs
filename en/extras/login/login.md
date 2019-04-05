---
title: "Login"
_old_id: "907"
_old_uri: "revo/login/login.login"
---

- [What is Login?](#Login.Login-WhatisLogin%3F)
- [Usage](#Login.Login-Usage)
- [Properties](#Login.Login-Properties)
- [Optional Properties (non Login)](#Login.Login-OptionalProperties%28nonLogin%29)
  - [tplType Options](#Login.Login-tplTypeOptions)
- [Using reCaptcha](#Login.Login-UsingreCaptcha)
- [Logout](#Login.Login-Logout)
- [See Also](#Login.Login-SeeAlso)



##  What is Login? 

 This component loads a simple login and logout form, and processes User authentication.

##  Usage 

 Example for Login:

 ``` php 
[[!Login]]

```

 You can also specify the template, however make sure to call the &tplType parameter also:

 ``` php 
[[!Login? &tplType=`modChunk` &loginTpl=`myLoginChunk`]]

```

 See the snippet properties for more options.

##  Properties 

 Login comes with some configuration properties you can set to adjust the way Login behaves.

 | Name | Description | Default |
|------|-------------|---------|
| actionKey | The REQUEST variable that indicates what action to take. Defaults to 'service'. This is useful to change if you're already using the 'service' REQUEST variable in your website. | service |
| loginKey | The login action key. Defaults to 'login'. This tells Login to fire only if the _actionKey_ property is set to this value. For example, if _actionKey_ is set to 'service', and this is set to 'login', then the login processor will only fire if the request '&service=login' is found. | login |
| logoutKey | The logout action key. Defaults to 'logout'. This tells Login to fire only if the _actionKey_ property is set to this value. For example, if _actionKey_ is set to 'service', and this is set to 'logout', then the logout processor will only fire if the request '&service=logout' is found. | logout |
| loginViaEmail | (1.9.4-pl+) Accept logins either via username (from modUser) or email address (from modUserProfile). Built in protection: If an email address exists more than once, the corresponding users can't login via email address! | false |
| rememberMeKey | Optional. The field name of the Remember Me toggle to preserve login state. Defaults to "rememberme". | rememberme |
| tplType | The type of tpls being provided by _loginTpl_ or _logoutTpl_. See the section below for the possible values. | inline |
| loginTpl | The login form tpl. May be the type specified by the _tplType_ property. | lgnLoginTpl |
| logoutTpl | The logout form tpl. May be the type specified by the _tplType_ property | lgnLogoutTpl |
| errTpl | The error message tpl. May be the type specified by the _errTplType_ property. | lgnErrTpl |
| errTplType | The type of tpls being provided by _errTpl_. | modChunk |
| loginResourceId | The resource to direct users to on successful login. 0 will redirect to self. Leave out if using the default unauthorized page. | 0 |
| loginResourceParams | A JSON object of parameters to append to the login redirection URL. Ex: {"test":123} translates to url.html?test=123 |  |
| logoutResourceId | Resource ID to redirect to on successful logout. 0 will redirect to self. | 0 |
| logoutResourceParams | A JSON object of parameters to append to the logout redirection URL. Ex: {"test":123} translates to url.html?test=123 |  |
| loginMsg | Optional label message for login action. If blank, will default to lexicon string for Login. |  |
| logoutMsg | Optional label message for logout action. If blank, will default to lexicon string for Logout. |  |
| redirectToPrior | If true, will redirect to the referring page (HTTP\_REFERER) on successful login. | 0 |
| contexts | (Experimental) A comma-separated list of contexts to log in to. Defaults to the current context if not explicitly set. |  |
| preHooks | A comma-separated list of 'hooks', or Snippets, that will be executed before the user is registered but after validation. Also can specify 'recaptcha' as a hook. |  |
| postHooks | A comma-separated list of 'hooks', or Snippets, that will be executed after the user is registered. |  |
| toPlaceholder | If set, will set the output of the login snippet to a placeholder of this name rather than directly outputting the return contents. |  |
| redirectToOnFailedAuth | (1.6.4-pl+) redirects to a separate page on failed logins |  |

### 

 <a id="Login.Login-optionalProperties" name="Login.Login-optionalProperties"></a>

##  Optional Properties (non Login) 

 Helpful parameters which can facilitate Login.

 | Name | Description | Default |
|------|-------------|---------|
| recaptchaHeight | Can be used to modify the ReCaptcha iframe Height attribute size. | 300 |
| recaptchaTheme | Can be used to modify the ReCaptcha theme to 'red', 'white', 'blackglass', 'clean', or others as they are introduced by Google. | clean |
| recaptchaWidth | Can be used to modify the ReCaptcha iframe Width attribute size. | 500 |

###  tplType Options 

 The tplType and errTplType properties have a list of different options to choose from. This can be:

- _modChunk_ - The tpl provided must be the name of a chunk.
- _file_ - Must be an absolute path to the tpl file.
- _inline_ - The content of the tpl will be directly in the tpl property itself.
- _embedded_ - The tpl is already in the page; just make the error properties be placeholders.

##  Using reCaptcha 

 First off, make sure your `recaptcha.public\_key` and `recaptcha.private\_key` System Settings are set with your reCaptcha API keys. Then, to add it, all you have to do is add the "recaptcha" preHook to your snippet call:

 ``` php 
[[!Login? &preHooks=`recaptcha`]]

```

 And make sure that the \[\[+login.recaptcha\_html\]\] placeholder is in your loginTpl chunk. This will make reCaptcha be required for login.

 See [See Optional Properties for ReCaptcha specific settings](#Login.Login-optionalProperties)

##  Logout 

 How do I log out? You simply call the page containing your **Login** snippet call and pass specify 'logout' as the service via the URL. In this example, the Login snippet is contained on page 21:

 ``` php 
<a href="[[~21? &service=logout]]" title="Logout">Logout</a>
(which automatically appends '&service=logout' to your URL)

```

##  See Also 

1. [Login.Login](/extras/revo/login/login.login)
2. [Login.Profile](/extras/revo/login/login.profile)
3. [Login.UpdateProfile](/extras/revo/login/login.updateprofile)
4. [Login.Register](/extras/revo/login/login.register)
  1. [Register.Example Form 1](/extras/revo/login/login.register/register.example-form-1)
5. [Login.ConfirmRegister](/extras/revo/login/login.confirmregister)
6. [Login.ForgotPassword](/extras/revo/login/login.forgotpassword)
7. [Login.ResetPassword](/extras/revo/login/login.resetpassword)
8. [Login.ChangePassword](/extras/revo/login/login.changepassword)
9. [Login.Tutorials](/extras/revo/login/login.tutorials)
  1. [Login.Basic Setup](/extras/revo/login/login.tutorials/login.basic-setup)
  2. [Login.Extended User Profiles](/extras/revo/login/login.tutorials/login.extended-user-profiles)
  3. [Login.Request Membership](/extras/revo/login/login.tutorials/login.request-membership)
  4. [Login.User Profiles](/extras/revo/login/login.tutorials/login.user-profiles)
  5. [Login.Using Custom Fields](/extras/revo/login/login.tutorials/login.using-custom-fields)
  6. [Login.Using Pre and Post Hooks](/extras/revo/login/login.tutorials/login.using-pre-and-post-hooks)
10. [Login.Roadmap](/extras/revo/login/login.roadmap)

 See also the documentation on [Making Member-Only Pages](administering-your-site/security/security-tutorials/making-member-only-pages "Making Member-Only Pages")

 I have made a second context for a login part.. setupped all necessary things like rights etc.

 I want to have the homepage secured, so bind it to the resource group and in my context I set the "unauthorized\_page" to the ID of the resource where the login is located. This doesn't work!! Because the homepage is the "site\_start" I think, this one can't be secured (as I think)... What I find out is that I get a 404 header response I added "error\_page" setting with the same ID of the unauthorized page and now it works like a charm.

 Besides that, I use a plugin to switch context based on the http\_host. Because of this, on the submit Login thinks we're on "web" and don't logs in the user. I need to add &contexts=`web,login` to get that working too..

 At the end it all works, but thought I can share this with others ;-)