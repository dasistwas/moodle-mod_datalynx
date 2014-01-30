<?php
// This file is part of Moodle - http://moodle.org/.
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.

/**
 * @package mod
 * $subpackage datalynx
 * @copyright 2011 Itamar Tzadok
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * The Datalynx has been developed as an enhanced counterpart
 * of Moodle's Database activity module (1.9.11+ (20110323)).
 * To the extent that Datalynx code corresponds to Database code,
 * certain copyrights on the Database module may obtain.
 */

$string['fieldlabel'] = 'Field label';
$string['fieldlabel_help'] = 'The field label allows for specifying a designated field label that can be added to the view by means of the [[fieldname@]] field pattern. This field pattern observes the field visibility and is hidden if the field is set to be hidden. The field label can also serve as a field display template and it interprets patterns of that field if included in the label. For example, with a number field called Number and the field label defined as \'You have earned [[Number]] credits.\' and an entry where the number value is 47 the pattern [[Number@]] would be displayed as \'You have earned 47 credits.\'';
$string['actions'] = 'Entry actions';
$string['alignment'] = 'Alignment';
$string['allowaddoption'] = 'Allow adding options';
$string['approved'] = 'approved';
$string['approvednot'] = 'not approved';
$string['ascending'] = 'Ascending';
$string['authorinfo'] = 'Author info';
$string['browse'] = 'Browse';
$string['columns'] = 'columns';
$string['commentadd'] = 'Add comment';
$string['commentbynameondate'] = 'by {$a->name} - {$a->date}';
$string['comment'] = 'Comment';
$string['commentdelete'] = 'Are you sure you want to delete this comment?';
$string['commentdeleted'] = 'Comment deleted';
$string['commentedit'] = 'Edit comment';
$string['commentempty'] = 'Comment was empty';
$string['commentinputtype'] = 'Comment input type';
$string['commentsallow'] = 'Allow comments?';
$string['commentsaved'] = 'Comment saved';
$string['comments'] = 'Comments';
$string['commentsn'] = '{$a} comments';
$string['commentsnone'] = 'No comments';
$string['configanonymousentries'] = 'This switch will enable the possibility of guest/anonymous entries for all datalynxs. You will still need to turn anonymous on manually in the settings for each datalynx.';
$string['configenablerssfeeds'] = 'This switch will enable the possibility of RSS feeds for all datalynxs. You will still need to turn feeds on manually in the settings for each datalynx.';
$string['configmaxentries'] = 'This value determines the maximum number of entries that may be added to a datalynx activity.';
$string['configmaxfields'] = 'This value determines the maximum number of fields that may be added to a datalynx activity.';
$string['configmaxfilters'] = 'This value determines the maximum number of filters that may be added to a datalynx activity.';
$string['configmaxviews'] = 'This value determines the maximum number of views that may be added to a datalynx activity.';
$string['correct'] = 'Correct';
$string['csscode'] = 'CSS code';
$string['cssinclude'] = 'CSS';
$string['cssincludes'] = 'Include external CSS';
$string['csssaved'] = 'CSS saved';
$string['cssupload'] = 'Upload CSS files';
$string['csvdelimiter'] = 'delimiter';
$string['csvenclosure'] = 'enclosure';
$string['csvfailed'] = 'Unable to read the raw data from the CSV file';
$string['csvoutput'] = 'CSV output';
$string['csvsettings'] = 'CSV settings';
$string['csvwithselecteddelimiter'] = '<acronym title=\"Comma Separated Values\">CSV</acronym> text with selected delimiter:';
/// Capability strings
$string['datalynx:addinstance'] = 'Add a new datalynx';
$string['datalynx:approve'] = 'Approve unapproved entries';
$string['datalynx:comment'] = 'Write comments';
$string['datalynx:exportallentries'] = 'Export all entries';
$string['datalynx:exportentry'] = 'Export entry';
$string['datalynx:exportownentry'] = 'Export own entries';
$string['datalynx:managecomments'] = 'Manage comments';
$string['datalynx:manageentries'] = 'Manage entries';
$string['datalynx:managepresets'] = 'Manage presets';
$string['datalynx:manageratings'] = 'Manage ratings';
$string['datalynx:managetemplates'] = 'Manage templates';
$string['datalynx:notifyentryadded'] = 'Notified on added entry';
$string['datalynx:notifyentryupdated'] = 'Notified on updated entry';
$string['datalynx:notifyentrydeleted'] = 'Notified on deleted entry';
$string['datalynx:notifycommentadded'] = 'Notified on added comment';
$string['datalynx:notifyratingadded'] = 'Notified on added rating';
$string['datalynx:notifyratingupdated'] = 'Notified on updated rating';
$string['datalynx:presetsviewall'] = 'View presets from all users';
$string['datalynx:rate'] = 'Rate entries';
$string['datalynx:ratingsviewall'] = 'View all ratings';
$string['datalynx:ratingsviewany'] = 'View any ratings';
$string['datalynx:ratingsview'] = 'View ratings';
$string['datalynx:viewanonymousentry'] = 'View anonymous entries';
$string['datalynx:viewentry'] = 'View entries';
$string['datalynx:viewindex'] = 'View index';
$string['datalynx:writeentry'] = 'Write entries';
/// End Capability strings
$string['defaultview'] = 'D';
$string['deletenotenrolled'] = 'Delete entries by users not enrolled';
$string['descending'] = 'Descending';
$string['dfintervalcount'] = 'Number of intervals';
$string['dflateallow'] = 'Late posts';
$string['dflateuse'] = 'Allow late posts';
$string['dfratingactivity'] = 'Activity grading';
$string['dftimeavailable'] = 'Available from';
$string['dftimedue'] = 'Due';
$string['dftimeinterval'] = 'Interval duration';
$string['dfupdatefailed'] = 'Failed to update datalynx!';
$string['disapproved'] = 'Not approved';
$string['documenttype'] = 'Document type';
$string['dots'] = '...';
$string['download'] = 'Download';
$string['editordisable'] = 'Disable editor';
$string['editorenable'] = 'Enable editor';
$string['embed'] = 'Embed';
$string['enabled'] = 'Enabled';
$string['entriesadded'] = '{$a} entry(s) added';
$string['entriesanonymous'] = 'Allow anonymous entries';
$string['entriesappended'] = '{$a} entry(s) appended';
$string['entriesapproved'] = '{$a} entry(s) approved';
$string['entriesconfirmadd'] = 'You are about to duplicate {$a} entry(s). Would you like to proceed?';
$string['entriesconfirmapprove'] = 'You are about to approve {$a} entry(s). Would you like to proceed?';
$string['entriesconfirmduplicate'] = 'You are about to duplicate {$a} entry(s). Would you like to proceed?';
$string['entriesconfirmdelete'] = 'You are about to delete {$a} entry(s). Would you like to proceed?';
$string['entriesconfirmupdate'] = 'You are about to update {$a} entry(s). Would you like to proceed?';
$string['entriescount'] = '{$a} entry(s)';
$string['entriesdeleteall'] = 'Delete all entries';
$string['entriesdeleted'] = '{$a} entry(s) deleted';
$string['entriesdisapproved'] = '{$a} entry(s) disapproved';
$string['entriesduplicated'] = '{$a} entry(s) duplicated';
$string['entries'] = 'Entries';
$string['entriesfound'] = '{$a} entry(s) found';
$string['entriesimport'] = 'Import entries';
$string['entrieslefttoaddtoview'] = 'You must add {$a} more entry/entries before you can view other participants\' entries.';
$string['entrieslefttoadd'] = 'You must add {$a} more entry/entries in order to complete this activity';
$string['entriesmax'] = 'Maximum entries';
$string['entriesnotsaved'] = 'No entry was saved. Please check the format of the uploaded file.';
$string['entriespending'] = 'Pending';
$string['entriesrequired'] = 'Required entries';
$string['entriessaved'] = '{$a} entry(s) saved';
$string['entriestoview'] = 'Entries required before viewing';
$string['entriesupdated'] = '{$a} entry(s) updated';
$string['entryaddmultinew'] = 'Add new entries';
$string['entryaddnew'] = 'Add a new entry';
$string['entry'] = 'Entry';
$string['entryinfo'] = 'Entry info';
$string['entrylockonapproval'] = 'lock when approved';
$string['entrylockoncomments'] = 'lock when commented';
$string['entrylockonratings'] = 'lock when rated';
$string['entrylocks'] = 'Entry locks';
$string['entrynew'] = 'New entry';
$string['entrynoneforaction'] = 'No entries were found for the requested action';
$string['entrynoneindatalynx'] = 'No entries in datalynx';
$string['entryrating'] = 'Entry rating';
$string['entrysaved'] = 'Your entry has been saved';
$string['entrysettings'] = 'Entry settings';
$string['entrysettingsupdated'] = 'Entry settings updated';
$string['entrytimelimit'] = 'Editing time limit (minutes)';
$string['exportcontent'] = 'Export content';
$string['exportadd'] = 'Add a new Export view';
$string['export'] = 'Export';
$string['exportall'] = 'Export all';
$string['exportpage'] = 'Export page';
$string['exportnoneindatalynx'] = 'There are no exports defined for this datalynx.';
$string['fieldadd'] = 'Add a field';
$string['fieldallowautolink'] = 'Allow autolink';
$string['fieldattributes'] = 'Field attributes';
$string['fieldcreate'] = 'Create a new field';
$string['fielddescription'] = 'Field description';
$string['fieldeditable'] = 'Editable';
$string['fieldedit'] = 'Editing \'{$a}\'';
$string['fieldedits'] = 'Number of edits';
$string['field'] = 'field';
$string['fieldids'] = 'Field ids';
$string['fieldmappings'] = 'Field Mappings';
$string['fieldname'] = 'Field name';
$string['fieldnew'] = 'New {$a} field';
$string['fieldnoneforaction'] = 'No fields were found for the requested action';
$string['fieldnoneindatalynx'] = 'There are no fields defined for this datalynx.';
$string['fieldnonematching'] = 'No matching fields found';
$string['fieldnotmatched'] = 'The following fields in your file are not known in this datalynx: {$a}';
$string['fieldoptionsdefault'] = 'Default values (one per line)';
$string['fieldoptions'] = 'Options (one per line)';
$string['fieldoptionsseparator'] = 'Options separator';
$string['fieldrequired'] = 'You must supply a value here.';
$string['fieldrules'] = 'Field edit rules';
$string['fieldsadded'] = 'Fields added';
$string['fieldsconfirmdelete'] = 'You are about to delete {$a} field(s). Would you like to proceed?';
$string['fieldsconfirmduplicate'] = 'You are about to duplicate {$a} field(s). Would you like to proceed?';
$string['fieldsdeleted'] = 'Fields deleted. You may need to update the default sort settings.';
$string['fields'] = 'Fields';
$string['fieldsmax'] = 'Maximum fields';
$string['fieldsnonedefined'] = 'No fields defined';
$string['fieldsupdated'] = 'Fields updated';
$string['fieldvisibility'] = 'Visibile to';
$string['fieldvisibleall'] = 'Everyone';
$string['fieldvisiblenone'] = 'Managers only';
$string['fieldvisibleowner'] = 'Owner and managers';
$string['fieldwidth'] = 'Width';
$string['filemaxsize'] = 'Total size of uploded files';
$string['filesmax'] = 'Max number of uploaded files';
$string['filetypeany'] = 'Any file type';
$string['filetypeaudio'] = 'Audio files';
$string['filetypegif'] = 'gif files';
$string['filetypehtml'] = 'Html files';
$string['filetypeimage'] = 'Image files';
$string['filetypejpg'] = 'jpg files';
$string['filetypepng'] = 'png files';
$string['filetypes'] = 'Accepted file types';
// FILTER
$string['empty'] = 'Empty';
$string['equal'] = 'Equal';
$string['greaterthan'] = 'Greater than';
$string['lessthan'] = 'Less than';
$string['greaterorequal'] = 'Greater or equal';
$string['lessorequal'] = 'Less or equal';
$string['between'] = 'Between';
$string['contains'] = 'Contains';
$string['in'] = 'In';

