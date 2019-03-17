---
title: "Legacy removed in 2.1"
_old_id: "1120"
_old_uri: "2.x/developing-in-modx/other-development-resources/summary-of-legacy-code-removed-in-2.1"
---

- [Functionality](#functionality)
  - [TV Input Types](#tv-input-types)
- [Methods, Constants and Variables](#methods-constants-and-variables)



**In progress**


## Functionality

### TV Input Types

The following input types were removed:

- htmlarea, dropdown (use listbox), textareamini

## Methods, Constants and Variables

Many constants, variables and api methods have been long deprecated, marked for removal in 2.0 or 2.1 and are now finally removed from the MODX Revolution 2.1 codebase.

| Item Removed      | Notes on Replacement or Potential Workaround |
| ----------------- | -------------------------------------------- |
| IN\_PARSER\_MODE  | check context is not mgr                     |
| IN\_MANAGER\_MODE | check context is mgr                         |
| IN\_MANAGER\_MODE | check context is mgr                         |
|                   |
| ```               |
$_SESSION["mgrValidated"]
``` | modX->user->isAuthenticated('mgr') |
| ```
$_SESSION["webValidated"]
``` | modX->user->isAuthenticated('web') |
| ```
$_SESSION["mgrInternalKey"]
``` | modX->user->get('id') when modX->user->isAuthenticated('mgr') |
| ```
$_SESSION["webInternalKey"]
``` | modX->user->get('id') when modX->user->isAuthenticated('web') |
| ```
$_SESSION["mgrShortname"]
``` | modX->user->get('username') when modX->user->isAuthenticated('mgr') |
| ```
$_SESSION["webShortname"]
``` | modX->user->get('username') when modX->user->isAuthenticated('web') |
|  |
| DBAPI: modX->db |
| modX->db->config | [modX->getOption()](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption") |
| modX->db->connect() | modX automatically connects to MODX database. If you're looking to set up another connection, you could instantiate xPDO again. |
| modX->db->disconnect() |
| modX->db->escape($s) | modX->quote() |
| modX->db->query($sql) | modX->query() or modX->execute($criteria) see manual for PDO query |
| modX->db->delete($from, $where= "",$fields='') | see modX->query() |
| modX->db->select($fields= "\*", $from= "", $where= "", $orderby= "", $limit= "") | see modX->query() |
| modX->db->update($fields, $table, $where= "") | see modX->query() |
| modX->db->insert($fields, $intotable, $fromfields= "\*", $fromtable= "", $where= "", $limit= "") | see modX->query() |
| modX->db->exec($sql) | see modX->execute($criteria) |
| modX->db->getInsertId() | see modX->lastInsertId() |
| modX->db->getAffectedRows() | see modX->getCount() or xPDOCriteria->stmt->rowCount() |
| modX->db->getLastError() | see xPDOCriteria->stmt->errorCode or xPDOCriteria->stmt->errorInfo |
| modX->db->getRecordCount($ds) | modX->getCount($className, $criteria= null) |
| modX->db->getRow($ds, $mode= 'assoc') | see xPDOCriteria->stmt->fetch() |
| modX->db->getColumn($name, $dsq) | see xPDOCriteria->stmt->fetchColumn() |
| modX->db->getColumnNames($dsq) | see modX->getFields($className) (note: not exactly the same .. gives you column names for a specific class) |
| modX->db->getValue($dsq) | see xPDOCriteria->stmt->fetchColumn() |
| modX->db->getXML($dsq) | no direct analog |
| modX->db->getTableMetaData($table) | modX->map property |
| modX->db->prepareDate($timestamp, $fieldType= 'DATETIME') | php to sql conversion of datetypes are handled automatically in the modX model (or a custom xPDO model) |
| modX->db->getHTMLGrid($dsq, $params) | no direct analog |
| modX->db->makeArray($rs= '') | see xPDOCriteria->stmt->fetch() |
| modX->getFullTableName() | modX->getTableName($className, $includeDb=false) 
or modX->escape($customTableName) |
| modX->dbConfig | modX->getOption() (NOTE: some of the configuration keys are different, i.e. dbuser = username, dbpass = password, dbase = dbname) |
|  |
| modX->putChunk() | modX->getChunk() |
| modX->isFrontend() | modX->context->get('key') == 'web' or other front-end context |
| modX->isBackend() | modX->context->get('key') == 'mgr' |
| modX->getSettings() | modX->config after $modx->getConfig() |
| modX->getDocumentObject($method, $identifier) | not public API method; no replacement (see modRequest->getResource()) |
| modX->isMemberOfWebGroup() | modX->user->isMember or modUser->isMember |
| modX->getDocument | modX->getObject('modResource', $criteria) |
| modX->getDocuments | modX->getCollection('modResource', $criteria) 
or modX->getIterator('modResource', $criteria) |
| modX->getAllChildren() | modX->getCollection('modResource', $criteria) , $criteria having where condition 'parent' = $id |
| modX->getActiveChildren() | modX->getCollection('modResource', $criteria) , $criteria having where conditions 'parent' = $id, 'published' = 1, 'deleted' = 0 |
| modX->getDocumentChildren() | as above, modX->getCollection('modResource', $criteria) with specific criteria |
| modX->getDocumentChildrenTVars() | - to get document child resources and their TVs all at once:
- modResource->getMany('Children') and iterate the children and you can modResource->getTVValue()
- or to get TVs of any modResource object, modResource->getTemplateVars()
- or get a modTemplateVar with modX->getObject('modTemplateVar', array('name' => $tvName)) and then modTemplateVar->getValue($resourceId)/renderOutput($resourceId) |
| modX->getTemplateVar() | modX->getObject('modTemplateVar', $criteria) |
| modX->getTemplateVars() | modX->getCollection('modTemplateVar', $criteria) |
| modX->getTemplateVarOutput() | use modTemplateVar->renderOutput() on a collection of modTemplateVar objects |
| modX->getParent() | modX->getObject('modResource', $modx->resource->get('parent')) or pass in additional criteria as needed |
| modX->getPageInfo() | modX->getObject('modResource', $criteria) |
| modX->getUserInfo() | $user= $this->getObjectGraph('modUser', '{"Profile":{}}', $uid, true) 
access fields of modUser and fields of related modUserProfile |
| modX->getWebUserInfo() | as above |
| modX->changeWebUserPassword() | modUser->changePassword() |
| modX->changePassword() | modUser->changePassword() |
| modX->cleanDocumentIdentifier() | modRequest->\_cleanResourceIdentifier(), but is not a public API method (DO NOT USE) |
| modX->getDocumentIdentifier() | modRequest->getResourceIdentifier() |
| modX->getDocumentMethod() | modRequest->getResourceMethod() |
| modX->checkPreview() | not valid anymore, removing for 2.1.0-rc1 |
| modX->getManagerPath() | Use modX->getOption('manager\_url', null, MODX\_MANAGER\_URL) |
| modX->mergeDocumentContent() | see modParser->processElementTags() |
| modX->mergeSettingsContent() | see modParser->processElementTags() |
| modX->mergeChunkContent() | see modParser->processElementTags() |
| modX->mergePlaceholderContent() | see modParser->processElementTags() |
|  |
| modX->documentObject | access via modX->resource->get($field) or modX->resource->$field directly for raw data |
| modX->documentIdentifier | modX->resourceIdentifier |
| modX->documentMethod | modX->resourceMethod |
| modX->documentContent | modX->resource->getContent() |
| modX->documentGenerated | modX->resourceGenerated |
| modX->dumpSQL | see xPDOQuery->toSQL() (after xPDOQuery->prepare()) |
|  |
| modKeyword classes and related code | gone from framework, to be implemented more efficiently as developer sees fit |
| modMetatag classes and related code | gone from framework, to be implemented more efficiently as developer sees fit |
|  |
| modElement->toPlaceholders() | modX->toPlaceholders() |
|  |
| modManagerUser and related classes and code | see modUser |
| modUserRole class and related code | see Revo abac permissions |
| modWebUser and related classes and code | see modUser |
|  |
| modEventLog class and modX->logEvent() | see modX->log() |
| modLexiconFocus/Topic/Language and related classes and code | see modLexicon and modLexiconEntry |
|  |
| modX->executeProcessor() | see modX->runProcessor() |
|  |
| modTemplate->getTVs() | modTemplate->getTemplateVars() |
