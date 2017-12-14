---
title: "xPDOValidator.addMessage"
_old_id: "1307"
_old_uri: "2.x/class-reference/xpdovalidator/xpdovalidator.addmessage"
---

xPDOValidator::addMessage
-------------------------

Add a validation message to the stack.

Syntax
------

API Doc: <http://api.modxcms.com/xpdo/om/xPDOValidator.html#addMessage>

```
<pre class="brush: php">
void addMessage (string $field, string $name, [mixed $message = null])

```Example
-------

Do our own validation, but still use the validator object.

```
<pre class="brush: php">
$validator = $obj->getValidator();
if ($obj->get('name') == '') {
   $validator->addMessage('name','emptyName','Please enter a valid name.');
}

$errors = $validator->getMessages();
foreach ($errors as $error) {
   echo 'An error occurred with field "'.$error['name'].'": '.$error['message'];
}

```See Also
--------

1. [xPDOValidator.addMessage](/xpdo/2.x/class-reference/xpdovalidator/xpdovalidator.addmessage)
2. [xPDOValidator.getMessages](/xpdo/2.x/class-reference/xpdovalidator/xpdovalidator.getmessages)
3. [xPDOValidator.hasMessages](/xpdo/2.x/class-reference/xpdovalidator/xpdovalidator.hasmessages)
4. [xPDOValidator.validate](/xpdo/2.x/class-reference/xpdovalidator/xpdovalidator.validate)