// FILTER FORM
$string['andor'] = 'and/or ...';
$string['and'] = 'AND';
$string['or'] = 'OR';
$string['is'] = 'IS';
$string['not'] = 'NOT';
// FILTER
$string['filtersortfieldlabel'] = 'Sort field ';
$string['filtersearchfieldlabel'] = 'Search field ';
$string['filteradvanced'] = 'Advanced filter';
$string['filteradd'] = 'Add a filter';
$string['filterbypage'] = 'By page';
$string['filtercancel'] = 'Cancel filter';
$string['filtercreate'] = 'Create a new filter';
$string['filtercurrent'] = 'Current filter';
$string['filtercustomsearch'] = 'Search options';
$string['filtercustomsort'] = 'Sort options';
$string['filterdescription'] = 'Filter description';
$string['filteredit'] = 'Editing \'{$a}\'';
$string['filter'] = 'filter';
$string['filtergroupby'] = 'Group by';
$string['filterincomplete'] = 'Search condition must be completed.';
$string['filtername'] = 'Datalynx auto-linking';
$string['filternew'] = 'New filter';
$string['filternoneforaction'] = 'No filters were found for the requested action';
$string['filterperpage'] = 'Per page';
$string['filtersadded'] = '{$a} filter(s) added';
$string['filtersave'] = 'Save filter';
$string['filtersconfirmdelete'] = 'You are about to delete {$a} filter(s). Would you like to proceed?';
$string['filtersconfirmduplicate'] = 'You are about to duplicate {$a} filter(s). Would you like to proceed?';
$string['filtersdeleted'] = '{$a} filter(s) deleted';
$string['filtersduplicated'] = '{$a} filter(s) duplicated';
$string['filterselection'] = 'Selection';
$string['filters'] = 'Filters';
$string['filtersimplesearch'] = 'Simple search';
$string['filtersmax'] = 'Maximum filters';
$string['filtersnonedefined'] = 'No filters defined';
$string['filtersnoneindatalynx'] = 'There are no filters defined for this datalynx.';
$string['filtersupdated'] = '{$a} filter(s) updated';
$string['filterupdate'] = 'Update an existing filter';
$string['filterurlquery'] = 'Url query';
$string['filtermy'] = 'My filter';
$string['filteruserreset'] = '** Reset my filter';


