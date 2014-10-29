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
 * @package mod-datalynx
 * @copyright 2011 Itamar Tzadok
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * The Datalynx has been developed as an enhanced counterpart
 * of Moodle's Database activity module (1.9.11+ (20110323)).
 * To the extent that Datalynx code corresponds to Database code,
 * certain copyrights on the Database module may obtain.
 */

M.mod_datalynx = {};

/**
 * insert the field tags into the textarea.
 * Used when editing a datalynx view
 */
function insert_field_tags(selectlist, editorname) {
    var value = selectlist.options[selectlist.selectedIndex].value;
    editorid = 'id_'+editorname;

    // textarea displayed and tinyMCE hidden
    if (document.getElementById(editorid).style.display != 'none') {
        editor = document.getElementById(editorid);
        switch (value){
            case '9':
                insertAtCursor(editor, "\t");
                break;

            case '10':               
                insertAtCursor(editor, "\n");
                break;

            default:
                insertAtCursor(editor, value);
        }
    } else {
        if (typeof tinyMCE == 'undefined') { // Atto
            document.getElementById(editorid).focus();
            pasteHtmlAtCaret(value);
        } else { // tinyMCE
            tinyMCE.execInstanceCommand(editorid, 'mceInsertContent', false, value);
        }
    }
}

function pasteHtmlAtCaret(html) {
    var sel, range;
    if (window.getSelection) {
        // IE9 and non-IE
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();

            // Range.createContextualFragment() would be useful here but is
            // non-standard and not supported in all browsers (IE9, for one)
            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(),
                node, lastNode;
            while ((node = el.firstChild)) {
                lastNode = frag.appendChild(node);
            }
            range.insertNode(frag);

            // Preserve the selection
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        // IE < 9
        document.selection.createRange().pasteHTML(html);
    }
}

/**
 * select antries for multiactions
 * Used when editing datalynx entries
 */
function select_allnone(elem, checked) {
    var selectors = document.getElementsByName(elem + 'selector');
    for (var i = 0; i < selectors.length; i++) {
        selectors[i].checked = checked;
    }
}

/**
 * construct url for multiactions
 * Used when editing datalynx entries
 */
function bulk_action(elem, url, action, defaultval) {
    var selected = [];
    var selectors = document.getElementsByName(elem +'selector');
    for (var i = 0; i < selectors.length; i++) {
        if (selectors[i].checked == true) {
            selected.push(selectors[i].value);
        }
    }

    // send selected entries to processing
    if (selected.length) {
        location.href = url + '&' + action + '=' + selected.join(',');

    // if no entries selected but there is default, send it
    } else if (defaultval) {
        location.href = url + '&' + action + '=' + defaultval;
    }
}

/**
 * hiding/displaying advanced search form when viewing
 */
function showHideAdvSearch(checked) {
    var divs = document.getElementsByTagName('div');
    for(i=0;i<divs.length;i++) {
        if(divs[i].id.match('datalynx_adv_form')) {
            if(checked) {
                divs[i].style.display = 'inline';
            }
            else {
                divs[i].style.display = 'none';
            }
        }
        else if (divs[i].id.match('reg_search')) {
            if (!checked) {
                divs[i].style.display = 'inline';
            }
            else {
                divs[i].style.display = 'none';
            }
        }
    }
}

/**
 * wordcount bar
 */

M.datalynx_wordcount_bar = {pb: null};

M.datalynx_wordcount_bar.callback = function(obj) {
    if (typeof tinyMCE == 'undefined') {
        // For normal textareas
		editor = document.getElementById('id_'+obj.pbid+'_editor');
        //insertAtCursor(editor, value);
    } else {
        editor = tinyMCE.get('id_'+obj.pbid+'_editor');

        var text = editor.getContent().replace(/<[^>]+>/gi,'');
        text = text.replace(/\s+/gi,' ');
        var words = text.split(' ').length;
        document.getElementById('id_'+obj.pbid+'_wordcount_value').innerHTML = words;
        obj.pb.set('value', words);

        editor.onKeyUp.add(function(editor, e) {
                                    var text = editor.getContent().replace(/<[^>]+>/gi,'');
                                    text = text.replace(/\s+/gi,' ');
                                    var words = text.split(' ').length;
                                    document.getElementById('id_'+obj.pbid+'_wordcount_value').innerHTML = words;
                                    obj.pb.set('value', words);
                        });
    }
};

