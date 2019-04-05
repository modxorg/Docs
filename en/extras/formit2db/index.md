---
title: "FormIt2db"
_old_id: "1666"
_old_uri: "revo/formit2db"
---

## FormIt2db + db2FormIt

 FormIt2db and db2FormIt are two small FormIt Hooks to save xPDO objects during FormIt posts and retreive them before displaying FormIt forms.

### <a name="requirements"></a>Requirements/Dependencies

- MODx Revolution 2.x
- FormIt Package

### <a name="download"></a>Download

 It can be downloaded from within the MODx Revolution manager via [Package Management](display/revolution20/Package+Management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/formit2db>

### <a name="bugtracker"></a>Bug Reporting

 **Bugtracker**: <https://github.com/Jako/FormIt2db>

## <a name="usage"></a>Usage

 Snippet Properties for Formit2db

 | Property | Description | Default |
|----------|-------------|---------|
| prefix | Table prefix of the xPDO package | MODX DB prefix |
| packagename | Package name of the xPDO object | - |
| classname | Class name of the xPDO object | - |
| tablename | Table name of the autocreated xPDO Package | - |
| where | JSON encoded xPDO where clause - to update a row instead of creating a new one | - |
| paramname | Requested POST param - to update a row instead of creating a new one | - |
| fieldname | xPDO fieldname the POST param is compared with - to update a row instead of creating a new one | 'paramname' |
| arrayFormat | Format to transform form fields that contains array data (i.e. checkboxes) into | csv |
| arrayFields | JSON encoded array of form fields that contains array data | \[\] |
| removeFields | JSON encoded array of form fields not saved in the xPDO object | \[\] |
| autoPackage | Use the autocreated xPDO Package | false |

Snippet Properties for db2Formit

 | Property | Description | Default |
|----------|-------------|---------|
| prefix | Table prefix of the xPDO package. | MODX DB prefix |
| packagename | Package name of the xPDO object. | - |
| classname | Class name of the xPDO object. | - |
| where | JSON encoded xPDO where clause - to retreive an existing row. | - |
| paramname | Requested REQUEST param - to retreive an existing row. | - |
| fieldname | xPDO fieldname the REQUEST param is compared with – to retreive an existing row. | 'paramname' |
| arrayFormat | Format to transform database fields that contains array data (i.e. checkboxes) into | csv |
| arrayFields | JSON encoded array of database fields that are transformed into arrays | \[\] |
| ignoreFields | JSON encoded array of database fields that are not retreived into FormIt | \[\] |
| notFoundRedirect | ID of the MODX resource the user is redirected to, if the requested row is not found | 0 |
| autoPackage | Autocreate the xPDO Package with packagename and tablename | false |

## <a name="notes"></a>Notes

1. The snippets bases on the code in the following thread in MODX forum <http://forums.modx.com/thread/?thread=32560>. Some parameter names have been changed to lowercase and some have been added.
2. If the xPDO package is autocreated, the classname in the package is generated by MODX and could be different to a classname set by parameter. If you disable the autoPackage parameter later, please look which classname was generated and change the parameter to that value.
3. Example for a JSON encoded array: &arrayFields = `\["formfield1","formfield2"\]`