$string['firstdayofweek'] = 'Monday';
$string['first'] = 'First';
$string['formemptyadd'] = 'You did not fill out any fields!';
$string['fromfile'] = 'Import from zip file';
$string['generalactions'] = 'General actions';
$string['getstarted'] = 'This datalynx appears to be new or with incomplete setup. To get the datalynx started <ul><li>apply a preset in the {$a->presets} section</li></ul> or <ul><li>add fields in the {$a->fields} section</li><li>add views in the {$a->views} section</li></ul>';
$string['grade'] = 'Grade';
$string['gradeinputtype'] = 'Grade input type';
$string['grading'] = 'Grading';
$string['gradingmethod'] = 'Grading method';
$string['gradingsettings'] = 'Activity grading settings';
$string['groupentries'] = 'Group entries';
$string['groupinfo'] = 'Group info';
$string['headercss'] = 'Custom CSS styles for all views';
$string['headerjs'] = 'Custom javascript for all views';
$string['horizontal'] = 'Horizontal';
$string['importadd'] = 'Add a new Import view';
$string['import'] = 'Import';
$string['importnoneindatalynx'] = 'There are no imports defined for this datalynx.';
$string['incorrect'] = 'Incorrect';
$string['index'] = 'Index';
$string['insufficiententries'] = 'more entries needed to view this datalynx';
$string['internal'] = 'Internal';
$string['intro'] = 'Introduction';
$string['invalidname'] = 'Please choose another name for this {$a}';
$string['invalidrate'] = 'Invalid datalynx rate ({$a})';
$string['invalidurl'] = 'The URL you just entered is not valid';
$string['jscode'] = 'Javascript code';
$string['jsinclude'] = 'JS';
$string['jsincludes'] = 'Include external javascript';
$string['jssaved'] = 'Javascript saved';
$string['jsupload'] = 'Upload javascript files';
$string['lock'] = 'Lock';
$string['manage'] = 'Manage';
$string['mappingwarning'] = 'All old fields not mapped to a new field will be lost and all data in that field will be removed.';
$string['max'] = 'Maximum';
$string['maxsize'] = 'Maximum size';
$string['mediafile'] = 'Media file';
$string['reference'] = 'Reference';
/// Message strings
$string['message_entryadded'] =
'Hello {$a->fullname},