M.datalynx_wordcount_bar.init = function(Y, options) {
    var Dom = YAHOO.util.Dom; 
    
    this.pbid = options['identifier'];
    this.pb = new YAHOO.widget.ProgressBar();
    this.pb.set('width', '300px');
    this.pb.set('anim', false);
    this.pb.set('minValue', Number(options['minValue']));
    this.pb.set('maxValue', Number(options['maxValue']));
    this.pb.set('value', Number(options['value']));
    
    this.pb.render('id_'+this.pbid+'_wordcount_pb');
    Dom.get('id_'+this.pbid+'_wordcount_value').innerHTML = options['value'];
    
    //var anim = this.pb.get('anim');
    //anim.duration = 1;
    //anim.method = YAHOO.util.Easing.easeNone;
    
    //this.pb.on('progress', function(value){
    //    Dom.get('id_'+this.pbid+'_wordcount_value').innerHTML = value;
    //});
    
    this.pb.on('valueChange', function(oArgs){
        Dom.get('id_'+this.pbid+'_wordcount_value').innerHTML = oArgs.newValue;
    });
    
    Y.later(1000, M.datalynx_wordcount_bar, M.datalynx_wordcount_bar.callback, this);
}


M.datalynx_filepicker = {};


M.datalynx_filepicker.callback = function(params) {
    var html = '<a href="'+params['url']+'">'+params['file']+'</a>';
    document.getElementById('file_info_'+params['client_id']).innerHTML = html;
};

/**
 * This fucntion is called for each file picker on page.
 */
M.datalynx_filepicker.init = function(Y, options) {
    options.formcallback = M.datalynx_filepicker.callback;
    if (!M.core_filepicker.instances[options.client_id]) {
        M.core_filepicker.init(Y, options);
    }
    Y.on('click', function(e, client_id) {
        e.preventDefault();
        M.core_filepicker.instances[client_id].show();
    }, '#filepicker-button-'+options.client_id, null, options.client_id);

    var item = document.getElementById('nonjs-filepicker-'+options.client_id);
    if (item) {
        item.parentNode.removeChild(item);
    }
    item = document.getElementById('filepicker-wrapper-'+options.client_id);
    if (item) {
        item.style.display = '';
    }
};

M.datalynx_urlpicker = {};

M.datalynx_urlpicker.init = function(Y, options) {
    options.formcallback = M.datalynx_urlpicker.callback;
    if (!M.core_filepicker.instances[options.client_id]) {
        M.core_filepicker.init(Y, options);
    }
    Y.on('click', function(e, client_id) {
        e.preventDefault();
        M.core_filepicker.instances[client_id].show();
    }, '#id_filepicker-button-'+options.client_id, null, options.client_id);

};

M.datalynx_urlpicker.callback = function (params) {
    document.getElementById('id_field_url_'+params.client_id).value = params.url;
};

M.datalynx_imagepicker = {};

M.datalynx_imagepicker.callback = function(params) {
	if (params['url'] == '') {
		var html = params['file'];
	} else {
		var html = '<a href="'+params['url']+'"><img src="'+params['url']+'" style="max-width:50px !important;" /> '+params['file']+'</a>';
	}
    document.getElementById('file_info_'+params['client_id']).innerHTML = html;
};

/**
 * This fucntion is called for each file picker on page.
 */
M.datalynx_imagepicker.init = function(Y, options) {
    options.formcallback = M.datalynx_imagepicker.callback;
    if (!M.core_filepicker.instances[options.client_id]) {
        M.core_filepicker.init(Y, options);
    }
    Y.on('click', function(e, client_id) {
        e.preventDefault();
        M.core_filepicker.instances[client_id].show();
    }, '#filepicker-button-'+options.client_id, null, options.client_id);

    var item = document.getElementById('nonjs-filepicker-'+options.client_id);
    if (item) {
        item.parentNode.removeChild(item);
    }
    item = document.getElementById('filepicker-wrapper-'+options.client_id);
    if (item) {
        item.style.display = '';
        M.datalynx_imagepicker.callback(options);
    }
};

/**
 * Tag management in atto
 */

M.mod_datalynx.tag_manager = {};

/**
 *
 * @param Y YUI
 * @param options []
 */
