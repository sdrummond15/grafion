/* jce - 2.6.9 | 2017-03-09 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2017 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(){var each=tinymce.each,JSON=tinymce.util.JSON,Node=tinymce.html.Node,VK=(tinymce.html.Entities,tinymce.VK),BACKSPACE=VK.BACKSPACE,DELETE=VK.DELETE;tinymce.create("tinymce.plugins.CodePlugin",{init:function(ed,url){function isCode(n){return ed.dom.is(n,".mceItemScript, .mceItemStyle, .mceItemPhp, .mcePhp")}var self=this;this.editor=ed,this.url=url,ed.onNodeChange.add(function(ed,cm,n,co){ed.dom.removeClass(ed.dom.select(".mceItemSelected"),"mceItemSelected"),isCode(n)&&ed.dom.addClass(n,"mceItemSelected")}),ed.onKeyDown.add(function(ed,e){e.keyCode!==BACKSPACE&&e.keyCode!==DELETE||self._removeCode(e)}),ed.onPreInit.add(function(){ed.getParam("code_style")&&(ed.schema.addValidElements("style[scoped|*]"),ed.schema.addValidChildren("+body[style]")),ed.getParam("code_script")&&(ed.settings.allow_script_urls=!0),ed.parser.addNodeFilter("script,style",function(nodes){for(var i=0,len=nodes.length;i<len;i++)self._serializeSpan(nodes[i])}),ed.parser.addNodeFilter("noscript",function(nodes){for(var i=0,len=nodes.length;i<len;i++)self._serializeNoScript(nodes[i])}),ed.serializer.addNodeFilter("script,div,span",function(nodes,name,args){for(var i=0,len=nodes.length;i<len;i++){var node=nodes[i];"span"==node.name&&/mceItemScript/.test(node.attr("class"))&&self._buildScript(node),"span"==node.name&&/mceItemStyle/.test(node.attr("class"))&&self._buildStyle(node),"div"==node.name&&"noscript"==node.attr("data-mce-type")&&self._buildNoScript(node)}})}),ed.onInit.add(function(){ed.theme&&ed.theme.onResolveName&&ed.theme.onResolveName.add(function(theme,o){var cls=o.node.className;"span"===o.name&&/mceItemScript/.test(cls)&&(o.name="script"),"span"===o.name&&/mceItemStyle/.test(cls)&&(o.name="style"),"span"===o.name&&/mcePhp/.test(cls)&&(o.name="php")}),ed.settings.content_css!==!1&&ed.dom.loadCSS(url+"/css/content.css")}),ed.onBeforeSetContent.add(function(ed,o){/<(\?|script|style)/.test(o.content)&&(ed.getParam("code_script")||(o.content=o.content.replace(/<script[^>]*>([\s\S]*?)<\/script>/gi,"")),ed.getParam("code_style")||(o.content=o.content.replace(/<style[^>]*>([\s\S]*?)<\/style>/gi,"")),ed.getParam("code_php")||(o.content=o.content.replace(/<\?(php)?([\s\S]*?)\?>/gi,"")),o.content=o.content.replace(/\="([^"]+?)"/g,function(a,b){return b=b.replace(/<\?(php)?(.+?)\?>/gi,function(x,y,z){return"{php:start}"+ed.dom.encode(z)+"{php:end}"}),'="'+b+'"'}),/<textarea/.test(o.content)&&(o.content=o.content.replace(/<textarea([^>]*)>([\s\S]*?)<\/textarea>/gi,function(a,b,c){return c=c.replace(/<\?(php)?(.+?)\?>/gi,function(x,y,z){return"{php:start}"+ed.dom.encode(z)+"{php:end}"}),"<textarea"+b+">"+c+"</textarea>"})),o.content=o.content.replace(/<([^>]+)<\?(php)?(.+?)\?>([^>]*?)>/gi,function(a,b,c,d,e){return" "!==b.charAt(b.length)&&(b+=" "),"<"+b+'data-mce-php="'+d+'" '+e+">"}),o.content=o.content.replace(/<\?(php)?([\s\S]+?)\?>/gi,'<span class="mcePhp" data-mce-type="php"><!--$2--> </span>'),o.content=o.content.replace(/<script([^>]+)><\/script>/gi,"<script$1> </script>"),o.content=o.content.replace(/<(script|style)([^>]*)>/gi,function(a,b,c){if(c.indexOf("data-mce-type")===-1)if(c.indexOf("type")===-1){var type="script"===b?"javascript":"css";c+=' data-mce-type="text/'+type+'"'}else c=c.replace(/type="([^"]+)"/i,'data-mce-type="$1"');return"<"+b+c+">"}))}),ed.onPostProcess.add(function(ed,o){o.get&&(/(mcePhp|data-mce-php|\{php:start\})/.test(o.content)&&(o.content=o.content.replace(/\{php:\s?start\}([^\{]+)\{php:\s?end\}/g,function(a,b){return"<?php"+ed.dom.decode(b)+"?>"}),o.content=o.content.replace(/<textarea([^>]*)>([\s\S]*?)<\/textarea>/gi,function(a,b,c){return/&lt;\?php/.test(c)&&(c=ed.dom.decode(c)),"<textarea"+b+">"+c+"</textarea>"}),o.content=o.content.replace(/data-mce-php="([^"]+?)"/g,function(a,b){return"<?php"+ed.dom.decode(b)+"?>"}),o.content=o.content.replace(/<span class="mcePhp"><!--([\s\S]*?)-->(&nbsp;|\u00a0)?<\/span>/g,function(a,b,c){return"<?php"+ed.dom.decode(b)+"?>"})),o.content=o.content.replace(/<(script|style)([^>]*)>/gi,function(a,b,c){return c=c.replace(/\s?data-mce-type="[^"]+"/gi,""),"<"+b+c+">"}))})},_removeCode:function(e){var ed=this.editor,s=ed.selection,n=s.getNode();ed.dom.is(n,".mceItemScript, .mceItemStyle, .mceItemPhp, .mcePhp")&&(ed.undoManager.add(),ed.dom.remove(n),e&&e.preventDefault())},_convertCurlyCode:function(content){content=content.replace(/\{([\w]+)\b([^\}]*)\}([\s\S]+?)\{\/\1\}/,'<div class="mceItemCurlyCode" data-mce-type="code-item">{$1$2}$3{/$1}</div>'),content=content.replace(/\{([^\}]+)\}/,'<span class="mceItemCurlyCode" data-mce-type="code-item">{$1}</span>')},_buildScript:function(n){var v,node,text,p,self=this,ed=this.editor;if(n.parent)return n.firstChild&&(v=n.firstChild.value),p=JSON.parse(n.attr("data-mce-json"))||{},p.type=n.attr("data-mce-type")||p.type||"text/javascript",node=new Node("script",1),v&&(v=tinymce.trim(v),v&&(text=new Node("#text",3),text.raw=!0,ed.getParam("code_cdata",!0)&&"text/javascript"===p.type&&(v="// <![CDATA[\n"+self._clean(tinymce.trim(v))+"\n// ]]>"),text.value=v,node.append(text))),each(p,function(v,k){"type"===k&&(v=v.replace(/mce-/,"")),node.attr(k,v)}),node.attr("data-mce-type",p.type),n.replace(node),!0},_buildStyle:function(n){var v,node,text,p,self=this,ed=this.editor;if(n.parent)return n.firstChild&&(v=n.firstChild.value),p=JSON.parse(n.attr("data-mce-json"))||{},p.type||(p.type="text/css"),node=new Node("style",1),v&&(v=tinymce.trim(v),v&&(text=new Node("#text",3),text.raw=!0,ed.getParam("code_cdata",!0)&&(v="<!--\n"+self._clean(tinymce.trim(v))+"\n-->"),text.value=v,node.append(text))),"head"===n.parent.name?p.scoped=null:p.scoped="scoped",each(p,function(v,k){"type"===k&&(v=v.replace(/mce-/,"")),node.attr(k,v)}),node.attr("data-mce-type",p.type),n.replace(node),!0},_buildNoScript:function(n){var p,node;this.editor;if(n.parent)return p=JSON.parse(n.attr("data-mce-json"))||{},node=new Node("noscript",1),each(p,function(v,k){node.attr(k,v)}),n.wrap(node),n.unwrap(),!0},_serializeSpan:function(n){var v,ed=this.editor,p=(ed.dom,{});if(n.parent){each(n.attributes,function(at){at.name.indexOf("data-mce-")===-1&&(p[at.name]=at.value)});var span=new Node("span",1);if(span.attr("class","mceItem"+this._ucfirst(n.name)),span.attr("data-mce-json",JSON.serialize(p)),span.attr("data-mce-type",n.attr("data-mce-type")||p.type),v=n.firstChild?n.firstChild.value:"",v.length){var text=new Node("#comment",8);text.value=this._clean(v),span.append(text)}span.append(new tinymce.html.Node("#text",3)).value=" ",n.replace(span)}},_serializeNoScript:function(n){var ed=this.editor,p=(ed.dom,{});if(n.parent){each(n.attributes,function(at){"type"!=at.name&&(p[at.name]=at.value)});var div=new Node("div",1);div.attr("data-mce-json",JSON.serialize(p)),div.attr("data-mce-type",n.name),n.wrap(div),n.unwrap()}},_ucfirst:function(s){return s.charAt(0).toUpperCase()+s.substring(1)},_clean:function(s){return s=s.replace(/(\/\/\s+<!\[CDATA\[)/gi,"\n"),s=s.replace(/(<!--\[CDATA\[|\]\]-->)/gi,"\n"),s=s.replace(/^[\r\n]*|[\r\n]*$/g,""),s=s.replace(/^\s*(\/\/\s*<!--|\/\/\s*<!\[CDATA\[|<!--|<!\[CDATA\[)[\r\n]*/gi,""),s=s.replace(/\s*(\/\/\s*\]\]>|\/\/\s*-->|\]\]>|-->|\]\]-->)\s*$/g,"")}}),tinymce.PluginManager.add("code",tinymce.plugins.CodePlugin)}();