the content in {$a->datalynxlink} has been modified by {$a->senderprofilelink}.

The following entry has been created: {$a->viewlink}.';

$string['message_entryupdated'] =
'Hello {$a->fullname},

the content in {$a->datalynxlink} has been modified by {$a->senderprofilelink}.

The following entry has been updated: {$a->viewlink}.';

$string['message_entrydeleted'] =
'Hello {$a->fullname},

the content in {$a->datalynxlink} has been modified by {$a->senderprofilelink}.

The following entry has been deleted: {$a->entryid}.';

$string['message_entryapproved'] = 'Hello {$a->fullname},

the content in {$a->datalynxlink} has been approved by {$a->senderprofilelink}.

The following entry has been approved: {$a->viewlink}.';

$string['message_entrydisapproved'] = 'Hello {$a->fullname},

the content in {$a->datalynxlink} has been modified by {$a->senderprofilelink}.

The following entry has been disapproved: {$a->viewlink}.';

$string['message_commentadded'] = 'Datalynx comment added';
$string['message_ratingadded'] = 'Datalynx rating added';
$string['message_ratingupdated'] = 'Datalynx rating updated';
/// End Message strings
/// Message provider strings
$string['messageprovider:datalynx_entryadded'] = 'Datalynx entry added';
$string['messageprovider:datalynx_entryupdated'] = 'Datalynx entry updated';
$string['messageprovider:datalynx_entrydeleted'] = 'Datalynx entry deleted';
$string['messageprovider:datalynx_entryapproved'] = 'Datalynx entry approved';
$string['messageprovider:datalynx_entrydisapproved'] = 'Datalynx entry disapproved';
$string['messageprovider:datalynx_commentadded'] = 'Datalynx comment added';
$string['messageprovider:datalynx_ratingadded'] = 'Datalynx rating added';
$string['messageprovider:datalynx_ratingupdated'] = 'Datalynx rating updated';
/// End Message provider strings
$string['min'] = 'Minimum';
$string['modulename'] = 'Datalynx';
$string['modulename_help'] = 'The datalynx module may be used for creating a wide range of activities/resources by allowing the instructor/manager to design and create a custom content form from various input elements (e.g.  texts, numbers, images, files, urls, etc.), and participants to submit content and view submitted content.';
$string['modulenameplural'] = 'Datalynxs';
$string['more'] = 'More';
$string['moreurl'] = 'More URL';
$string['movezipfailed'] = 'Can\'t move zip';
$string['multiapprove'] = ' Approve ';
$string['multidelete'] = ' Delete  ';
$string['multidownload'] = 'Download';
$string['multiduplicate'] = 'Duplicate';
$string['multiedit'] = '  Edit   ';
$string['multiexport'] = 'Export';
$string['multipletags'] = 'Multiple tags found! View not saved';
$string['multiselect'] = 'Multi-select';
$string['multishare'] = 'Share';
$string['newvalueallow'] = 'Allow new values';
$string['newvalue'] = 'New value';
$string['noaccess'] = 'You do not have access to this page';
$string['nomatch'] = 'No matching entries found!';
$string['nomaximum'] = 'No maximum';
$string['notapproved'] = 'Entry is not approved yet.';
$string['notificationenable'] = 'Enable notifications for';
$string['notinjectivemap'] = 'Not an injective map';
$string['notopenyet'] = 'Sorry, this activity is not available until {$a}';
$string['numberrssarticles'] = 'RSS articles';
$string['numcharsallowed'] = 'Number of characters';
$string['optionaldescription'] = 'Short description (optional)';
$string['optionalfilename'] = 'Filename (optional)';
$string['other'] = 'Other';
$string['overwrite'] = 'Overwrite';
$string['overwritesettings'] = 'Overwrite current settings';
$string['presetadd'] = 'Add presets';
$string['presetapply'] = 'Apply';
$string['presetavailableincourse'] = 'Course presets';
$string['presetavailableinsite'] = 'Site presets';
$string['presetchoose'] = 'choose a predfined preset';
$string['presetdataanon'] = 'with user data anonymized';
$string['presetdata'] = 'with user data';
$string['presetfaileddelete'] = 'Error deleting a preset!';
$string['presetfromdatalynx'] = 'Make a preset of this datalynx';
$string['presetfromfile'] = 'Upload preset from file';
$string['presetimportsuccess'] = 'The preset has been successfully applied.';
$string['presetinfo'] = 'Saving as a preset will publish this view. Other users may be able to use it in their datalynxs.';
$string['presetmap'] = 'map fields';
$string['presetnodata'] = 'without user data';
$string['presetnodefinedfields'] = 'New preset has no defined fields!';
$string['presetnodefinedviews'] = 'New preset has no defined views!';
$string['presetnoneavailable'] = 'No available presets to display';
$string['presetplugin'] = 'Plug in';
$string['presetrefreshlist'] = 'Refresh list';
$string['presetshare'] = 'Share';
$string['presetsharesuccess'] = 'Saved successfully. Your preset will now be available across the site.';
$string['presetsource'] = 'Preset source';
$string['presets'] = 'Presets';
$string['presetusestandard'] = 'Use a preset';
$string['page-mod-datalynx-x'] = 'Any datalynx activity module page';
$string['pagesize'] = 'Entries per page';
$string['pagingbar'] = 'Paging bar';
$string['pagingnextslide'] = 'Next slide';
$string['pagingpreviousslide'] = 'Previous slide';
$string['participants'] = 'Participants';
$string['pleaseaddsome'] = 'Please create some below or {$a} to get started.';
$string['pluginadministration'] = 'Datalynx activity administration';
$string['pluginname'] = 'Datalynx';
$string['porttypeblank'] = 'Blank entries';
$string['porttypecsv'] = 'CSV';
$string['randomone'] = 'One random';
$string['random'] = 'Random';
$string['range'] = 'Range';
$string['rate'] = 'Rate';
$string['ratingmanual'] = 'Manual';
$string['ratingmethod'] = 'Rating method';
$string['ratingno'] = 'No ratings';
$string['ratingpublic'] = '{$a} can see everyone\'s ratings';
$string['ratingpublicnot'] = '{$a} can only see their own ratings';
$string['rating'] = 'Rating';
$string['ratingsaggregate'] = '{$a->value} ({$a->method} of {$a->count ratings})';
$string['ratingsavg'] = 'Average of ratings';
$string['ratingscount'] = 'Number of ratings';
$string['ratingsmax'] = 'Highest rating';
$string['ratingsmin'] = 'Lowest rating';
$string['ratingsnone'] = '---';
$string['ratings'] = 'Ratings';
$string['ratingssaved'] = 'Ratings saved';
$string['ratingssum'] = 'Sum of ratings';
$string['ratingsviewrate'] = 'View and rate';
$string['ratingsview'] = 'View ratings';
$string['ratingvalue'] = 'Rating value';
$string['reference'] = 'Reference';
$string['renew'] = 'Renew';
$string['requireapproval'] = 'Require approval?';
$string['requiredall'] = 'all required';
$string['requirednotall'] = 'not all required';
$string['resetsettings'] = 'Reset filters';
$string['returntoimport'] = 'Return to import';
$string['rssglobaldisabled'] = 'Disabled. See site configuration variables.';
$string['rsshowmany'] = '(number of latest entries to show, 0 to disable RSS)';
$string['rsstemplate'] = 'RSS template';
$string['rsstitletemplate'] = 'RSS title template';
$string['ruleaction'] = 'Rule action';
$string['ruleadd'] = 'Add a rule';
$string['rulecancel'] = 'Cancel rule';
$string['rulecondition'] = 'Condition';
$string['rulecreate'] = 'Create a new rule';
$string['ruledenydelete'] = 'Prevent entry deletion';
$string['ruledenyedit'] = 'Prevent entry editing';
$string['ruledenyviewbyother'] = 'Hide entry from everyone but owner';
$string['ruledenyview'] = 'Hide entry from everyone';
$string['ruledescription'] = 'Rule description';
$string['ruleedit'] = 'Editing \'{$a}\'';
$string['rulename'] = 'Datalynx auto-linking';
$string['rulenew'] = 'New {$a} rule';
$string['rulenoneforaction'] = 'No rules were found for the requested action';
$string['rule'] = 'rule';
$string['rulesadded'] = '{$a} rule(s) added';
$string['rulesave'] = 'Save rule';
$string['rulesconfirmdelete'] = 'You are about to delete {$a} rule(s). Would you like to proceed?';
$string['rulesconfirmduplicate'] = 'You are about to duplicate {$a} rule(s). Would you like to proceed?';
$string['rulesdeleted'] = '{$a} rule(s) deleted';
$string['rulesduplicated'] = '{$a} rule(s) duplicated';
$string['rulesmax'] = 'Maximum rules';
$string['rulesnonedefined'] = 'No rules defined';
$string['rulesnoneindatalynx'] = 'There are no rules defined for this datalynx.';
$string['rules'] = 'Rules';
$string['rulesupdated'] = '{$a} rule(s) updated';
$string['ruleupdate'] = 'Update an existing rule';
$string['ruleenabled'] = 'Enabled';

