---
title: "Summary of Legacy Code Removed in 2.1"
_old_id: "1120"
_old_uri: "2.x/developing-in-modx/other-development-resources/summary-of-legacy-code-removed-in-2.1"
---

<div>- [Functionality](#SummaryofLegacyCodeRemovedin2.1-Functionality)
  - [TV Input Types](#SummaryofLegacyCodeRemovedin2.1-TVInputTypes)
- [Methods, Constants and Variables](#SummaryofLegacyCodeRemovedin2.1-Methods%2CConstantsandVariables)

</div><div class="note">**In progress**  
</div>Functionality
-------------

### TV Input Types

The following input types were removed:

- htmlarea, dropdown (use listbox), textareamini

Methods, Constants and Variables
--------------------------------

Many constants, variables and api methods have been long deprecated, marked for removal in 2.0 or 2.1 and are now finally removed from the MODX Revolution 2.1 codebase.

<table><tbody><tr><th>Item Removed</th><th>Notes on Replacement or Potential Workaround</th></tr><tr><td>IN\_PARSER\_MODE</td><td>check context is not mgr</td></tr><tr><td>IN\_MANAGER\_MODE</td><td>check context is mgr</td></tr><tr><td>IN\_MANAGER\_MODE</td><td>check context is mgr</td></tr><tr><td> </td></tr><tr><td>```

$_SESSION["mgrValidated"]

```</td><td>modX->user->isAuthenticated('mgr')</td></tr><tr><td>```

$_SESSION["webValidated"]

```</td><td>modX->user->isAuthenticated('web')</td></tr><tr><td>```

$_SESSION["mgrInternalKey"]

```</td><td>modX->user->get('id') when modX->user->isAuthenticated('mgr')</td></tr><tr><td>```

$_SESSION["webInternalKey"]

```</td><td>modX->user->get('id') when modX->user->isAuthenticated('web')</td></tr><tr><td>```

$_SESSION["mgrShortname"]

```</td><td>modX->user->get('username') when modX->user->isAuthenticated('mgr')</td></tr><tr><td>```

$_SESSION["webShortname"]

```</td><td>modX->user->get('username') when modX->user->isAuthenticated('web')</td></tr><tr><td> </td></tr><tr><td>DBAPI: modX->db</td></tr><tr><td>modX->db->config</td><td>[modX->getOption()](/xpdo/2.x/class-reference/xpdoobject/configuration-accessors/getoption "getOption")</td></tr><tr><td>modX->db->connect()</td><td>modX automatically connects to MODX database. If you're looking to set up another connection, you could instantiate xPDO again.</td></tr><tr><td>modX->db->disconnect()</td></tr><tr><td>modX->db->escape($s)</td><td>modX->quote()</td></tr><tr><td>modX->db->query($sql)</td><td>modX->query() or modX->execute($criteria) see manual for PDO query</td></tr><tr><td>modX->db->delete($from, $where= "",$fields='')</td><td>see modX->query()</td></tr><tr><td>modX->db->select($fields= "\*", $from= "", $where= "", $orderby= "", $limit= "")</td><td>see modX->query()</td></tr><tr><td>modX->db->update($fields, $table, $where= "")</td><td>see modX->query()</td></tr><tr><td>modX->db->insert($fields, $intotable, $fromfields= "\*", $fromtable= "", $where= "", $limit= "")</td><td>see modX->query()</td></tr><tr><td>modX->db->exec($sql)</td><td>see modX->execute($criteria)</td></tr><tr><td>modX->db->getInsertId()</td><td>see modX->lastInsertId()</td></tr><tr><td>modX->db->getAffectedRows()</td><td>see modX->getCount() or xPDOCriteria->stmt->rowCount()</td></tr><tr><td>modX->db->getLastError()</td><td>see xPDOCriteria->stmt->errorCode or xPDOCriteria->stmt->errorInfo</td></tr><tr><td>modX->db->getRecordCount($ds)</td><td>modX->getCount($className, $criteria= null)</td></tr><tr><td>modX->db->getRow($ds, $mode= 'assoc')</td><td>see xPDOCriteria->stmt->fetch()</td></tr><tr><td>modX->db->getColumn($name, $dsq)</td><td>see xPDOCriteria->stmt->fetchColumn()</td></tr><tr><td>modX->db->getColumnNames($dsq)</td><td>see modX->getFields($className) (note: not exactly the same .. gives you column names for a specific class)</td></tr><tr><td>modX->db->getValue($dsq)</td><td>see xPDOCriteria->stmt->fetchColumn()</td></tr><tr><td>modX->db->getXML($dsq)</td><td>no direct analog</td></tr><tr><td>modX->db->getTableMetaData($table)</td><td>modX->map property</td></tr><tr><td>modX->db->prepareDate($timestamp, $fieldType= 'DATETIME')</td><td>php to sql conversion of datetypes are handled automatically in the modX model (or a custom xPDO model)</td></tr><tr><td>modX->db->getHTMLGrid($dsq, $params)</td><td>no direct analog</td></tr><tr><td>modX->db->makeArray($rs= '')</td><td>see xPDOCriteria->stmt->fetch()</td></tr><tr><td>modX->getFullTableName()</td><td>modX->getTableName($className, $includeDb=false)   
or modX->escape($customTableName)</td></tr><tr><td>modX->dbConfig</td><td>modX->getOption() (NOTE: some of the configuration keys are different, i.e. dbuser = username, dbpass = password, dbase = dbname)</td></tr><tr><td> </td></tr><tr><td>modX->putChunk()</td><td>modX->getChunk()</td></tr><tr><td>modX->isFrontend()</td><td>modX->context->get('key') == 'web' or other front-end context</td></tr><tr><td>modX->isBackend()</td><td>modX->context->get('key') == 'mgr'</td></tr><tr><td>modX->getSettings()</td><td>modX->config after $modx->getConfig()</td></tr><tr><td>modX->getDocumentObject($method, $identifier)</td><td>not public API method; no replacement (see modRequest->getResource())</td></tr><tr><td>modX->isMemberOfWebGroup()</td><td>modX->user->isMember or modUser->isMember</td></tr><tr><td>modX->getDocument</td><td>modX->getObject('modResource', $criteria)</td></tr><tr><td>modX->getDocuments</td><td>modX->getCollection('modResource', $criteria)   
or modX->getIterator('modResource', $criteria)</td></tr><tr><td>modX->getAllChildren()</td><td>modX->getCollection('modResource', $criteria) , $criteria having where condition 'parent' = $id</td></tr><tr><td>modX->getActiveChildren()</td><td>modX->getCollection('modResource', $criteria) , $criteria having where conditions 'parent' = $id, 'published' = 1, 'deleted' = 0</td></tr><tr><td>modX->getDocumentChildren()</td><td>as above, modX->getCollection('modResource', $criteria) with specific criteria</td></tr><tr><td>modX->getDocumentChildrenTVars()</td><td>- to get document child resources and their TVs all at once:
- modResource->getMany('Children') and iterate the children and you can modResource->getTVValue()
- or to get TVs of any modResource object, modResource->getTemplateVars()
- or get a modTemplateVar with modX->getObject('modTemplateVar', array('name' => $tvName)) and then modTemplateVar->getValue($resourceId)/renderOutput($resourceId)

</td></tr><tr><td>modX->getTemplateVar()</td><td>modX->getObject('modTemplateVar', $criteria)</td></tr><tr><td>modX->getTemplateVars()</td><td>modX->getCollection('modTemplateVar', $criteria)</td></tr><tr><td>modX->getTemplateVarOutput()</td><td>use modTemplateVar->renderOutput() on a collection of modTemplateVar objects</td></tr><tr><td>modX->getParent()</td><td>modX->getObject('modResource', $modx->resource->get('parent')) or pass in additional criteria as needed</td></tr><tr><td>modX->getPageInfo()</td><td>modX->getObject('modResource', $criteria)</td></tr><tr><td>modX->getUserInfo()</td><td>$user= $this->getObjectGraph('modUser', '{"Profile":{}}', $uid, true)   
access fields of modUser and fields of related modUserProfile</td></tr><tr><td>modX->getWebUserInfo()</td><td>as above</td></tr><tr><td>modX->changeWebUserPassword()</td><td>modUser->changePassword()</td></tr><tr><td>modX->changePassword()</td><td>modUser->changePassword()</td></tr><tr><td>modX->cleanDocumentIdentifier()</td><td>modRequest->\_cleanResourceIdentifier(), but is not a public API method (DO NOT USE)</td></tr><tr><td>modX->getDocumentIdentifier()</td><td>modRequest->getResourceIdentifier()</td></tr><tr><td>modX->getDocumentMethod()</td><td>modRequest->getResourceMethod()</td></tr><tr><td>modX->checkPreview()</td><td>not valid anymore, removing for 2.1.0-rc1</td></tr><tr><td>modX->getManagerPath()</td><td>Use modX->getOption('manager\_url', null, MODX\_MANAGER\_URL)</td></tr><tr><td>modX->mergeDocumentContent()</td><td>see modParser->processElementTags()</td></tr><tr><td>modX->mergeSettingsContent()</td><td>see modParser->processElementTags()</td></tr><tr><td>modX->mergeChunkContent()</td><td>see modParser->processElementTags()</td></tr><tr><td>modX->mergePlaceholderContent()</td><td>see modParser->processElementTags()</td></tr><tr><td> </td></tr><tr><td>modX->documentObject</td><td>access via modX->resource->get($field) or modX->resource->$field directly for raw data</td></tr><tr><td>modX->documentIdentifier</td><td>modX->resourceIdentifier</td></tr><tr><td>modX->documentMethod</td><td>modX->resourceMethod</td></tr><tr><td>modX->documentContent</td><td>modX->resource->getContent()</td></tr><tr><td>modX->documentGenerated</td><td>modX->resourceGenerated</td></tr><tr><td>modX->dumpSQL</td><td>see xPDOQuery->toSQL() (after xPDOQuery->prepare())</td></tr><tr><td> </td></tr><tr><td>modKeyword classes and related code</td><td>gone from framework, to be implemented more efficiently as developer sees fit</td></tr><tr><td>modMetatag classes and related code</td><td>gone from framework, to be implemented more efficiently as developer sees fit</td></tr><tr><td> </td></tr><tr><td>modElement->toPlaceholders()</td><td>modX->toPlaceholders()</td></tr><tr><td> </td></tr><tr><td>modManagerUser and related classes and code</td><td>see modUser</td></tr><tr><td>modUserRole class and related code</td><td>see Revo abac permissions</td></tr><tr><td>modWebUser and related classes and code</td><td>see modUser</td></tr><tr><td> </td></tr><tr><td>modEventLog class and modX->logEvent()</td><td>see modX->log()</td></tr><tr><td>modLexiconFocus/Topic/Language and related classes and code</td><td>see modLexicon and modLexiconEntry</td></tr><tr><td> </td></tr><tr><td>modX->executeProcessor()</td><td>see modX->runProcessor()</td></tr><tr><td> </td></tr><tr><td>modTemplate->getTVs()</td><td>modTemplate->getTemplateVars()</td></tr></tbody></table>