M.mod_datalynx.tag_manager.init = function(Y, behaviors, renderers) {
    // return;
    var tagregex = /\[\[([^\|\]]+)(?:\|([^\|\]]*))?(?:\|([^\|\]]*))?\]\]/g;

    var editors = Y.all("body.jsenabled div.editor_atto_content_wrap > div");
    editors.each(function(editor) {
        var oldcontent = editor.getHTML();
        var newcontent = oldcontent;
        while ((splittag = tagregex.exec(oldcontent)) !== null) {
            var tag = splittag[0];
            var field = splittag[1];
            var behavior = typeof(splittag[2]) !== "undefined" ? splittag[2] : "";
            var renderer = typeof(splittag[3]) !== "undefined" ? splittag[3] : "";
            var replacement = "<span contenteditable=\"false\" class=\"datalynx-tag\" data-datalynx-field=\"" + field +
                                             "\" data-datalynx-behavior=\"" + behavior +
                                             "\" data-datalynx-renderer=\"" + renderer +
                                             "\">" + field + "</span>";
            newcontent = newcontent.replace(tag, replacement);
        }
        editor.setHTML(newcontent);
        editor.ancestor().ancestor().siblings().item(0).setHTML(newcontent);
    });

    var behaviorselect = Y.Node.create('<select></select>');
    behaviorselect.appendChild(Y.Node.create('<option value="">-</option>'));
    for (var key in behaviors) {
        if (behaviors.hasOwnProperty(key)) {
            behaviorselect.appendChild(Y.Node.create('<option value="' + behaviors[key] + '">' + behaviors[key] + '</option>'));
        }
    }

    var config = {
        draggable : false,
        modal : false,
        closeButton : true,
        width : '240px'
    };

    var dialog = M.mod_datalynx.tag_manager.dialog = new M.core.dialogue(config);
    var hide = false;

    Y.one("body").on("click", function (event) {
        if (hide) {
            dialog.hide();
        }
        hide = true;
    });

    dialog.on("click", function (event) {
        hide = false;
    });

    behaviorselect.on("valuechange", function (event) {
        var value = behaviorselect.get("value");
        var targetid = dialog.get("target");
        Y.one("#" + targetid).setAttribute("data-datalynx-behavior", value);
    });

    Y.all("span.datalynx-tag").each(function (span) {
        span.on("click", function (event) {
            dialog.set('headerContent', span.getAttribute("data-datalynx-field"));
            dialog.set('bodyContent', behaviorselect);
            behaviorselect.set("value", span.getAttribute("data-datalynx-behavior"));
            dialog.set('target', span.get("id"));
            dialog.show();
            dialog.set('align', {node: span, points: [Y.WidgetPositionAlign.TL, Y.WidgetPositionAlign.BL]});
            hide = false;
        });
    });
    Y.all("#region-main textarea").on("valuechange", function (event) {
        Y.log(event.target.get('innerHTML'));
    });
    Y.one("#region-main form").on("submit", M.mod_datalynx.tag_manager.remove_tag_spans, null, Y);
}

/**
 *
 * @param event DOMEventFacade
 * @param Y YUI
 */
M.mod_datalynx.tag_manager.remove_tag_spans = function(event, Y) {
    // return;
    var editors = Y.all("body.jsenabled div.editor_atto_content_wrap > div");
    editors.each(function(editor) {
        var oldcontent = editor.getHTML();
        var newcontent = oldcontent;
        var spans = editor.all("span.datalynx-tag");
        spans.each(function(span) {
            var field = span.getAttribute("data-datalynx-field");
            var behavior = span.getAttribute("data-datalynx-behavior");
            var renderer = span.getAttribute("data-datalynx-renderer");
            var replacement = "[[" + field;
            if ((behavior !== "")) {
                replacement += "|" + behavior;
            }
            if ((renderer !== "")) {
                replacement += "|" + renderer;
            }
            replacement += "]]";
            newcontent = newcontent.replace(span.get('outerHTML'), replacement);
        });
        editor.setHTML(newcontent);
        var textarea = editor.ancestor().ancestor().siblings().item(0);
        textarea.set('value', newcontent);
        textarea.simulate('change');
    });
}






M.mod_datalynx.behaviors_helper = {};

M.mod_datalynx.behaviors_helper.toggle_image = function (img) {
    var src = img.get("src");
    if (src.search("-enabled") !== -1) {
        src = src.replace("-enabled", "-n");
    } else {
        src = src.replace("-n", "-enabled");
    }
    img.set("src", src);
}

M.mod_datalynx.behaviors_helper.event_handler = function (event, Y) {
    var img = event.target;
    var behaviorid = img.getAttribute('data-behavior-id');
    var permissionid = img.getAttribute('data-permission-id');
    var forproperty = img.getAttribute('data-for');
    var sesskey = Y.one('table.datalynx-behaviors').getAttribute('data-sesskey');

    var callback = {
        timeout : 5000,
        method : 'POST',
        data :  build_querystring({
            behaviorid : behaviorid,
            permissionid : permissionid,
            forproperty : forproperty,
            sesskey : sesskey
        }),
        on : {
            success : function (id, result) {
                Y.log("RAW JSON DATA: " + result.responseText);
                M.mod_datalynx.behaviors_helper.toggle_image(img);
            },

            failure : function (id, result) {
                Y.log("Async call failed!");
            }

        }
    };

    Y.io('behavior_edit_ajax.php', callback);
}

M.mod_datalynx.behaviors_helper.init = function(Y) {
    Y.all('table.datalynx-behaviors img[data-for]').on("click", M.mod_datalynx.behaviors_helper.event_handler, null, Y);
}