$string['author'] = 'Author';
$string['email'] = 'Email';




$string['savecontinue'] = 'Save and continue';
$string['search'] = 'Search';
$string['sendinratings'] = 'Send in my latest ratings';
$string['separateentries'] = 'Each entry in a separate file';
$string['separateparticipants'] = 'Separate participants';
$string['settings'] = 'Settings';
$string['showall'] = 'Show all entries';
$string['singleedit'] = 'E';
$string['singlemore'] = 'M';
$string['spreadsheettype'] = 'Spreadsheet type';
$string['submissionsinpopup'] = 'Submissions in popup';
$string['submission'] = 'Submission';
$string['submissionsview'] = 'Submissions view';
$string['subplugintype_datalynxfield'] = 'Datalynx field type';
$string['subplugintype_datalynxfield_plural'] = 'Datalynx field types';
$string['subplugintype_datalynxrule'] = 'Datalynx rule type';
$string['subplugintype_datalynxrule_plural'] = 'Datalynx rule types';
$string['subplugintype_datalynxtool'] = 'Datalynx tool type';
$string['subplugintype_datalynxtool_plural'] = 'Datalynx tool types';
$string['subplugintype_datalynxview'] = 'Datalynx view type';
$string['subplugintype_datalynxview_plural'] = 'Datalynx view types';
$string['teachersandstudents'] = '{$a->teachers} and {$a->students}';
$string['textbox'] = 'Text box';
$string['timecreated'] = 'Time created';
$string['timemodified'] = 'Time modified';
$string['todatalynx'] = 'to this datalynx.';
$string['tools'] = 'Tools';
$string['trusttext'] = 'Trust text';
$string['type'] = 'Type';
$string['unlock'] = 'Unlock';
$string['updatefield'] = 'Update an existing field';
$string['updateview'] = 'Update an existing view';
$string['userinfo'] = 'User info';
$string['userpref'] = 'User preferences';
$string['usersubmissionsinpopup'] = 'User submissions in popup';
$string['usersubmissions'] = 'User submissions';
$string['usersubmissionsview'] = 'User submissions view';
$string['vertical'] = 'Vertical';
$string['viewadd'] = 'Add a view';
$string['viewcharactertags'] = 'Character tags';
$string['viewcreate'] = 'Create a new view';
$string['viewcurrent'] = 'Current view';
$string['viewcustomdays'] = 'Custom refresh interval: days';
$string['viewcustomhours'] = 'Custom refresh interval: hours';
$string['viewcustomminutes'] = 'Custom refresh interval: minutes';
$string['viewdescription'] = 'View description';
$string['viewedit'] = 'Editing \'{$a}\'';
$string['vieweditthis'] = 'Edit this view';
$string['viewfieldtags'] = 'Field tags';
$string['viewfilter'] = 'Filter';
$string['viewforedit'] = 'View for \'edit\'';
$string['viewformore'] = 'View for \'more\'';
$string['viewfromdate'] = 'Viewable from';
$string['viewgeneraltags'] = 'General tags';
$string['viewgroupby'] = 'Group by';
$string['viewintervalsettings'] = 'Interval settings';
$string['viewinterval'] = 'When to refresh view content';
$string['entrytemplate'] = 'Entry template';
$string['entrytemplate_help'] = 'Entry template';
$string['viewlistfooter'] = 'List footer';
$string['viewlistheader'] = 'List header';
$string['viewname'] = 'View name';
$string['viewnew'] = 'New {$a} view';
$string['viewnodefault'] = 'Default view is not set. Choose one of the views in the {$a} list as the default view.';
$string['viewnoneforaction'] = 'No views were found for the requested action';
$string['viewnoneindatalynx'] = 'There are no views defined for this datalynx.';
$string['toolnoneindatalynx'] = 'There are no tools defined for this datalynx.';
$string['toolrun'] = 'Run';
$string['viewoptions'] = 'View options';
$string['viewpagingfield'] = 'Paging field';
$string['viewperpage'] = 'Per page';
$string['viewresettodefault'] = 'Reset to default';
$string['viewreturntolist'] = 'Return to list';
$string['viewsadded'] = '{$a} view(s) added';
$string['viewsconfirmdelete'] = 'You are about to delete {$a} view(s). Would you like to proceed?';
$string['viewsconfirmduplicate'] = 'You are about to duplicate {$a} view(s). Would you like to proceed?';
$string['viewsdeleted'] = '{$a} view(s) deleted';
$string['viewtemplate'] = 'View template';
$string['viewtemplate_help'] = 'View template';
$string['viewgeneral'] = 'View general settings';
$string['viewgeneral_help'] = 'View general settings';
$string['viewsectionpos'] = 'Section position';
$string['viewslidepaging'] = 'Slide paging';
$string['viewsmax'] = 'Maximum views';
$string['viewsupdated'] = '{$a} view(s) updated';
$string['views'] = 'Views';
$string['viewtodate'] = 'Viewable to';
$string['view'] = 'view';
$string['viewvisibility'] = 'Visibility';
$string['wrongdataid'] = 'Wrong datalynx id provided';

