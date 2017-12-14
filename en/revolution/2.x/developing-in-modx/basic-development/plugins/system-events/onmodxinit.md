---
title: "OnMODXInit"
_old_id: "1732"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmodxinit"
---

Event: OnMODXInit
-----------------

 Invoked upon initialization of the MODX object.

 Service: 5 - Manager Access Events   
 Group: System




Event Parameters
----------------

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> contextKey </td> <td> The context\_key of the context being initialized </td> </tr><tr><td> options </td> <td> Any options passed to the initialize() function </td></tr></tbody></table>Remarks
-------

 <table><tbody><tr><th> Previous event </th> <td> ? </td> </tr><tr><th> Next event </th> <td> ? </td> </tr><tr><th> File </th> <td> [core/model/modx/modx.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modx.class.php) </td> </tr><tr><th> Class </th> <td> class modx </td> </tr><tr><th> Method </th> <td> public function initialize($contextKey= 'web', $options = null) </td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")