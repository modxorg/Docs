---
title: "xPDOValidator.addMessage"
_old_id: "1307"
_old_uri: "2.x/class-reference/xpdovalidator/xpdovalidator.addmessage"
---

## xPDOValidator::addMessage

Add a validation message to the stack.

## Syntax

API Doc: <http://api.modxcms.com/xpdo/om/xPDOValidator.html#addMessage>

``` php 
void addMessage (string $field, string $name, [mixed $message = null])
```

## Example

Do our own validation, but still use the validator object.

``` php 
$validator = $obj->getValidator();
if ($obj->get('name') == '') {
   $validator->addMessage('name','emptyName','Please enter a valid name.');
}

$errors = $validator->getMessages();
foreach ($errors as $error) {
   echo 'An error occurred with field "'.$error['name'].'": '.$error['message'];
}
```

## See Also

1. [xPDOValidator.addMessage](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.addmessage)
2. [xPDOValidator.getMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.getmessages)
3. [xPDOValidator.hasMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.hasmessages)
4. [xPDOValidator.validate](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.validate)