// === teammemberselect strings ====================================================================================================

$string['teamsize'] = 'Maximum team size';
$string['teamsize_help'] = 'Specify the maximum size of the team. It must be a positive integer.';
$string['teamsize_error_required'] = 'This field is required!';
$string['teamsize_error_value'] = 'The value must be a positive integer!';
$string['admissibleroles'] = 'Admissible roles';
$string['admissibleroles_help'] = 'Users possessing any of the selected roles will be admissible to the team. At least one role must be selected.';
$string['admissibleroles_error'] = 'Please select at least one role!';
$string['notifyteam'] = 'Notification rule';
$string['notifyteam_help'] = 'Select notification rule to be applied to all team members selected in this field.';
$string['teammemberselectmultiple'] = 'A single person can be selected only once as a team member!';
$string['listformat'] = 'List format';
$string['listformat_newline'] = 'Newline separated';
$string['listformat_space'] = 'Space separated';
$string['listformat_comma'] = 'Comma separated';
$string['listformat_commaspace'] = 'Comma separated with space';
$string['listformat_ul'] = 'Unordered list';
$string['teammembers'] = 'Team members';
$string['status'] = 'Status';
$string['status_notcreated'] = 'Not set';
$string['status_draft'] = 'Draft';
$string['status_submission'] = 'Submission';
$string['status_finalsubmission'] = 'Final submission';
$string['completionentries'] = 'Number of approved entries';
$string['completionentriesgroup'] = 'Require approved entries';
$string['completionentriesgroup_help'] = 'Make sure you enable approval for entries above!';
$string['limitchoice'] = 'Limit choices for users';
$string['limitchoice_help'] = 'Enable this to prevent a user from choosing the same option more than once in separate entries.';
$string['limitchoice_error'] = 'You have already selected option \'{$a}\' the maximum allowed number of times!';
$string['redirectsettings'] = 'Redirect on submit options';
$string['redirectsettings_help'] = 'Use this fields to specify which view should the browser redirect to upon leaving the edit view.';
$string['redirectto'] = 'Target view';
$string['targetview_this_new'] = 'This view (New)';
$string['targetview_this'] = '(This view)';
$string['targetview_default'] = '(Default)';
$string['targetview_edit'] = '(Edit)';
$string['targetview_more'] = '(More)';
$string['visibleto'] = 'Visible to';
$string['visible_1'] = 'Manager';
$string['visible_2'] = 'Teacher';
$string['visible_4'] = 'Student';
$string['visible_8'] = 'Guest';
$string['statistics'] = 'Statistics';
$string['iamteammember'] = 'I am a teammember';
$string['useristeammember'] = 'A user is a teammember';
$string['fromto_error'] = '\'From\' date cannot be set after \'To\' date!';
$string['me'] = 'Me';
$string['otheruser'] = 'Other user';
$string['period'] = 'Period';
$string['ondate'] = 'On date';
$string['fromdate'] = 'From date';
$string['todate'] = 'To date';
$string['alltime'] = 'All time';
$string['datalynx:editrestrictedfields'] = 'Edit restricted fields';
$string['datalynx:viewdrafts'] = 'View drafts';
$string['datalynx:viewprivilegeguest'] = 'Guest view access privilege';
$string['datalynx:viewprivilegemanager'] = 'Manager view access privilege';
$string['datalynx:viewprivilegestudent'] = 'Student view access privilege';
$string['datalynx:viewprivilegeteacher'] = 'Teacher view access privilege';
$string['datalynx:viewstatistics'] = 'View statistics';
$string['statisticsfor'] = 'Statistics for \'{$a}\'';
$string['timestring0'] = 'from {$a->from} to {$a->to}';
$string['timestring1'] = 'on {$a->from}';
$string['timestring2'] = 'until {$a->to}';
$string['timestring3'] = 'from {$a->from} to now ({$a->now})';
$string['timestring4'] = 'until now ({$a->now})';
$string['numtotalentries'] = 'Number of created entries';
$string['numapprovedentries'] = 'Number of approved entries';
$string['numdeletedentries'] = 'Number of deleted entries';
$string['numvisits'] = 'Number of visits';
$string['modearray'] = 'Display mode';
$string['modearray_help'] = '\'To\' date is always considered when available until 23:59:59.';
$string['time_field_required'] = '{$a} field is required!';
$string['statusrequired'] = 'Status must be set!';
$string['fromaftertoday_error'] = '\'From\' date cannot be set after today\'s date!';
$string['editmode'] = 'Edit mode';
$string['managemode'] = 'Manage mode';
$string['minteamsize'] = 'Minimum team size';
$string['minteamsize_help'] = 'Enter the miminum allowed number of team members here.';
$string['minteamsize_error_value'] = 'Minimum team size cannot be greater than the maximum team size!';
$string['minteamsize_error_form'] = 'You must select at least {$a} team members!';
$string['teamfield'] = 'Team field';
$string['teamfield_help'] = 'Check this box to designate this field as a team field. When approving an entry with a specified team that entry will be copied and assigned to every team member. Only one field per Datalynx instance may be designated as a team field.';
$string['referencefield'] = 'Reference field';
$string['referencefield_help'] = 'Select a field to serve as a duplicate prevention field. This will skip creating entries for users who already have an approved entry with the same field value as the one being approved.';
$string['linktoentry'] = 'Link to entry';
$string['notifyteammembers'] = 'Notify team members';
$string['notifyteammembers_help'] = 'Select this option to inform team members of their membership status change.';
$string['messageprovider:datalynx_memberadded'] = 'Team membership status change';
$string['messageprovider:datalynx_memberremoved'] = 'Team membership status change';
$string['message_memberadded'] = 'Dear {$a->fullname},

you have been added to {$a->fieldname} by {$a->senderprofilelink}. Please go to {$a->viewlink} for more details.';
$string['message_memberremoved'] = 'Dear {$a->fullname},

you have been removed from {$a->fieldname} by {$a->senderprofilelink}. Please go to {$a->viewlink} for more details.';
$string['noentries'] = 'There are no entries to display.';
$string['nosuchentries'] = 'No entries available.';
$string['nomatchingentries'] = 'No entries matching the selected filter exist.';
$string['nopermission'] = 'You do not have the permission to view specified entries.';
$string['datalynx:notifymemberadded'] = 'Inform users about being added as a team member';
$string['datalynx:notifymemberremoved'] = 'Inform users about being removed as a team member';
$string['datalynx:viewprivilegeadmin'] = 'Administrator view access privilege';

$string['eventsettings'] = 'Event settings';
$string['triggeringevent'] = 'Triggering event';
$string['datalynx_entryadded'] = 'Entry added';
$string['datalynx_entryupdated'] = 'Entry updated';
$string['datalynx_entrydeleted'] = 'Entry deleted';
$string['datalynx_entryapproved'] = 'Entry approved';
$string['datalynx_entrydisapproved'] = 'Entry disapproved';
$string['datalynx_commentadded'] = 'Comment added';
$string['datalynx_ratingadded'] = 'Rating added';
$string['datalynx_ratingupdated'] = 'Rating updated';
$string['datalynx_ratingdeleted'] = 'Rating deleted';
$string['datalynx_memberadded'] = 'Team member added';
$string['datalynx_memberremoved'] = 'Team member removed';
$string['blankfilter'] = 'Blank filter';
$string['defaultfilterlabel'] = 'Default filter ({$a})';