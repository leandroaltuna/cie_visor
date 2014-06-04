
//function KMLObj(title,desc,op,fid){this.title=title;this.description=escape(desc);this.marks=[];this.folders=[];this.groundOverlays=[];this.open=op;this.folderid=fid;};if(typeof console==="undefined"||typeof console.log==="undefined"){console={};console.log=function(){};};function Lance$(mid){return document.getElementById(mid);};var topwin=self;var G=google.maps;function GeoXml(myvar,map,url,opts){this.myvar=myvar;this.opts=opts||{};this.mb=new MessageBox(map,this,"mb",this.opts.messagebox);this.map=map;this.url=url;if(typeof url=="string"){this.urls=[url];}else{this.urls=url;};this.mb.style=this.opts.messagestyle||{backgroundColor:"silver"};this.alwayspop=this.opts.alwaysinfopop||false;this.veryquiet=this.opts.veryquiet||false;this.quiet=this.opts.quiet||false;this.titlestyle=this.opts.titlestyle||'style = "font-family: arial, sans-serif;font-size: medium;font-weight:bold;"';this.descstyle=this.opts.descstyle||'style = "font-family: arial, sans-serif;font-size: small;padding-bottom:.7em;"';if(this.opts.directionstyle&&typeof this.opts.directionstyle!="undefined"){this.directionstyle=this.opts.directionstyle;}else{this.directionstyle='style="font-family: arial, sans-serif;font-size: small;padding-left: 1px;padding-top: 1px;padding-right: 4px;"';};this.sidebarfn=this.opts.sidebarfn||GeoXml.addSidebar;this.pointlabelopacity=this.opts.pointlabelopacity||100;this.polylabelopacity=this.opts.polylabelopacity||100;this.hilite=this.opts.hilite||{color:"#aaffff",opacity:0.3,textcolor:"#000000"};this.latestsidebar="";this.forcefoldersopen=false;if(typeof this.opts.allfoldersopen!="undefined"){this.forcefoldersopen=this.opts.allfoldersopen;};this.dohilite=false;if(typeof this.opts.dohilite!="undefined"&&this.opts.dohilite==true){this.dohilite=true;};this.clickablepolys=true;this.zoomHere=15;if(typeof this.opts.zoomhere=="number"){this.zoomHere=this.opts.zoomhere;};if(typeof this.opts.clickablepolys=="boolean"){this.clickablepolys=this.opts.clickablepolys;};this.clickablemarkers=true;if(typeof this.opts.clickablemarkers=="boolean"){this.clickablemarkers=this.opts.clickablemarkers;};this.opts.singleInfoWindow=true;this.clickablelines=true;if(typeof this.opts.clickablelines=="boolean"){this.clickablelines=this.opts.clickablelines;};if(typeof this.opts.nolegend!="undefined"){this.nolegend=true;};if(typeof this.opts.preloadHTML=="undefined"){this.opts.preloadHTML=true;};this.sidebariconheight=16;if(typeof this.opts.sidebariconheight=="number"){this.sidebariconheight=this.opts.sidebariconheight;};this.sidebarsnippet=false;if(typeof this.opts.sidebarsnippet=="boolean"){this.sidebarsnippet=this.opts.sidebarsnippet;};this.hideall=false;if(this.opts.hideall){this.hideall=this.opts.hideall;};if(this.opts.markerpane&&typeof this.opts.markerpane!="undefined"){this.markerpane=this.opts.markerpane;}else{var div=document.createElement("div");div.style.border="";div.style.position="absolute";div.style.padding="0px";div.style.margin="0px";div.style.fontSize="0px";div.zIndex=1001;this.markerpane=div;this.markerpaneOnMap=false;};var c=map.getDiv();c.style.fontSize="0px";if(typeof proxy!="undefined"){this.proxy=proxy;};if(!this.proxy&&typeof getcapproxy!="undefined"){if(fixUrlEnd){getcapproxy=fixUrlEnd(getcapproxy);}};this.publishdirectory="http://www.microimages.com/ogc/tntmap/";topwin=top;try{topname=top.title;}catch(err){topwin=self;};if(topwin.publishdirectory){this.publishdirectory=topwin.publishdirectory;};if(opts.publishdirectory){this.publishdirectory=opts.publishdirectory;};if(topwin.standalone){this.publishdirectory="";};this.kmlicon=this.publishdirectory+"images/ge.png";this.docicon=this.publishdirectory+"images/ge.png";this.docclosedicon=this.publishdirectory+"images/geclosed.png";this.foldericon=this.publishdirectory+"images/folder.png";this.folderclosedicon=this.publishdirectory+"images/folderclosed.png";this.gmlicon=this.publishdirectory+"images/geo.gif";this.rssicon=this.publishdirectory+"images/rssb.png";this.globalicon=this.publishdirectory+"images/geo.gif";this.WMSICON="<img src=\""+this.publishdirectory+"images/geo.gif\" style=\"border:none\" />";GeoXml.WMSICON=this.WMSICON;this.baseLayers=[];this.bounds=new google.maps.LatLngBounds();this.style={width:2,opacity:0.75,fillopacity:0.4};this.style.color=this.randomColor();this.style.fillcolor=this.randomColor();this.iwwidth=this.opts.iwwidth||400;this.maxiwwidth=this.opts.maxiwwidth||0;this.iwheight=this.opts.iwheight||0;this.lastMarker={};this.verySmall=0.0000001;this.progress=0;this.ZoomFactor=2;this.NumLevels=18;this.maxtitlewidth=0;this.styles=[];this.currdeschead="";this.jsdocs=[];this.jsonmarks=[];this.polyset=[];this.polygons=[];this.polylines=[];this.multibounds=[];this.overlayman=new OverlayManager(map,this);this.overlayman.rowHeight=20;if(this.opts.sidebarid){this.basesidebar=this.opts.sidebarid;};this.kml=[new KMLObj("GeoXML","",true,0)];this.overlayman.folders.push([]);this.overlayman.subfolders.push([]);this.overlayman.folderhtml.push([]);this.overlayman.folderhtmlast.push(0);this.overlayman.folderBounds.push(new google.maps.LatLngBounds());this.wmscount=0;this.unnamedpath="un-named path";this.unnamedplace="un-named place";this.unnamedarea="un-named area";};GeoXml.prototype.setOpacity=function(opacity){this.opts.overrideOpacity=opacity;for(var m=0;m<this.overlayman.markers.length;m++){var marker=this.overlayman.markers[m];if(marker.getPaths){this.overlayman.markers[m].fillOpacity=opacity;this.overlayman.markers[m].setOptions({fillOpacity:opacity});}else{if(marker.getPath){this.overlayman.markers[m].strokeOpacity=opacity;this.overlayman.markers[m].setOptions({strokeOpacity:opacity});}}}};GeoXml.stripHTML=function(s){return(s.replace(/(<([^>]+)>)/ig,""));};GeoXml.prototype.showIt=function(str,h,w){var features="status=yes,resizable=yes,toolbar=0,height="+h+",width="+h+",scrollbars=yes";var myWin;if(topwin.widget){alert(str);this.mb.showMess(str);}else{myWin=window.open("","_blank",features);myWin.document.open("text/xml");myWin.document.write(str);myWin.document.close();}};GeoXml.prototype.clear=function(idx){for(var m=0;m<this.overlayman.markers.length;m++){this.overlayman.RemoveMarker(this.overlayman.markers[m]);}this.kml=[new KMLObj("GeoXML","",true,0)];this.maxtitlewidth=0;this.styles=[];this.jsdocs=[];this.jsonmarks=[];this.polyset=[];this.polylines=[];this.multibounds=[];this.bounds=new google.maps.LatLngBounds();this.overlayman=new OverlayManager(this.map,this);this.overlayman.rowHeight=20;if(typeof this.basesidebar!="undefined"&&this.basesidebar!=""){Lance$(this.basesidebar).innerHTML="";}this.overlayman.folders.push([]);this.overlayman.subfolders.push([]);this.overlayman.folderhtml.push([]);this.overlayman.folderhtmlast.push(0);this.overlayman.byname=[];this.overlayman.byid=[];this.overlayman.folderBounds.push(new google.maps.LatLngBounds());this.wmscount=0;this.currdeschead="";};GeoXml.prototype.createMarkerJSON=function(item,idx){var that=this;var style=that.makeIcon(style,item.href);var point=new google.maps.LatLng(item.y,item.x);that.overlayman.folderBounds[idx].extend(point);that.bounds.extend(point);if(item.shadow){style.shadow=item.shadow;}else{style.shadow=null;}if(!!that.opts.createmarker){that.opts.createmarker(point,item.title,unescape(item.description),null,idx,style,item.visibility,item.id,item.href,item.snip);}else{that.createMarker(point,item.title,unescape(item.description),null,idx,style,item.visibility,item.id,item.href,item.snip);}};GeoXml.prototype.createMarker=function(point,name,desc,styleid,idx,instyle,visible,kml_id,markerurl,snip){var myvar=this.myvar;var icon;var shadow;var href;var scale=1;if(instyle&&instyle.scale){scale=instyle.scale;}var bicon;if(instyle){bicon=instyle;}else{var bicon=new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon40.png",new google.maps.Size(32*scale,32*scale),new google.maps.Point(0,0),new google.maps.Point(16*scale,16*scale),new google.maps.Size(32*scale,32*scale));}if(this.opts.baseicon){bicon.size=this.opts.baseicon.size;bicon.origin=this.opts.baseicon.orgin;bicon.anchor=this.opts.baseicon.anchor;if(scale){if(instyle){bicon.scaledSize=instyle.scaledSize;}}else{bicon.scaledSize=this.opts.baseicon.scaledSize;}scale=1;}icon=bicon;if(this.opts.iconFromDescription){var text=desc;var pattern=new RegExp("<\\s*img","ig");var result;var pattern2=/src\s*=\s*[\'\"]/;var pattern3=/[\'\"]/;while((result=pattern.exec(text))!=null){var stuff=text.substr(result.index);var result2=pattern2.exec(stuff);if(result2!=null){stuff=stuff.substr(result2.index+result2[0].length);var result3=pattern3.exec(stuff);if(result3!=null){var imageUrl=stuff.substr(0,result3.index);href=imageUrl;}}}shadow=null;if(!href){href="http://maps.google.com/mapfiles/kml/pal3/icon40.png";}icon=bicon;icon.url=href;}else{href="http://maps.google.com/mapfiles/kml/pal3/icon40";if(instyle==null||typeof instyle=="undefined"){shadow=href+"s.png";href+=".png";if(this.opts.baseicon){href=this.opts.baseicon.url;}}else{if(instyle.url){href=instyle.url;}}icon=bicon;icon.url=href;}var iwoptions=this.opts.iwoptions||{};var markeroptions=this.opts.markeroptions||{};var icontype=this.opts.icontype||"style";if(icontype=="style"){var blark=this.styles[styleid];if(!!blark){icon=bicon;icon.url=blark.url;icon.anchor=blark.anchor;href=blark.url;}}markeroptions.icon=icon;var ta=document.createElement("textarea");ta.innerHTML=name;markeroptions.title=ta.value;var start=icon.url.substring(0,4);if(start.match(/^http/i)){}else{if(typeof this.url=="string"){var slash=this.url.lastIndexOf("/");var changed=false;var subchanged=false;var newurl;if(slash!=-1){newurl=this.url.substring(0,slash);changed=true;slash=0;}while(slash!=-1&&icon.url.match(/^..\//)){slash=newurl.lastIndexOf("/");icon.url=icon.url.substring(3);if(slash!=-1){newurl=newurl.substring(0,slash);}changed=true;}if(newurl!=""&&icon.url.match(/^..\//)){newurl="";icon.url=icon.url.substring(3);}if(newurl==""){markeroptions.icon.url=icon.url;}else{markeroptions.icon.url=newurl+"/"+icon.url;}}}markeroptions.clickable=true;markeroptions.pane=this.markerpane;markeroptions.position=point;var m=new google.maps.Marker(markeroptions);m.title=name;m.id=kml_id;var obj={"type":"point","title":name,"description":escape(desc),"href":href,"shadow":shadow,"visibility":visible,"x":point.x,"y":point.y,"id":m.id};this.kml[idx].marks.push(obj);if(this.opts.pointlabelclass){var l=new ELabel(point,name,this.opts.pointlabelclass,this.opts.pointlabeloffset,this.pointlabelopacity,true);m.label=l;l.setMap(this.map);}var html,html1,html2,html3,html4;var awidth=this.iwwidth;if(desc.length*8<awidth){awidth=desc.length*8;}if(awidth<name.length*10){awidth=name.length*10;}if(this.maxiwwidth&&awidth>this.maxiwwidth){awidth=this.maxiwwidth;}html="<div style = 'width:"+awidth+"px'>"+"<h1 "+this.titlestyle+">"+name+"</h1>";if(name!=desc){html+="<div "+this.descstyle+">"+desc+"</div>";}var html1;if(this.opts.directions){html1=html+'<div '+this.directionstyle+'>'+'Get Directions: <a href="#" onclick="google.maps.event.trigger('+this.myvar+'.lastMarker,\'click2\');return false;">To Here</a> - '+'<a href="#" onclick="google.maps.event.trigger('+this.myvar+'.lastMarker,\'click3\');return false;">From Here</a><br>'+'<a href="#" onclick="google.maps.event.trigger('+this.myvar+'.lastMarker,\'click4\');return false;">Search nearby</a> | <a href="#" onclick="'+this.myvar+'.map.setCenter(new google.maps.LatLng('+point.lat()+','+point.lng()+'),'+this.zoomHere+');return false;">Zoom Here</a></div>';html2=html+'<div '+this.directionstyle+'>'+'Get Directions: To here - '+'<a href="#" onclick="google.maps.event.trigger('+this.myvar+'.lastMarker,\'click3\');return false;">From Here</a><br>'+'Start address:<form action="http://maps.google.com/maps" method="get" target="_blank">'+'<input type="text" SIZE=35 MAXLENGTH=80 name="saddr" id="saddr" value="" />'+'<INPUT value="Go" TYPE="SUBMIT">'+'<input type="hidden" name="daddr" value="'+point.lat()+','+point.lng()+"("+name+")"+'"/>'+'<br><a href="#" onclick="google.maps.event.trigger('+this.myvar+'.lastMarker,\'click1\');return false;">&#171; Back</a>| <a href="#" onclick="'+this.myvar+'.map.setCenter(new google.maps.LatLng('+point.lat()+','+point.lng()+'),'+this.zoomHere+');return false;">Zoom Here</a></div>';html3=html+'<div '+this.directionstyle+'>'+'Get Directions: <a href="#" onclick="google.maps.event.trigger('+this.myvar+'.lastMarker,\'click2\');return false;">To Here</a> - '+'From Here<br>'+'End address:<form action="http://maps.google.com/maps" method="get"" target="_blank">'+'<input type="text" SIZE=35 MAXLENGTH=80 name="daddr" id="daddr" value="" />'+'<INPUT value="Go" TYPE="SUBMIT">'+'<input type="hidden" name="saddr" value="'+point.lat()+','+point.lng()+"("+name+")"+'"/>'+'<br><a href="#" onclick="google.maps.event.trigger('+this.myvar+'.lastMarker,\'click1\');return false;">&#171; Back</a> | <a href="#" onclick="'+this.myvar+'.map.setCenter(new google.maps.LatLng('+point.lat()+','+point.lng()+'),'+this.zoomHere+');return false;">Zoom Here</a></div>';html4=html+'<div '+this.directionstyle+'>'+'Search nearby: e.g. "pizza"<br>'+'<form action="http://maps.google.com/maps" method="get"" target="_blank">'+'<input type="text" SIZE=35 MAXLENGTH=80 name="q" id="q" value="" />'+'<INPUT value="Go" TYPE="SUBMIT">'+'<input type="hidden" name="near" value="'+name+' @'+point.lat()+','+point.lng()+'"/>'+'<br><a href="#" onclick="google.maps.event.trigger('+this.myvar+'.lastMarker,\'click1\');return false;">&#171; Back</a> | <a href="#" onclick="'+this.myvar+'.map.setCenter(new google.maps.LatLng('+point.lat()+','+point.lng()+'),'+this.zoomHere+');return false;">Zoom Here</a></div>';google.maps.event.addListener(m,"click1",function(){var infoWindowOptions={content:html1+"</div></div>",pixelOffset:new google.maps.Size(0,2)};if(this.geoxml.maxiwwidth){infoWindowOptions.maxWidth=this.geoxml.maxiwwidth;}m.infoWindow.setOptions(infoWindowOptions);});google.maps.event.addListener(m,"click2",function(){var infoWindowOptions={content:html2+"</div></div>",pixelOffset:new google.maps.Size(0,2)};if(this.geoxml.maxiwwidth){infoWindowOptions.maxWidth=this.geoxml.maxiwwidth;}m.infoWindow.setOptions(infoWindowOptions);});google.maps.event.addListener(m,"click3",function(){var infoWindowOptions={content:html3+"</div></div>",pixelOffset:new google.maps.Size(0,2)};if(this.geoxml.maxiwwidth){infoWindowOptions.maxWidth=this.geoxml.maxiwwidth;}m.infoWindow.setOptions(infoWindowOptions);});google.maps.event.addListener(m,"click4",function(){var infoWindowOptions={content:html4+"</div></div>",pixelOffset:new google.maps.Size(0,2)};if(this.geoxml.maxiwwidth){infoWindowOptions.maxWidth=this.geoxml.maxiwwidth;}m.infoWindow.setOptions(infoWindowOptions);});}else{html1=html+"</div>";}if(this.opts.markerfollowlinks){if(markerurl&&typeof markerurl=="string"){if(markerurl!=''){m.url=markerurl;google.maps.event.addListener(m,"click",function(){window.open(m.url,'_blank');try{eval(myvar+".lastMarker = m");}catch(err){}});}}}else{if(this.clickablemarkers){var geoxml=this;var infoWindowOptions={content:html1+"</div>",pixelOffset:new google.maps.Size(0,2)};if(geoxml.maxiwwidth){infoWindowOptions.maxWidth=geoxml.maxiwwidth;}m.infoWindow=new google.maps.InfoWindow(infoWindowOptions);var parserOptions=this.opts;google.maps.event.addListener(m,'click',function(){if(!!geoxml.opts.singleInfoWindow){if(!!geoxml.lastMarker&&!!geoxml.lastMarker.infoWindow){geoxml.lastMarker.infoWindow.close();}geoxml.lastMarker=m;}this.infoWindow.open(this.map,this);});}}if(this.opts.domouseover){m.mess=html1+"</div>";m.geoxml=this;google.maps.event.addListener(m,"mouseover",function(point){if(!point){point=m.getPosition();}m.geoxml.mb.showMess(m.mess,5000);});}var nhtml="";var parm;if(this.opts.sidebarid){var folderid=this.myvar+"_folder"+idx;var n=this.overlayman.markers.length;var blob="&nbsp;<img style=\"vertical-align:text-top;padding:0;margin:0\" height=\""+this.sidebariconheight+"\" border=\"0\" src=\""+href+"\">&nbsp;";if(this.sidebarsnippet){var desc2=GeoXml.stripHTML(desc);desc2=desc2.substring(0,40);}else{desc2='';}parm=this.myvar+"$$$"+name+"$$$marker$$$"+n+"$$$"+blob+"$$$"+visible+"$$$null$$$"+desc2;m.sidebarid=this.myvar+"sb"+n;m.hilite=this.hilite;m.geoxml=this;m.onOver=function(){if(this.geoxml.dohilite){var bar=Lance$(this.sidebarid);if(bar&&typeof bar!="undefined"){bar.style.backgroundColor=this.hilite.color;bar.style.color=this.hilite.textcolor;}}};m.onOut=function(){if(this.geoxml.dohilite){var bar=Lance$(this.sidebarid);if(bar&&typeof bar!="undefined"){bar.style.background="none";bar.style.color="";}}};google.maps.event.addListener(m,"mouseover",m.onOver);google.maps.event.addListener(m,"mouseout",m.onOut);}if(!!this.opts.addmarker){this.opts.addmarker(m,name,idx,parm,visible);}else{this.overlayman.AddMarker(m,name,idx,parm,visible);}};GeoXml.getDescription=function(node){var sub="";var n=0;var cn;if(typeof XMLSerializer!="undefined"){var serializer=new XMLSerializer();for(;n<node.childNodes.length;n++){cn=serializer.serializeToString(node.childNodes.item(n));sub+=cn;}}else{for(;n<node.childNodes.length;n++){cn=node.childNodes.item(n);sub+=cn.xml;}}var s=sub.replace("<![CDATA[","");var u=s.replace("]]>","");u=u.replace(/\&amp;/g,"&");u=u.replace(/\&lt;/g,"<");u=u.replace(/\&quot;/g,'"');u=u.replace(/\&apos;/g,"'");u=u.replace(/\&gt;/g,">");return u;};GeoXml.prototype.processLine=function(pnum,lnum,idx){var that=this;var op=this.polylines[pnum];var line=op.lines[lnum];var obj;var p;if(!line){return;}var thismap=this.map;var iwoptions=this.opts.iwoptions||{};obj={points:line,color:op.color,weight:op.width,opacity:op.opacity,type:"line",id:op.id};p=new google.maps.Polyline({map:this.map,path:line,strokeColor:op.color,strokeWeight:op.width,strokeOpactiy:op.opacity});p.bounds=op.pbounds;p.id=op.id;var nhtml="";var n=this.overlayman.markers.length;this.polylines[pnum].lineidx.push(n);var parm;var awidth=this.iwwidth;var desc=op.description;if(desc.length*8<awidth){awidth=desc.length*8;}if(awidth<op.name.length*12){awidth=op.name.length*12;}var html="<div style='font-weight: bold; font-size: medium; margin-bottom: 0em;'>"+op.name;html+="</div>"+"<div style='font-family: Arial, sans-serif;font-size: small;width:"+awidth+"px;'>"+desc+"</div>";if(lnum==0){if(this.opts.sidebarid){var blob='&nbsp;&nbsp;<span style=";border-left:'+op.width+'px solid '+op.color+';">&nbsp;</span> ';if(this.sidebarsnippet){var desc2=GeoXml.stripHTML(desc);desc2=desc2.substring(0,20);}else{desc2='';}parm=this.myvar+"$$$"+op.name+"$$$polyline$$$"+n+"$$$"+blob+"$$$"+op.visibility+"$$$"+pnum+"$$$"+desc2;this.latestsidebar=this.myvar+"sb"+n;}}if(lnum<op.lines.length){setTimeout(this.myvar+".processLine("+pnum+","+(lnum+1)+",'"+idx+"');",15);if(this.opts.sidebarid){p.sidebar=this.latestsidebar;}}if(this.opts.domouseover){p.mess=html;}p.title=op.name;p.geoxml=this;p.strokeColor=op.color;p.strokeWeight=op.width;p.strokeOpacity=op.opacity;p.hilite=this.hilite;p.mytitle=p.title;p.map=this.map;p.idx=pnum;var position=p.getPosition();if(this.clickablelines){var infoWindowOptions={content:html,pixelOffset:new google.maps.Size(0,2),position:position};if(this.maxiwwidth){infoWindowOptions.maxWidth=this.maxiwwidth;}p.infoWindow=new google.maps.InfoWindow(infoWindowOptions);}p.onOver=function(){var pline=this.geoxml.polylines[this.idx];if(this.geoxml.dohilite){if(this.hidden!=true){for(var l=0;l<pline.lineidx.length;l++){var mark=this.geoxml.overlayman.markers[pline.lineidx[l]];mark.realColor=mark.strokeColor;mark.realOpacity=mark.strokeOpacity;mark.setOptions({strokeColor:this.geoxml.hilite.color,strokeOpacity:this.geoxml.hilite.opacity});}}if(this.sidebar){Lance$(this.sidebar).style.backgroundColor=this.hilite.color;Lance$(this.sidebar).style.color=this.hilite.textcolor;}}if(this.mess){this.geoxml.mb.showMess(this.mess,5000);}else{this.title="Click for more information about "+this.mytitle;}};p.onOut=function(){if(this.geoxml.dohilite){var pline=this.geoxml.polylines[this.idx];if(this.hidden!=true){for(var l=0;l<pline.lineidx.length;l++){var mark=this.geoxml.overlayman.markers[pline.lineidx[l]];mark.setOptions({strokeColor:p.realColor,strokeOpacity:p.realOpacity});}}if(this.sidebar){Lance$(this.sidebar).style.background="none";Lance$(this.sidebar).style.color="";}}this.geoxml.mb.hideMess();};google.maps.event.addListener(p,"mouseout",p.onOut);google.maps.event.addListener(p,"mouseover",p.onOver);google.maps.event.addListener(p,"click",function(point){var dest;var doit=false;if(!point){doit=true;dest=p.getPosition();}else{dest=point.latLng;}if(this.geoxml.clickablelines||doit){p.infoWindow.setPosition(dest);p.infoWindow.open(this.map);}});obj.name=op.name;obj.description=escape(op.description);if(that.hideall){op.visibility=false;}obj.visibility=op.visibility;this.kml[idx].marks.push(obj);this.overlayman.AddMarker(p,op.name,idx,parm,op.visibility);};GeoXml.prototype.createPolyline=function(lines,color,width,opacity,pbounds,name,desc,idx,visible,kml_id){var p={};if(!color){p.color=this.randomColor();}else{p.color=color;}if(!opacity){p.opacity=0.45;}else{p.opacity=opacity;}if(!width){p.width=4;}else{p.width=width;}p.idx=idx;p.visibility=visible;if(this.hideall){p.visibility=false;}p.name=name;p.description=desc;p.lines=lines;p.lineidx=[];p.id=kml_id;this.polylines.push(p);setTimeout(this.myvar+".processLine("+(this.polylines.length-1)+",0,'"+idx+"');",15);};GeoXml.prototype.processPLine=function(pnum,linenum,idx){var p=this.polyset[pnum];var line=p.lines[linenum];var obj={};if(line&&line.length){p.obj.polylines.push(line);}if(linenum==p.lines.length-1){this.finishPolygon(p.obj,idx);}else{setTimeout(this.myvar+".processPLine("+pnum+","+(linenum+1)+",'"+idx+"');",5);}};GeoXml.prototype.finishPolygon=function(op,idx){op.type="polygon";this.finishPolygonJSON(op,idx,false);};GeoXml.prototype.finishPolygonJSON=function(op,idx,updatebound,lastpoly){var that=this;var iwoptions=that.opts.iwoptions||{};if(typeof op.visibility=="undefined"){op.visibility=true;}if(that.hideall){op.visibility=false;}var desc=unescape(op.description);op.opacity=op.fillOpacity;var p={};p.paths=op.polylines;var html="<p style='font-family: Arial, sans-serif; font-weight: bold; font-size: medium; margin-bottom: 0em; margin-top:0em'>"+op.name+"</p>";if(desc!=op.name){html+="<div style='font-family: Arial, sans-serif;font-size: small;width:"+this.iwwidth+"px;'>"+desc+"</div>";}var newgeom=(lastpoly!="p_"+op.name);if(newgeom&&this.opts.sidebarid){this.latestsidebar=that.myvar+"sb"+this.overlayman.markers.length;}else{this.latestsidebar="";}if(that.opts.domouseover){p.mess=html;}if(op.strokeColor){p.strokeColor=op.strokeColor;}else{p.strokeColor=op.color;}if(op.outline){if(op.strokeWeight){p.strokeWeight=op.strokeWeight;}else{p.strokeWeight=op.width;}p.strokeOpacity=op.strokeOpacity;}else{p.strokeWeight=0;p.strokeOpacity=0;}p.hilite=that.hilite;p.fillOpacity=op.opacity;p.fillColor=op.color.toString();var polygon=new google.maps.Polygon(p);polygon.mb=that.mb;if(that.domouseover){polygon.mess=html;}polygon.geoxml=that;polygon.title=op.name;polygon.id=op.id;var n=this.overlayman.markers.length;if(newgeom){that.multibounds.push(new google.maps.LatLngBounds());that.polygons.push([]);}var len=that.multibounds.length-1;that.multibounds[len].extend(polygon.getBounds().getSouthWest());that.multibounds[len].extend(polygon.getBounds().getNorthEast());that.polygons[that.polygons.length-1].push(n);polygon.polyindex=that.polygons.length-1;polygon.geomindex=len;polygon.sidebarid=this.latestsidebar;var infoWindowOptions={content:html,pixelOffset:new google.maps.Size(0,2),position:polygon.getCenter()};if(this.maxiwwidth){infoWindowOptions.maxWidth=this.maxiwwidth;}polygon.infoWindow=new google.maps.InfoWindow(infoWindowOptions);polygon.onOver=function(){if(this.geoxml.dohilite){if(this.sidebarid){var bar=Lance$(this.sidebarid);if(!!bar){bar.style.backgroundColor=this.hilite.color;bar.style.color=this.hilite.textcolor;}}if(this.geoxml.clickablepolys){var poly=this.geoxml.polygons[this.polyindex];if(poly&&this.hidden!=true){for(var pg=0;pg<poly.length;pg++){var mark=this.geoxml.overlayman.markers[poly[pg]];var color;mark.realColor=p.fillColor;mark.realOpacity=p.fillOpacity;mark.setOptions({fillColor:this.hilite.color,fillOpacity:this.hilite.opacity});}}}}if(this.mess){polygon.geoxml.mb.showMess(this.mess,5000);}};polygon.onOut=function(){if(this.geoxml.dohilite){if(this.sidebarid){var bar=Lance$(this.sidebarid);if(!!bar){bar.style.background="none";bar.style.color="";}}var poly;if(this.geoxml.clickablepolys){poly=this.geoxml.polygons[this.polyindex];}if(poly&&this.hidden!=true){for(var pg=0;pg<poly.length;pg++){var mark=this.geoxml.overlayman.markers[poly[pg]];var color=mark.realColor.toString();var opacity=mark.realOpacity.toString();mark.setOptions({fillColor:color,fillOpacity:opacity});}}}if(this.mess){this.geoxml.mb.hideMess();}};polygon.onClick=function(point){if(!point&&this.geoxml.alwayspop){bounds=this.geoxml.multibounds[this.geomindex];this.geoxml.map.fitBounds(bounds);point={};point.latLng=bounds.getCenter();}if(!point){this.geoxml.mb.showMess("Zooming to "+polygon.title,3000);bounds=this.geoxml.multibounds[this.geomindex];this.geoxml.map.fitBounds(bounds);}else{if(this.geoxml.clickablepolys){if(!!this.geoxml.opts.singleInfoWindow){if(!!this.geoxml.lastMarker&&!!this.geoxml.lastMarker.infoWindow){this.geoxml.lastMarker.infoWindow.close();}this.geoxml.lastMarker=this;}this.infoWindow.setPosition(point.latLng);this.infoWindow.open(this.geoxml.map);}}};google.maps.event.addListener(polygon,"click",polygon.onClick);google.maps.event.addListener(polygon,"mouseout",polygon.onOut);google.maps.event.addListener(polygon,"mouseover",polygon.onOver);op.description=escape(desc);this.kml[idx].marks.push(op);polygon.setMap(this.map);var bounds;if(this.opts.polylabelclass&&newgeom){var epoint=p.getBounds().getCenter();var off=this.opts.polylabeloffset;if(!off){off=new google.maps.Size(0,0);}off.x=-(op.name.length*6);var l=new ELabel(epoint," "+op.name+" ",this.opts.polylabelclass,off,this.polylabelopacity,true);polygon.label=l;l.setMap(this.map);}var nhtml="";var parm;if(this.basesidebar&&newgeom){var folderid=this.myvar+"_folder"+idx;var blob="<span style=\"background-color:"+op.color+";border:2px solid "+p.strokeColor+";\">&nbsp;&nbsp;&nbsp;&nbsp;</span> ";if(this.sidebarsnippet){var desc2=GeoXml.stripHTML(desc);desc2=desc2.substring(0,20);}else{desc2='';}parm=this.myvar+"$$$"+op.name+"$$$polygon$$$"+n+"$$$"+blob+"$$$"+op.visibility+"$$$null$$$"+desc2;}if(updatebound){var ne=polygon.getBounds().getNorthEast();var sw=polygon.getBounds().getSouthWest();this.bounds.extend(ne);this.bounds.extend(sw);this.overlayman.folderBounds[idx].extend(sw);this.overlayman.folderBounds[idx].extend(ne);}this.overlayman.AddMarker(polygon,op.name,idx,parm,op.visibility);return op.name;};GeoXml.prototype.finishLineJSON=function(po,idx,lastlinename){var m;var that=this;var thismap=this.map;m=new google.maps.Polyline({path:po.points,strokeColor:po.color,strokeWeight:po.weight,strokeOpacity:po.opacity,clickable:this.clickablelines});m.mytitle=po.name;m.title=po.name;m.strokeColor=po.color;m.strokeOpacity=po.opacity;m.geoxml=this;m.hilite=this.hilite;var n=that.overlayman.markers.length;var lineisnew=false;var pnum;if(("l_"+po.name)!=lastlinename){lineisnew=true;that.polylines.push(po);pnum=that.polylines.length-1;that.polylines[pnum].lineidx=[];that.polylines[pnum].lineidx.push(n);that.latestsidebar=that.myvar+"sb"+n;}else{pnum=that.polylines.length-1;that.polylines[pnum].lineidx.push(n);}if(this.opts.basesidebar){m.sidebarid=that.latestsidebar;}m.onOver=function(){if(this.geoxml.dohilite){if(!!this.sidebarid){var bar=Lance$(this.sidebarid);if(bar&&typeof bar!="undefined"){bar.style.backgroundColor=this.hilite.color;}}this.realColor=this.strokeColor;if(m.hidden!=true){if(m&&typeof m!="undefined"){m.setOptions({strokeColor:this.hilite.color});}}}if(this.mess){this.geoxml.mb.showMess(this.mess,5000);}else{this.title="Click for more information about "+this.mytitle;}};m.onOut=function(){if(this.geoxml.dohilite){if(!!this.sidebarid){var bar=Lance$(this.sidebarid);if(bar&&typeof bar!="undefined"){bar.style.background="none";}}if(m.hidden!=true){if(m&&typeof m!="undefined"){m.setOptions({strokeColor:this.realColor});}}}if(this.mess){this.geoxml.mb.hideMess();}};google.maps.event.addListener(m,"mouseover",m.onOver);google.maps.event.addListener(m,"mouseover",m.onOut);var parm="";that.kml[idx].marks.push(po);var desc=unescape(po.description);var awidth=this.iwwidth;if(desc.length*8<awidth){awidth=desc.length*8;}if(awidth<po.name.length*12){awidth=po.name.length*12;}var html="<div style='font-family: Arial, sans-serif; font-weight: bold; font-size: medium; margin-bottom: 0em;'>"+po.name+"</div>";if(po.name!=desc){html+="<div style='font-family: Arial, sans-serif;font-size: small;width:"+awidth+"px'>"+desc+"</div>";}m.map=this.map;var infoWindowOptions={content:html,pixelOffset:new google.maps.Size(0,2),position:point};if(this.maxiwwidth){infoWindowOptions.maxWidth=this.maxiwwidth;}m.infoWindow=new google.maps.InfoWindow(infoWindowOptions);if(this.clickablelines){google.maps.event.addListener(m,"click",function(point){if(!point){point=m.getPosition();}this.infoWindow.open();});}if(that.basesidebar&&lineisnew){var blob='&nbsp;&nbsp;<span style=";border-left:'+po.weight+'px solid '+po.color+';">&nbsp;</span> ';if(typeof po.visibility=="undefined"){po.visibility=true;}if(this.sidebarsnippet){var desc2=GeoXml.stripHTML(desc);desc2=desc2.substring(0,20);}else{desc2='';}parm=that.myvar+"$$$"+po.name+"$$$polyline$$$"+n+"$$$"+blob+"$$$"+po.visibility+"$$$"+(that.polylines.length-1)+"$$$"+desc2;}var ne=m.getBounds().getNorthEast();var sw=m.getBounds().getSouthWest();that.bounds.extend(ne);that.bounds.extend(sw);that.overlayman.folderBounds[idx].extend(sw);that.overlayman.folderBounds[idx].extend(ne);that.overlayman.AddMarker(m,po.name,idx,parm,po.visibility);return(po.name);};GeoXml.prototype.handlePlaceObj=function(num,max,idx,lastlinename,depth){var that=this;var po=that.jsonmarks[num];var name=po.name;if(po.title){name=po.title;}if(name.length+depth>that.maxtitlewidth){that.maxtitlewidth=name.length+depth;}switch(po.type){case "polygon":lastlinename="p_"+that.finishPolygonJSON(po,idx,true,lastlinename);break;case "line":case "polyline":lastlinename="l_"+that.finishLineJSON(po,idx,lastlinename);break;case "point":that.createMarkerJSON(po,idx);lastlinename="";break;}if(num<max-1){var act=that.myvar+".handlePlaceObj("+(num+1)+","+max+","+idx+",\""+lastlinename+"\","+depth+");";document.status="processing "+name;setTimeout(act,1);}else{lastlinename="";if(num==that.jsonmarks.length-1){that.progress--;if(that.progress<=0){if(!that.opts.nozoom){that.map.fitBounds(that.bounds);}google.maps.event.trigger(that,"parsed");that.setFolders();if(!that.opts.sidebarid){that.mb.showMess("Finished Parsing",1000);that.ParseURL();}}}}};GeoXml.prototype.parseJSON=function(doc,title,latlon,desc,sbid){var that=this;that.overlayman.miStart=new Date();that.jsdocs=eval('('+doc+')');var bar=Lance$(that.basesidebar);if(bar){bar.style.display="";}that.recurseJSON(that.jsdocs[0],title,desc,that.basesidebar,0);};GeoXml.prototype.setFolders=function(){var that=this;var len=that.kml.length;for(var i=0;i<len;i++){var fid=that.kml[i].folderid;var fidstr=new String(fid);var fb=fidstr.replace("_folder","FB");var fi=Lance$(fb);var fob=Lance$(fid);if(fob!==null&&fid!=that.opts.sidebarid){if(!!that.kml[i].open){fob.style.display='block';}else{fob.style.display='none';if(fi.src==that.foldericon){fi.src=that.folderclosedicon;}if(fi.src==that.docicon){fi.src=that.docclosedicon;}}}}};GeoXml.prototype.recurseJSON=function(doc,title,desc,sbid,depth){var that=this;var polys=doc.marks;var name=doc.title;if(!sbid){sbid=0;}var description=unescape(doc.description);if(!description&&desc){description=desc;}var keepopen=that.forcefoldersopen;if(doc.open){keepopen=true;}var visible=true;if(typeof doc.visibility!="undefined"&&doc.visibility){visible=true;}if(that.hideall){visible=false;}var snippet=doc.snippet;var idx=that.overlayman.folders.length;if(!description){description=name;}var folderid;var icon;that.overlayman.folders.push([]);that.overlayman.subfolders.push([]);that.overlayman.folderhtml.push([]);that.overlayman.folderhtmlast.push(0);that.overlayman.folderBounds.push(new google.maps.LatLngBounds());that.kml.push(new KMLObj(title,description,keepopen));if((!depth&&(doc.folders&&doc.folders.length>1))||doc.marks.length){if(depth<2||doc.marks.length<1){icon=that.globalicon;}else{icon=that.foldericon;}folderid=that.createFolder(idx,name,sbid,icon,description,snippet,keepopen,visible);}else{folderid=sbid;}var parm,blob;var nhtml="";var html;var m;var num=that.jsonmarks.length;var max=num+polys.length;for(var p=0;p<polys.length;p++){var po=polys[p];that.jsonmarks.push(po);desc=unescape(po.description);m=null;if(that.opts.preloadHTML&&desc&&desc.match(/<(\s)*img/i)){var preload=document.createElement("span");preload.style.visibility="visible";preload.style.position="absolute";preload.style.left="-1200px";preload.style.top="-1200px";preload.style.zIndex=this.overlayman.markers.length;document.body.appendChild(preload);preload.innerHTML=desc;}}if(that.groundOverlays){}if(polys.length){that.handlePlaceObj(num,max,idx,null,depth);}var fc=0;var fid=0;if(typeof doc.folders!="undefined"){fc=doc.folders.lenth;for(var f=0;f<doc.folders.length;++f){var nextdoc=that.jsdocs[doc.folders[f]];fid=that.recurseJSON(nextdoc,nextdoc.title,nextdoc.description,folderid,(depth+1));that.overlayman.subfolders[idx].push(fid);that.overlayman.folderBounds[idx].extend(that.overlayman.folderBounds[fid].getSouthWest());that.overlayman.folderBounds[idx].extend(that.overlayman.folderBounds[fid].getNorthEast());if(fid!=idx){that.kml[idx].folders.push(fid);}}}if(fc||polys.length){that.bounds.extend(that.overlayman.folderBounds[idx].getSouthWest());that.bounds.extend(that.overlayman.folderBounds[idx].getNorthEast());}return idx;};GeoXml.prototype.createPolygon=function(lines,color,width,opacity,fillcolor,fillOpacity,pbounds,name,desc,folderid,visible,fill,outline,kml_id){var thismap=this.map;var p={};p.obj={"description":desc,"name":name};p.obj.polylines=[];p.obj.id=kml_id;p.obj.visibility=visible;p.obj.fill=fill;p.obj.outline=outline;p.fillcolor=fillcolor;p.obj.strokecolor=color;p.strokeOpacity=opacity;if(!color){p.strokeColor=this.style.color;}else{p.strokeColor=color;}if(!fillcolor){p.obj.color=this.randomColor();}else{p.obj.color=fillcolor;}if(!!opacity){p.obj.opacity=opacity;}else{p.obj.opacity=this.style.opacity;p.strokeOpacity=this.style.opacity;}if(!!fillOpacity){p.obj.fillOpacity=fillOpacity;}else{p.obj.fillOpacity=this.style.fillopacity;}if(!width){p.strokeWeight=this.style.width;}else{p.strokeWeight=width;}p.bounds=pbounds;p.lines=lines;p.sidebarid=this.opts.sidebarid;this.polyset.push(p);setTimeout(this.myvar+".processPLine("+(this.polyset.length-1)+",0,'"+folderid+"')",1);};GeoXml.prototype.toggleFolder=function(i){var f=Lance$(this.myvar+"_folder"+i);var tb=Lance$(this.myvar+"TB"+i);var folderimg=Lance$(this.myvar+'FB'+i);if(f.style.display=="none"){f.style.display="";if(tb){tb.style.fontWeight="normal";}if(folderimg.src==this.folderclosedicon){folderimg.src=this.foldericon;}if(folderimg.src==this.docclosedicon){folderimg.src=this.docicon;}}else{f.style.display="none";if(tb){tb.style.fontWeight="bold";}if(folderimg.src==this.foldericon){folderimg.src=this.folderclosedicon;}if(folderimg.src==this.docicon){folderimg.src=this.docclosedicon;}}};GeoXml.prototype.saveJSON=function(){if(topwin.standalone){var fpath=browseForSave("Select a directory to place your json file","JSON Data Files (*.js)|*.js|All Files (*.*)|*.*","JSON-DATA");if(typeof fpath!="undefined"){var jsonstr=JSON.stringify(this.kml);saveLocalFile(fpath+".js",jsonstr);}return;}if(typeof JSON!="undefined"){var jsonstr=JSON.stringify(this.kml);if(typeof serverBlessJSON!="undefined"){serverBlessJSON(escape(jsonstr),"MyKJSON");}else{this.showIt(jsonstr);}}else{var errmess="No JSON methods currently available";if(console){console.error(errmess);}else{alert(errmess);}}};GeoXml.prototype.hide=function(){this.contentToggle(1,false);this.overlayman.currentZoomLevel=-1;OverlayManager.Display(this.overlayman);};GeoXml.prototype.setMap=function(map){if(map){this.show();}else{this.hide();}};GeoXml.prototype.show=function(){this.contentToggle(1,true);this.overlayman.currentZoomLevel=-1;OverlayManager.Display(this.overlayman);};GeoXml.prototype.toggleContents=function(i,show){this.contentToggle(i,show);this.overlayman.currentZoomLevel=-1;OverlayManager.Display(this.overlayman);};GeoXml.prototype.contentToggle=function(i,show){var f=this.overlayman.folders[i];var cb;var j;var m;if(typeof f=="undefined"){this.mb.showMess("folder "+f+" not defined");return;}if(show){for(j=0;j<f.length;j++){this.overlayman.markers[f[j]].setMap(this.map);this.overlayman.markers[f[j]].onMap=true;if(this.basesidebar){cb=Lance$(this.myvar+''+f[j]+'CB');if(cb&&typeof cb!="undefined"){cb.checked=true;}}this.overlayman.markers[f[j]].hidden=false;}}else{for(j=0;j<f.length;j++){this.overlayman.markers[f[j]].hidden=true;this.overlayman.markers[f[j]].onMap=false;this.overlayman.markers[f[j]].setMap(null);if(this.basesidebar){cb=Lance$(this.myvar+''+f[j]+'CB');if(cb&&typeof cb!="undefined"){cb.checked=false;}}}}var sf=this.overlayman.subfolders[i];if(typeof sf!="undefined"){for(j=0;j<sf.length;j++){if(sf[j]!=i){if(this.basesidebar){cb=Lance$(this.myvar+''+sf[j]+'FCB');if(cb&&typeof cb!="undefined"){cb.checked=(!!show);}}this.contentToggle(sf[j],show);}}}};GeoXml.prototype.showHide=function(a,show,p){var m,i;if(a!==null){if(show){this.overlayman.markers[a].setMap(this.map);this.overlayman.markers[a].onMap=true;this.overlayman.markers[a].hidden=false;}else{this.overlayman.markers[a].setMap(null);this.overlayman.markers[a].onMap=false;this.overlayman.markers[a].hidden=true;}}else{var ms=this.polylines[p];if(show){for(i=0;i<ms.lineidx.length;i++){this.overlayman.markers[ms.lineidx[i]].setMap(this.map);this.overlayman.markers[ms.lineidx[i]].onMap=true;this.overlayman.markers[ms.lineidx[i]].hidden=false;}}else{for(i=0;i<ms.lineidx.length;i++){this.overlayman.markers[ms.lineidx[i]].setMap(null);this.overlayman.markers[ms.lineidx[i]].onMap=false;this.overlayman.markers[ms.lineidx[i]].hidden=true;}}}this.overlayman.currentZoomLevel=-1;OverlayManager.Display(this.overlayman,true);};GeoXml.prototype.toggleOff=function(a,show){if(show){this.overlayman.markers[a].setMap(this.map);this.overlayman.markers[a].hidden=false;}else{this.overlayman.markers[a].setMap(null);this.overlayman.markers[a].hidden=true;}if(this.labels.onMap){this.labels.setMap(null);this.labels.setMap(this.map);}};GeoXml.addSidebar=function(myvar,name,type,e,graphic,ckd,i,snippet){var check="checked";if(ckd=="false"){check="";}var h="";var mid=myvar+"sb"+e;if(snippet&&snippet!="undefined"){snippet="<br><span class='"+myvar+"snip'>"+snippet+"</span>";}else{snippet="";}switch(type){case "marker":h='<li id="'+mid+'" onmouseout="google.maps.event.trigger('+myvar+'.overlayman.markers['+e+'],\'mouseout\');" onmouseover="google.maps.event.trigger('+myvar+'.overlayman.markers['+e+'],\'mouseover\');" ><input id="'+myvar+''+e+'CB" type="checkbox" style="vertical-align:middle" '+check+' onclick="'+myvar+'.showHide('+e+',this.checked)"><a href="#" onclick="google.maps.event.trigger('+myvar+'.overlayman.markers['+e+'],\'click\');return false;">'+graphic+name+'</a>'+snippet+'</li>';break;case "polyline":h='<li id="'+mid+'"  onmouseout="'+myvar+'.overlayman.markers['+e+'].onOut();" onmouseover="'+myvar+'.overlayman.markers['+e+'].onOver();" ><input id="'+myvar+''+e+'CB" type="checkbox" '+check+' onclick="'+myvar+'.showHide(null,this.checked,'+i+')"><span style="margin-top:6px;"><a href="#" onclick="google.maps.event.trigger('+myvar+'.overlayman.markers['+e+'],\'click\');return false;">&nbsp;'+graphic+name+'</a></span>'+snippet+'</li>';break;case "polygon":h='<li id="'+mid+'"  onmouseout="'+myvar+'.overlayman.markers['+e+'].onOut();" onmouseover="'+myvar+'.overlayman.markers['+e+'].onOver();" ><input id="'+myvar+''+e+'CB" type="checkbox" '+check+' onclick="'+myvar+'.showHide('+e+',this.checked)"><span style="margin-top:6px;"><a href="#" onclick="google.maps.event.trigger('+myvar+'.overlayman.markers['+e+'],\'click\');return false;">&nbsp;'+graphic+name+'</a></span></nobr>'+snippet+'</li>';break;case "groundoverlay":h='<li id="'+mid+'"><input id="'+myvar+''+e+'CB" type="checkbox" '+check+' onclick="'+myvar+'.showHide('+e+',this.checked)"><span style="margin-top:6px;"><a href="#" onclick="google.maps.event.trigger('+myvar+'.overlayman.markers['+e+'],\'zoomto\');return false;">&nbsp;'+graphic+name+'</a></span>'+snippet+'</li>';break;case "tiledoverlay":h='<li id="'+mid+'"><nobr><input id="'+myvar+''+e+'CB" type="checkbox" '+check+' onclick="'+myvar+'.toggleOff('+e+',this.checked)"><span style="margin-top:6px;"><a href="#" oncontextMenu="'+myvar+'.upgradeLayer('+i+');return false;" onclick="google.maps.event.trigger('+myvar+'.overlayman.markers['+e+'],\'zoomto\');return false;">'+GeoXml.WMSICON+'&nbsp;'+name+'</a><br />'+graphic+'</span>'+snippet+'</li>';break;}return h;};GeoXml.addDropdown=function(myvar,name,type,i,graphic){return '<option value="'+i+'">'+name+'</option>';};GeoXml.prototype.parse=function(titles){var that=this;var names=[];if(typeof titles!="undefined"){if(typeof titles!="string"){names=titles;}else{names=titles.split(",");}}that.progress+=that.urls.length;for(var u=0;u<that.urls.length;u++){var title=names[u];if(typeof title=="undefined"||!title||title=="null"){var segs=that.urls[u].split("/");title=segs[segs.length-1];}that.mb.showMess("Loading "+title);var re=/\.js$/i;if(that.urls[u].search(re)!=-1){that.loadJSONUrl(this.urls[u],title);}else{that.loadXMLUrl(this.urls[u],title);}}};GeoXml.prototype.removeAll=function(){this.allRemoved=true;for(var a=0;a<this.overlayman.markers.length;a++){this.toggleOff(a,false);}};GeoXml.prototype.addAll=function(){this.allRemoved=false;for(var a=0;a<this.overlayman.markers.length;a++){this.toggleOff(a,true);}};GeoXml.prototype.processString=function(doc,titles,latlon){var names=[];if(titles){names=titles.split(",");}if(typeof doc=="string"){this.docs=[doc];}else{this.docs=doc;}this.progress+=this.docs.length;for(var u=0;u<this.docs.length;u++){this.mb.showMess("Processing "+names[u]);this.processing(this.parseXML(this.docs[u]),names[u],latlon);}};GeoXml.prototype.parseXML=function(data){var xml,tmp;try{if(window.DOMParser){tmp=new DOMParser();xml=tmp.parseFromString(data,"text/xml");}else{xml=new ActiveXObject("Microsoft.XMLDOM");xml.async="false";xml.loadXML(data);}}catch(e){xml=undefined;}if(!xml||!xml.documentElement||xml.getElementsByTagName("parsererror").length){var errmess="Invalid XML: "+data;if(console){console.error(errmess);}else{alert(errmess);}}return xml;};GeoXml.prototype.getText=function(elems){var ret="",elem;if(!elems||!elems.childNodes)return ret;elems=elems.childNodes;for(var i=0;elems[i];i++){elem=elems[i];if(elem.nodeType===3||elem.nodeType===4){ret+=elem.nodeValue;}else if(elem.nodeType!==8){ret+=this.getText(elem.childNodes);}}return ret;};GeoXml.prototype.processXML=function(doc,titles,latlon){var names=[];if(typeof titles!="undefined"){if(typeof titles=="string"){names=titles.split(",");}else{names=titles;}}if(typeof doc=="array"){this.docs=doc;}else{this.docs=[doc];}this.progress+=this.docs.length;for(var u=0;u<this.docs.length;u++){var mess="Processing "+names[u];this.mb.showMess(mess);this.processing(this.docs[u],names[u],latlon);}};GeoXml.prototype.makeDescription=function(elem,title,depth){var d="";var len=elem.childNodes.length;var ln=0;var val;while(len--){var subelem=elem.childNodes.item(ln);var nn=subelem.nodeName;var sec=nn.split(":");var base="";if(sec.length>1){base=sec[1];}else{base=nn;}if(base.match(/^(lat|long|visible|visibility|boundedBy|StyleMap|drawOrder|styleUrl|posList|coordinates|Style|Polygon|LineString|Point|LookAt|drawOrder|Envelope|Box|MultiPolygon|where|guid)/)){this.currdeschead="";}else{if(base.match(/#text|the_geom|SchemaData|ExtendedData|#cdata-section/)){}else{if(base.match(/Snippet/i)){}else{if(base.match(/SimpleData/)){base=subelem.getAttribute("name");}this.currdeschead="<b>&nbsp;"+base+"&nbsp;</b> :";}}val=subelem.nodeValue;if(nn=="link"){var href=subelem.getAttribute("href");if(href&&href!='null'){val='<a target="_blank" title="'+href+'" href="'+href+'">Link</a>';}else{if(val&&val!="null"){val='<a target="_blank" title="'+val+'" href="'+val+'">Link</a>';}}this.currdeschead="Link to Article";}if(base.match(/(\S)*(name|title)(\S)*/i)){if(!val){val=this.getText(subelem)}title=val;if(val&&typeof title!="undefined"&&title.length>this.maxtitlewidth){this.maxtitlewidth=title.length;}this.currdeschead="";}else{if(val&&val.match(/(\S)+/)){if(val.match(/^http:\/\/|^https:\/\//i)){val='<a target="_blank" " href="'+val+'">[go]</a>';}else{if(!title||title==""){title=val;if(val&&typeof title!="undefined"&&title.length>this.maxtitlewidth){this.maxtitlewidth=title.length;}}}}if(val&&val!="null"&&val!='  '&&val!=' '&&(val.match(/(\s|\t|\n)*/)!=true)){if(this.currdeschead!=''){d+='<br />';}d+=this.currdeschead+""+val+"";this.currdeschead="";}if(subelem.childNodes.length){var con=this.makeDescription(subelem,title,depth+1);if(con){d+=con.desc;if(typeof con.title!="undefined"&&con.title){title=con.title;if(title.length>this.maxtitlewidth){this.maxtitlewidth=title.length+depth;}}}}}}ln++;}var dc={};dc.desc=d;dc.title=title;return dc;};GeoXml.prototype.randomColor=function(){var color="#";for(var i=0;i<6;i++){var idx=parseInt(Math.random()*16,10)+1;color+=idx.toString(16);}return(color.substring(0,7));};GeoXml.prototype.handleGeomark=function(mark,idx,trans){var that=this;var desc,title,name,style;title="";desc="";var styleid=0;var lat,lon;var visible=true;if(this.hideall){visible=false;}var fill=true;var outline=true;var width,color,opacity,fillOpacity,fillColor;var cor=[];var node,nv,cm;var coords="";var poslist=[];var point_count=0;var box_count=0;var line_count=0;var poly_count=0;var p;var points=[];var cc,l;var pbounds=new google.maps.LatLngBounds();var coordset=mark.getElementsByTagName("coordinates");if(coordset.length<1){coordset=mark.getElementsByTagName("gml:coordinates");}if(coordset.length<1){coordset=[];poslist=mark.getElementsByTagName("gml:posList");if(poslist.length<1){poslist=mark.getElementsByTagName("posList");}for(l=0;l<poslist.length;l++){coords=" ";cor=this.getText(poslist.item(l)).split(' ');if(that.isWFS){for(cc=0;cc<(cor.length-1);cc++){if(cor[cc]&&cor[cc]!=" "&&!isNaN(parseFloat(cor[cc]))){coords+=""+parseFloat(cor[cc])+","+parseFloat(cor[cc+1]);coords+=" ";cc++;}}}else{for(cc=0;cc<(cor.length-1);cc++){if(cor[cc]&&cor[cc]!=" "&&!isNaN(parseFloat(cor[cc]))){coords+=""+parseFloat(cor[cc+1])+","+parseFloat(cor[cc]);coords+=" ";cc++;}}}if(coords){if(poslist.item(l).parentNode&&(poslist.item(l).parentNode.nodeName=="gml:LineString")){line_count++;}else{poly_count++;}cm="<coordinates>"+coords+"</coordinates>";node=this.parseXML(cm);if(coordset.push){coordset.push(node);}}}var pos=mark.getElementsByTagName("gml:pos");if(pos.length<1){pos=mark.getElementsByTagName("gml:pos");}if(pos.length){for(p=0;p<pos.length;p++){nv=this.getText(pos.item(p));cor=nv.split(" ");if(!that.isWFS){node=this.parseXML("<coordinates>"+cor[1]+","+cor[0]+"</coordinates>");}else{node=this.parseXML("<coordinates>"+cor[0]+","+cor[1]+"</coordinates>");}if(coordset.push){coordset.push(node);}}}}var newcoords=false;point_count=0;box_count=0;line_count=0;poly_count=0;var dc=that.makeDescription(mark,"");desc="<div id='currentwindow' style='overflow:auto;height:"+this.iwheight+"px' >"+dc.desc+"</div> ";if(!name&&dc.title){name=dc.title;if(name.length>this.maxtitlewidth){this.maxtitlewidth=name.length;}}if(newcoords&&typeof lat!="undefined"){coordset.push(""+lon+","+lat);}var lines=[];var polygonlines=[];var point;var skiprender;var bits;for(var c=0;c<coordset.length;c++){skiprender=false;if(coordset[c].parentNode&&(coordset[c].parentNode.nodeName=="gml:Box"||coordset[c].parentNode.nodeName=="gml:Envelope")){skiprender=true;}coords=this.getText(coordset[c]);coords+=" ";coords=coords.replace(/\s+/g," ");coords=coords.replace(/^ /,"");coords=coords.replace(/, /,",");var path=coords.split(" ");if(path.length==1||path[1]==""){bits=path[0].split(",");point=new google.maps.LatLng(parseFloat(bits[1])/trans.ys-trans.y,parseFloat(bits[0])/trans.xs-trans.x);that.bounds.extend(point);if(!skiprender){if(typeof name=="undefined"){name=that.unnamedplace;}if(!!that.opts.createmarker){that.opts.createmarker(point,name,desc,styleid,idx,null,visible);}else{that.createMarker(point,name,desc,styleid,idx,null,visible);}}}else{for(p=0;p<path.length-1;p++){bits=path[p].split(",");point=new google.maps.LatLng(parseFloat(bits[1])/trans.ys-trans.y,parseFloat(bits[0])/trans.xs-trans.x);points.push(point);pbounds.extend(point);}that.bounds.extend(pbounds.getNorthEast());that.bounds.extend(pbounds.getSouthWest());if(!skiprender){lines.push(points);}}}if(!lines||lines.length<1){return;}var linestring=mark.getElementsByTagName("LineString");if(linestring.length<1){linestring=mark.getElementsByTagName("gml:LineString");}if(linestring.length||line_count>0){if(!!style){width=style.strokeWeight;color=style.strokeColor;opacity=style.strokeOpacity;}else{width=this.style.width;color=this.style.color;opacity=this.style.opacity;}if(typeof name=="undefined"){name=that.unnamedpath;}if(!!that.opts.createpolyline){that.opts.createpolyline(lines,color,width,opacity,pbounds,name,desc,idx,visible);}else{that.createPolyline(lines,color,width,opacity,pbounds,name,desc,idx,visible);}}var polygons=mark.getElementsByTagName("Polygon");if(polygons.length<1){polygons=mark.getElementsByTagName("gml:Polygon");}if(polygons.length||poly_count>0){if(!!style){width=style.strokeWeight;color=style.strokeColor;opacity=style.strokeOpacity;fillOpacity=style.fillOpacity;fillColor=style.fillColor;fill=style.fill;outline=style.outline;}fillColor=this.randomColor();color=this.randomColor();fill=1;outline=1;if(typeof name=="undefined"){name=that.unnamedarea;}if(!!that.opts.createpolygon){that.opts.createpolygon(lines,color,width,opacity,fillColor,fillOpacity,pbounds,name,desc,idx,visible,fill,outline);}else{that.createPolygon(lines,color,width,opacity,fillColor,fillOpacity,pbounds,name,desc,idx,visible,fill,outline);}}};GeoXml.prototype.handlePlacemark=function(mark,idx,depth,fullstyle){var mgeoms=mark.getElementsByTagName("MultiGeometry");if(mgeoms.length<1){this.handlePlacemarkGeometry(mark,mark,idx,depth,fullstyle);}else{var p;var pts=mgeoms[0].getElementsByTagName("Point");for(p=0;p<pts.length;p++){this.handlePlacemarkGeometry(mark,pts[p],idx,depth,fullstyle);}var lines=mgeoms[0].getElementsByTagName("LineString");for(p=0;p<lines.length;p++){this.handlePlacemarkGeometry(mark,lines[p],idx,depth,fullstyle);}var polygons=mgeoms[0].getElementsByTagName("Polygon");for(p=0;p<polygons.length;p++){this.handlePlacemarkGeometry(mark,polygons[p],idx,depth,fullstyle);}}};GeoXml.prototype.handlePlacemarkGeometry=function(mark,geom,idx,depth,fullstyle){var that=this;var desc,title,name,style;title="";desc="";var styleid=0;var lat,lon;var visible=true;if(this.hideall){visible=false;}var newcoords=false;var outline;var opacity;var fillcolor;var fillOpacity;var color;var width;var pbounds;var fill;var points=[];var lines=[];var bits=[];var point;var cor,node,cm,nv;var l,pos,p,j,k,cc;var kml_id=mark.getAttribute("id");var point_count=0;var box_count=0;var line_count=0;var poly_count=0;var coords="";var markerurl="";var snippet="";l=mark.getAttribute("lat");if(typeof l!="undefined"){lat=l;}l=mark.getAttribute("lon");if(typeof l!="undefined"){newcoords=true;lon=l;}l=0;var coordset=geom.getElementsByTagName("coordinates");if(coordset.length<1){coordset=geom.getElementsByTagName("gml:coordinates");}if(coordset.length<1){coordset=[];var poslist=geom.getElementsByTagName("gml:posList");if(!poslist.length){poslist=geom.getElementsByTagName("posList");}for(l=0;l<poslist.length;l++){coords=" ";var plitem=this.getText(poslist.item(l))+" ";plitem=plitem.replace(/(\s)+/g,' ');cor=plitem.split(' ');if(that.isWFS){for(cc=0;cc<(cor.length-1);cc++){if(!isNaN(parseFloat(cor[cc]))&&!isNaN(parseFloat(cor[cc+1]))){coords+=""+parseFloat(cor[cc])+","+parseFloat(cor[cc+1]);coords+=" ";cc++;}}}else{for(cc=0;cc<(cor.length-1);cc++){if(!isNaN(parseFloat(cor[cc]))&&!isNaN(parseFloat(cor[cc+1]))){coords+=""+parseFloat(cor[cc+1])+","+parseFloat(cor[cc]);coords+=" ";cc++;}}}if(coords){if(poslist.item(l).parentNode&&(poslist.item(l).parentNode.nodeName=="gml:LineString")){line_count++;}else{poly_count++;}cm="<coordinates>"+coords+"</coordinates>";node=this.parseXML(cm);if(coordset.push){coordset.push(node);}}}pos=geom.getElementsByTagName("gml:pos");if(pos.length<1){pos=geom.getElementsByTagName("gml:pos");}if(pos.length){for(p=0;p<pos.length;p++){nv=this.getText(pos.item(p))+" ";cor=nv.split(' ');if(!that.isWFS){node=this.parseXML("<coordinates>"+cor[1]+","+cor[0]+"</coordinates>");}else{node=this.parseXML("<coordinates>"+cor[0]+","+cor[1]+"</coordinates>");}if(coordset.push){coordset.push(node);}}}}for(var ln=0;ln<mark.childNodes.length;ln++){var nn=mark.childNodes.item(ln).nodeName;nv=this.getText(mark.childNodes.item(ln));var ns=nn.split(":");var base;if(ns.length>1){base=ns[1].toLowerCase();}else{base=ns[0].toLowerCase();}var processme=false;switch(base){case "name":name=nv;if(name.length+depth>this.maxtitlewidth){this.maxtitlewidth=name.length+depth;}break;case "title":title=nv;if(title.length+depth>this.maxtitlewidth){this.maxtitlewidth=title.length+depth;}break;case "desc":case "description":desc=GeoXml.getDescription(mark.childNodes.item(ln));if(!desc){desc=nv;}var srcs=desc.match(/src=\"(.*)\"/i);if(srcs){for(var sr=1;sr<srcs.length;sr++){if(srcs[sr].match(/^http/)){}else{if(this.url.match(/^http/)){var slash=this.url.lastIndexOf("/");if(slash!=-1){newsrc=this.url.substring(0,slash)+"/"+srcs[sr];desc=desc.replace(srcs[sr],newsrc);}}else{var slash=this.url.lastIndexOf("/");if(slash!=-1){newsrc=this.url.substring(0,slash)+"/"+srcs[sr];desc=desc.replace(srcs[sr],newsrc);}}}}}if(that.opts.preloadHTML&&desc&&desc.match(/<(\s)*img/i)){var preload=document.createElement("span");preload.style.visibility="visible";preload.style.position="absolute";preload.style.left="-1200px";preload.style.top="-1200px";preload.style.zIndex=this.overlayman.markers.length;document.body.appendChild(preload);preload.innerHTML=desc;}if(desc.match(/^http:\/\//i)){var flink=desc.split(/(\s)+/);if(flink.length>1){desc="<a href=\""+flink[0]+"\">"+flink[0]+"</a>";for(var i=1;i<flink.length;i++){desc+=flink[i];}}else{desc="<a href=\""+desc+"\">"+desc+"</a>";}}break;case "visibility":if(nv=="0"){visible=false;}break;case "Snippet":case "snippet":snippet=nv;break;case "href":case "link":if(nv){desc+="<p><a target='_blank' href='"+nv+"'>link</a></p>";markerurl=nv;}else{var href=mark.childNodes.item(ln).getAttribute("href");if(href){var imtype=mark.childNodes.item(ln).getAttribute("type");if(imtype&&imtype.match(/image/)){desc+="<img style=\"width:256px\" src='"+href+"' />";}markerurl=href;}}break;case "author":desc+="<p><b>author:</b>"+nv+"</p>";break;case "time":desc+="<p><b>time:</b>"+nv+"</p>";break;case "lat":lat=nv;break;case "long":lon=nv;newcoords=true;break;case "box":box_count++;processme=true;break;case "styleurl":styleid=nv;var currstyle=style;style=that.styles[styleid];break;case "stylemap":var found=false;node=mark.childNodes.item(ln);for(j=0;(j<node.childNodes.length&&!found);j++){var pair=node.childNodes[j];for(k=0;(k<pair.childNodes.length&&!found);k++){var pn=pair.childNodes[k].nodeName;if(pn=="Style"){style=this.handleStyle(pair.childNodes[k],null,style);found=true;}}}break;case "Style":case "style":styleid=null;style=this.handleStyle(mark.childNodes.item(ln),null,style);break;}if(processme){cor=nv.split(' ');coords="";for(cc=0;cc<(cor.length-1);cc++){if(!isNaN(parseFloat(cor[cc]))&&!isNaN(parseFloat(cor[cc+1]))){coords+=""+parseFloat(cor[cc+1])+","+parseFloat(cor[cc]);coords+=" ";cc++;}}if(coords!=""){node=this.parseXML("<coordinates>"+coords+"</coordinates>");if(coordset.push){coordset.push(node);}}}}if(!name&&title){name=title;}if(fullstyle){alert("overriding style with"+fullstyle.url);style=fullstyle;}var iwheightstr;if(this.iwheight!=0){iwheightstr="height:"+this.iwheight+"px";}if(typeof desc=="undefined"||!desc||this.opts.makedescription){var dc=that.makeDescription(mark,"");desc="<div id='currentpopup' style='overflow:auto;"+iwheightstr+"' >"+dc.desc+"</div> ";if(!name&&dc.title){name=dc.title;if((name.length+depth)>this.maxtitlewidth){this.maxtitlewidth=name.length+depth;}}}else{if(this.iwheight){desc="<div id='currentpopup' style='overflow:auto;"+iwheightstr+"' >"+desc+"</div> ";}}if(newcoords&&typeof lat!="undefined"){if(lat){var cs=""+lon+","+lat+" ";node=this.parseXML("<coordinates>"+cs+"</coordinates>");coordset.push(node);}}for(var c=0;c<coordset.length;c++){var skiprender=false;if(coordset[c].parentNode&&(coordset[c].parentNode.nodeName.match(/^(gml:Box|gml:Envelope)/i))){skiprender=true;}coords=this.getText(coordset[c]);coords+=" ";coords=coords.replace(/(\s)+/g," ");coords=coords.replace(/^ /,"");coords=coords.replace(/, /,",");var path=coords.split(" ");if(path.length==1||path[1]==""){bits=path[0].split(",");point=new google.maps.LatLng(parseFloat(bits[1]),parseFloat(bits[0]));this.overlayman.folderBounds[idx].extend(point);if(!skiprender){if(typeof name=="undefined"){name=that.unnamedplace;}if(!!that.opts.createmarker){that.opts.createmarker(point,name,desc,styleid,idx,style,visible,kml_id,markerurl,snippet);}else{that.createMarker(point,name,desc,styleid,idx,style,visible,kml_id,markerurl,snippet);}}}else{points=[];pbounds=new google.maps.LatLngBounds();for(p=0;p<path.length-1;p++){bits=path[p].split(",");point=new google.maps.LatLng(parseFloat(bits[1]),parseFloat(bits[0]));points.push(point);pbounds.extend(point);}this.overlayman.folderBounds[idx].extend(pbounds.getSouthWest());this.overlayman.folderBounds[idx].extend(pbounds.getNorthEast());this.bounds.extend(pbounds.getSouthWest());this.bounds.extend(pbounds.getNorthEast());if(!skiprender){lines.push(points);}}}if(!lines||lines.length<1){return;}var nn=coordset[0].parentNode.nodeName;if(nn.match(/^(LineString)/i)||nn.match(/^(gml:LineString)/i)){if(!!style){width=style.strokeWeight;color=style.strokeColor;opacity=style.strokeOpacity;}else{width=this.style.width;color=this.style.color;opacity=this.style.opacity;}if(typeof name=="undefined"){name=unnamedpath;}if(!!that.opts.createpolyline){that.opts.createpolyline(lines,color,width,opacity,pbounds,name,desc,idx,visible,kml_id);}else{that.createPolyline(lines,color,width,opacity,pbounds,name,desc,idx,visible,kml_id);}}if(nn.match(/^(LinearRing)/i) || nn.match(/^(gml:LinearRing)/i)){if(!!style){width=style.strokeWeight;color=style.strokeColor;opacity=style.strokeOpacity;fillOpacity=style.fillOpacity;fillcolor=style.fillColor;fill=style.fill;outline=style.outline;}if(typeof fill=="undefined"){fill=0;}if(typeof color=="undefined"){color=this.style.color;}if(typeof fillcolor=="undefined"){fillcolor=this.randomColor();}if(typeof name=="undefined"){name=that.unnamedarea;}if(!!that.opts.createpolygon){that.opts.createpolygon(lines,color,width,opacity,fillcolor,fillOpacity,pbounds,name,desc,idx,visible,fill,outline,kml_id);}else{that.createPolygon(lines,color,width,opacity,fillcolor,fillOpacity,pbounds,name,desc,idx,visible,fill,outline,kml_id);}}};GeoXml.prototype.makeIcon=function(currstyle,href,myscale,hotspot){var scale=1;var tempstyle;var anchorscale={x:0.5,y:0.5};if(hotspot){var xu=hotspot.getAttribute("xunits");var x=hotspot.getAttribute("x");var thtwox=32;var thtwoy=32;if(this.opts.baseicon){thtwox=this.opts.baseicon.size.width;thtwoy=this.opts.baseicon.size.height;}if(xu=="fraction"){anchorscale.x=parseFloat(x);}else{anchorscale.x=parseFloat(x)/thtwox;}var yu=hotspot.getAttribute("yunits");var y=hotspot.getAttribute("y");if(yu=="fraction"){anchorscale.y=1-parseFloat(y);}else{anchorscale.y=1-parseFloat(y)/thtwoy;}}if(typeof myscale=="number"){scale=myscale;}if(!!href){}else{if(!!currstyle){if(!!currstyle.url){href=currstyle.url;scale=currstyle.scale;}}else{href="http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png";tempstyle=new google.maps.MarkerImage(href,new google.maps.Size(16*scale,16*scale));tempstyle.origin=new google.maps.Point(0*scale,0*scale);tempstyle.anchor=new google.maps.Point(16*scale*anchorscale.x,16*scale*anchorscale.y);}}if(!!href){if(!!this.opts.baseicon){var bicon=this.opts.baseicon;tempstyle=new google.maps.MarkerImage(href,this.opts.baseicon.size);tempstyle.origin=this.opts.baseicon.origin;tempstyle.anchor=new google.maps.Point(this.opts.baseicon.size.width*scale*anchorscale.x,this.opts.baseicon.size.height*scale*anchorscale.y);if(this.opts.baseicon.scaledSize){tempstyle.scaledSize=this.opts.baseicon.scaledSize;}else{var w=bicon.size.width*scale;var h=bicon.size.height*scale;tempstyle.scaledSize=new google.maps.Size(w,h);}tempstyle.url=href;}else{tempstyle=new google.maps.MarkerImage(href,new google.maps.Size(32,32),new google.maps.Point(0,0),new google.maps.Point(32*scale*anchorscale.x,32*scale*anchorscale.y),new google.maps.Size(32*scale,32*scale));if(this.opts.printgif){var bits=href.split("/");var gif=bits[bits.length-1];gif=this.opts.printgifpath+gif.replace(/.png/i,".gif");tempstyle.printImage=gif;tempstyle.mozPrintImage=gif;}if(!!this.opts.noshadow){tempstyle.shadow="";}else{if(href.indexOf("/red.png")>-1||href.indexOf("/blue.png")>-1||href.indexOf("/green.png")>-1||href.indexOf("/yellow.png")>-1||href.indexOf("/lightblue.png")>-1||href.indexOf("/purple.png")>-1||href.indexOf("/orange.png")>-1||href.indexOf("/pink.png")>-1||href.indexOf("-dot.png")>-1){tempstyle.shadow="http://maps.google.com/mapfiles/ms/icons/msmarker.shadow.png";}else if(href.indexOf("-pushpin.png")>-1||href.indexOf("/pause.png")>-1||href.indexOf("/go.png")>-1||href.indexOf("/stop.png")>-1){tempstyle.shadow="http://maps.google.com/mapfiles/ms/icons/pushpin_shadow.png";}else{var shadow=href.replace(".png",".shadow.png");if(shadow.indexOf(".jpg")){shadow="";}tempstyle.shadow=shadow;}}}}if(this.opts.noshadow){tempstyle.shadow="";}return tempstyle;};GeoXml.prototype.handleStyle=function(style,sid,currstyle){var that=this;var icons=style.getElementsByTagName("IconStyle");var tempstyle,opacity;var aa,bb,gg,rr;var fill,href,color,colormode,outline;fill=1;outline=0;myscale=1;var strid="#";if(sid){strid="#"+sid;}if(icons.length>0){href=this.getText(icons[0].getElementsByTagName("href")[0]);if(!!!href){href=currstyle.url;}var scale=parseFloat(this.getText(icons[0].getElementsByTagName("scale")[0]),10);if(scale){myscale=scale;}var hs=icons[0].getElementsByTagName("hotSpot");tempstyle=this.makeIcon(currstyle,href,myscale,hs[0]);tempstyle.scale=myscale;that.styles[strid]=tempstyle;}var linestyles=style.getElementsByTagName("LineStyle");if(linestyles.length>0){var width=parseInt(this.getText(linestyles[0].getElementsByTagName("width")[0]),10);if(width<1){width=1;}color=this.getText(linestyles[0].getElementsByTagName("color")[0]);aa=color.substr(0,2);bb=color.substr(2,2);gg=color.substr(4,2);rr=color.substr(6,2);color="#"+rr+gg+bb;opacity=parseInt(aa,16)/256;if(that.opts.overrideOpacity){opacity=that.opts.overrideOpacity;}if(!!!that.styles[strid]){that.styles[strid]={};1}that.styles[strid].strokeColor=color;that.styles[strid].strokeWeight=width;that.styles[strid].strokeOpacity=opacity;}var polystyles=style.getElementsByTagName("PolyStyle");if(polystyles.length>0){color=this.getText(polystyles[0].getElementsByTagName("color")[0]);colormode=this.getText(polystyles[0].getElementsByTagName("colorMode")[0]);if(polystyles[0].getElementsByTagName("fill").length!=0){fill=parseInt(this.getText(polystyles[0].getElementsByTagName("fill")[0]),10);}if(polystyles[0].getElementsByTagName("outline").length!=0){outline=parseInt(this.getText(polystyles[0].getElementsByTagName("outline")[0]),10);}aa=color.substr(0,2);bb=color.substr(2,2);gg=color.substr(4,2);rr=color.substr(6,2);color="#"+rr+gg+bb;opacity=parseInt(aa,16)/256;if(that.opts.overrideOpacity){opacity=that.opts.overrideOpacity;}if(!!!that.styles[strid]){that.styles[strid]={};}that.styles[strid].fill=fill;that.styles[strid].outline=outline;if(colormode!="random"){that.styles[strid].fillColor=color;}else{that.styles[strid].colortint=color;}that.styles[strid].fillOpacity=opacity;if(!fill){that.styles[strid].fillOpacity=0;}if(!outline){that.styles[strid].strokeOpacity=0;}}tempstyle=that.styles[strid];return tempstyle;};GeoXml.prototype.processKML=function(node,marks,title,sbid,depth,paren){var that=this;var thismap=this.map;var icon;var grouptitle;var keepopen=this.forcefoldersopen;if(node.nodeName=="kml"){icon=this.docicon;}if(node.nodeName=="Document"){icon=this.kmlicon;}if(node.nodeName=="Folder"){icon=this.foldericon;grouptitle=title;}var pm=[];var sf=[];var urllist=[];var desc="";var snippet="";var i;var visible=false;if(!this.hideall){visible=true;}var boundsmodified=false;var networklink=false;var url;var ground=null;var opacity=1.0;var wmsbounds;var makewms=false;var makeground=false;var wmslist=[];var groundlist=[];var mytitle;var color;var ol;var n,ne,sw,se;var html;var kml_id=node.getAttribute("id");for(var ln=0;ln<node.childNodes.length;ln++){var nextn=node.childNodes.item(ln);var nn=nextn.nodeName;var nv=nextn.nodeValue;switch(nn){case "name":case "title":title=this.getText(nextn);if(title.length+depth>this.maxtitlewidth){this.maxtitlewidth=title.length+depth;}break;case "Folder":case "Document":sf.push(nextn);break;case "GroundOverlay":url=this.getText(nextn.getElementsByTagName("href")[0]);var north=parseFloat(this.getText(nextn.getElementsByTagName("north")[0]));var south=parseFloat(this.getText(nextn.getElementsByTagName("south")[0]));var east=parseFloat(this.getText(nextn.getElementsByTagName("east")[0]));var west=parseFloat(this.getText(nextn.getElementsByTagName("west")[0]));var attr=this.getText(nextn.getElementsByTagName("attribution")[0]);sw=new google.maps.LatLng(south,west);ne=new google.maps.LatLng(north,east);this.bounds.extend(sw);this.bounds.extend(ne);color=this.getText(nextn.getElementsByTagName("color")[0]);opacity=parseInt(color.substring(1,3),16)/256;mytitle=this.getText(nextn.getElementsByTagName("name")[0]);var arcims=/arcimsproxy/i;if(url.match(arcims)){url+="&bbox="+west+","+south+","+east+","+north+"&response=img";wmsbounds=new google.maps.LatLngBounds(sw,ne);makewms=true;ol=this.makeWMSTileLayer(url,visible,mytitle,opacity,attr,title,wmsbounds);if(ol){ol.bounds=wmsbounds;ol.title=mytitle;ol.opacity=opacity;ol.visible=visible;ol.url=url;if(!this.quiet){this.mb.showMess("Adding Tiled ArcIms Overlay "+title,1000);}wmslist.push(ol);}}else{var rs=/request=getmap/i;if(url.match(rs)){url+="&bbox="+west+","+south+","+east+","+north;wmsbounds=new google.maps.LatLngBounds(sw,ne);makewms=true;ol=this.makeWMSTileLayer(url,visible,mytitle,opacity,attr,title,wmsbounds);if(ol){ol.bounds=wmsbounds;ol.title=mytitle;ol.opacity=opacity;ol.visible=visible;ol.url=url;if(!this.quiet){this.mb.showMess("Adding Tiled WMS Overlay "+title,1000);}wmslist.push(ol);}}else{wmsbounds=new google.maps.LatLngBounds(sw,ne);ground=new google.maps.GroundOverlay(url,wmsbounds);ground.url=url;ground.title=mytitle;ground.visible=visible;ground.bounds=wmsbounds;ground.getBounds=function(){return this.bounds;};boundsmodified=true;makeground=true;if(!this.quiet){this.mb.showMess("Adding GroundOverlay "+title,1000);}groundlist.push(ground);}}break;case "NetworkLink":urllist.push(this.getText(nextn.getElementsByTagName("href")[0]));networklink=true;break;case "description":case "Description":desc=GeoXml.getDescription(nextn);break;case "open":if(this.getText(nextn)=="1"){keepopen=true;}if(this.getText(nextn)=="0"){keepopen=this.forcefoldersopen;}break;case "visibility":if(this.getText(nextn)=="0"){visible=false;}break;case "snippet":case "Snippet":snippet=GeoXml.stripHTML(this.getText(nextn));snippet=snippet.replace(/\n/g,'');break;default:for(var k=0;k<marks.length;k++){if(nn==marks[k]){pm.push(nextn);}}}}var folderid;var idx=this.overlayman.folders.length;var me=paren;if(sf.length>1||pm.length||ground||makewms){this.overlayman.folders.push([]);this.overlayman.subfolders.push([]);this.overlayman.folderhtml.push([]);this.overlayman.folderhtmlast.push(0);this.overlayman.folderBounds.push(new google.maps.LatLngBounds());this.kml.push(new KMLObj(title,desc,false,idx));me=this.kml.length-1;folderid=this.createFolder(idx,title,sbid,icon,desc,snippet,true,visible);}else{folderid=sbid;}if(node.nodeName=="Folder"||node.nodeName=="Document"){this.kml[me].open=keepopen;this.kml[me].folderid=folderid;}if(ground||makewms){this.kml[this.kml.length-1].visibility=visible;this.kml[this.kml.length-1].groundOverlays.push({"url":url,"bounds":wmsbounds});}if(networklink){var re=/&amp;/g;for(x=0;x<urllist.length;x++){url=urllist[x];url=url.replace(re,"&");var nl=/\n/g;url=url.replace(nl,"");var qu=/'/g;title=title.replace(qu,"&#39;");this.progress++;if(!top.standalone){if(typeof this.proxy!="undefined"){url=this.proxy+escape(url);}}var comm=this.myvar+".loadXMLUrl('"+url+"','"+title+"',null,null,'"+sbid+"');";setTimeout(comm,1000);}}if(makewms&&wmslist.length){for(var wo=0;wo<wmslist.length;wo++){var ol=wmslist[wo];var blob="";if(this.basesidebar){var n=this.overlayman.markers.length;if(!this.nolegend){var myurl=ol.url.replace(/height=(\d)+/i,"height=100");myurl=myurl.replace(/width=(\d)+/i,"width=100");blob='<img src="'+myurl+'" style="width:100px" />';}}if(this.sidebarsnippet&&snippet==""){snippet=GeoXml.stripHTML(desc);desc2=desc2.substring(0,40);}parm=this.myvar+"$$$"+ol.title+"$$$tiledoverlay$$$"+n+"$$$"+blob+"$$$"+ol.visible+"$$$"+(this.baseLayers.length-1)+"$$$"+snippet;var html=ol.desc;var thismap=this.map;google.maps.event.addListener(ol,"zoomto",function(){thismap.fitBounds(this.getBounds());});this.overlayman.AddMarker(ol,title,idx,parm,true,true);}}if(makeground&&groundlist.length){for(var gro=0;gro<groundlist.length;gro++){if(this.basesidebar){var n=this.overlayman.markers.length;var blob='<span style="background-color:black;border:2px solid brown;">&nbsp;&nbsp;&nbsp;&nbsp;</span> ';if(this.sidebarsnippet&&snippet==""){snippet=GeoXml.stripHTML(desc);desc2=desc2.substring(0,40);}parm=this.myvar+"$$$"+groundlist[gro].title+"$$$polygon$$$"+n+"$$$"+blob+"$$$"+groundlist[gro].visible+"$$$null$$$"+snippet;var html=groundlist[gro].desc;var thismap=this.map;google.maps.event.addListener(groundlist[gro],"zoomto",function(){thismap.fitBounds(groundlist[gro].getBounds());});this.overlayman.folderBounds[idx].extend(groundlist[gro].getBounds().getSouthWest());this.overlayman.folderBounds[idx].extend(groundlist[gro].getBounds().getNorthEast());boundsmodified=true;this.overlayman.AddMarker(groundlist[gro],title,idx,parm,visible);}groundlist[gro].setMap(this.map);}}for(i=0;i<pm.length;i++){this.handlePlacemark(pm[i],idx,depth+1);}var fc=0;for(i=0;i<sf.length;i++){var fid=this.processKML(sf[i],marks,title,folderid,depth+1,me);if(typeof fid=="number"&&fid!=idx){var sub=this.overlayman.folderBounds[fid];if(!sub){this.overlayman.folderBounds[fid]=new google.maps.LatLngBounds();}else{var sw=this.overlayman.folderBounds[fid].getSouthWest();var ne=this.overlayman.folderBounds[fid].getNorthEast();this.overlayman.folderBounds[idx].extend(sw);this.overlayman.folderBounds[idx].extend(ne);}this.overlayman.subfolders[idx].push(fid);if(fid!=idx){this.kml[idx].folders.push(fid);}fc++;}}if(fc||pm.length||boundsmodified){this.bounds.extend(this.overlayman.folderBounds[idx].getSouthWest());this.bounds.extend(this.overlayman.folderBounds[idx].getNorthEast());}if(sf.length==0&&pm.length==0&&!this.opts.basesidebar){this.ParseURL();}return idx;};GeoXml.prototype.processGPX=function(node,title,sbid,depth){var icon;if(node.nodeName=="gpx"){icon=this.gmlicon;}if(node.nodeName=="rte"||node.nodeName=="trk"||node.nodeName=="trkseg"){icon=this.foldericon;}var pm=[];var sf=[];var desc="";var snip="";var i,lon,lat,l;var open=this.forcefoldersopen;var coords="";var visible=true;for(var ln=0;ln<node.childNodes.length;ln++){var nextn=node.childNodes.item(ln);var nn=nextn.nodeName;if(nn=="name"||nn=="title"){title=this.getText(nextn);if(title.length+depth>this.maxtitlewidth){this.maxtitlewidth=title.length+depth;}}if(nn=="rte"){sf.push(nextn);}if(nn=="trk"){sf.push(nextn);}if(nn=="trkseg"){sf.push(nextn);}if(nn=="trkpt"){pm.push(nextn);l=nextn.getAttribute("lat");if(typeof l!="undefined"){lat=l;}l=nextn.getAttribute("lon");if(typeof l!="undefined"){lon=l;coords+=lon+","+lat+" ";}}if(nn=="rtept"){pm.push(nextn);l=nextn.getAttribute("lat");if(typeof l!="undefined"){lat=l;}l=nextn.getAttribute("lon");if(typeof l!="undefined"){lon=l;coords+=lon+","+lat+" ";}}if(nn=="wpt"){pm.push(nextn);}if(nn=="description"||nn=="desc"){desc=this.getText(nextn);}}if(coords.length){var nc="<?xml version=\"1.0\"?><Placemark><name>"+title+"</name><description>"+desc+"</description><LineString><coordinates>"+coords+"</coordinates></LineString></Placemark>";var pathnode=this.parseXML(nc).documentElement;pm.push(pathnode);}var folderid;var idx=this.overlayman.folders.length;if(pm.length||node.nodeName=="gpx"){this.overlayman.folders.push([]);this.overlayman.subfolders.push([]);this.overlayman.folderhtml.push([]);this.overlayman.folderhtmlast.push(0);this.overlayman.folderBounds.push(new google.maps.LatLngBounds());this.kml.push(new KMLObj(title,desc,open,idx));folderid=this.createFolder(idx,title,sbid,icon,desc,snip,true,visible);}else{folderid=sbid;}for(i=0;i<pm.length;i++){this.handlePlacemark(pm[i],idx,depth+1);}for(i=0;i<sf.length;i++){var fid=this.processGPX(sf[i],title,folderid,depth+1);this.overlayman.subfolders[idx].push(fid);this.overlayman.folderBounds[idx].extend(this.overlayman.folderBounds[fid].getSouthWest());this.overlayman.folderBounds[idx].extend(this.overlayman.folderBounds[fid].getNorthEast());}if(this.overlayman.folderBounds[idx]){this.bounds.extend(this.overlayman.folderBounds[idx].getSouthWest());this.bounds.extend(this.overlayman.folderBounds[idx].getNorthEast());}return idx;};GeoXml.prototype.ParseURL=function(){var query=topwin.location.search.substring(1);var pairs=query.split("&");var marks=this.overlayman.markers;for(var i=0;i<pairs.length;i++){var pos=pairs[i].indexOf("=");var argname=pairs[i].substring(0,pos).toLowerCase();var val=unescape(pairs[i].substring(pos+1));var m=0;var nae;if(val){switch(argname){case "openbyid":for(m=0;m<marks.length;m++){nae=marks[m].id;if(nae==val){this.overlayman.markers[m].setMap(this.map);this.overlayman.markers[m].hidden=false;google.maps.event.trigger(this.overlayman.markers[m],"click");break;}}break;case "kml":case "url":case "src":case "geoxml":this.urls.push(val);this.parse();break;case "openbyname":for(m=0;m<marks.length;m++){nae=marks[m].title;if(nae==val){this.overlayman.markers[m].setMap(this.map);this.overlayman.markers[m].hidden=false;google.maps.event.trigger(this.overlayman.markers[m],"click");break;}}break;}}}};GeoXml.prototype.processing=function(xmlDoc,title,latlon,desc,sbid){this.overlayman.miStart=new Date();if(!desc){desc=title;}var that=this;if(!sbid){sbid=0;}var shadow;var idx;var root=xmlDoc.documentElement;if(!root){return 0;}var placemarks=[];var name;var pname;var styles;var basename=root.nodeName;var keepopen=that.forcefoldersopen;var bases=basename.split(":");if(bases.length>1){basename=bases[1];}var bar,sid,i;that.wfs=false;if(basename=="FeatureCollection"){bar=Lance$(that.basesidebar);if(!title){title=name;}if(typeof title=="undefined"){title="Un-named GML";}that.isWFS=true;if(title.length>that.maxtitlewidth){that.maxtitlewidth=title.length;}if(bar){bar.style.display="";}idx=that.overlayman.folders.length;that.processGML(root,title,latlon,desc,(that.kml.length-1));that.kml[0].folders.push(idx);}if(basename=="gpx"){if(!title){title=name;}if(typeof title=="undefined"){title="Un-named GPX";}that.title=title;if(title.length>that.maxtitlewidth){that.maxtitlewidth=title.length;}bar=Lance$(that.basesidebar);if(bar){bar.style.display="";}idx=that.overlayman.folders.length;that.processGPX(root,title,that.basesidebar,sbid);that.kml[0].folders.push(idx);}else{if(basename=="kml"){styles=root.getElementsByTagName("Style");for(i=0;i<styles.length;i++){sid=styles[i].getAttribute("id");if(sid){that.handleStyle(styles[i],sid);}}styles=root.getElementsByTagName("StyleMap");for(i=0;i<styles.length;i++){sid=styles[i].getAttribute("id");if(sid){var found=false;var node=styles[i];for(var j=0;(j<node.childNodes.length&&!found);j++){var pair=node.childNodes[j];for(var k=0;(k<pair.childNodes.length&&!found);k++){var pn=pair.childNodes[k].nodeName;if(pn=="styleUrl"){var pid=this.getText(pair.childNodes[k]);that.styles["#"+sid]=that.styles[pid];found=true;}if(pn=="Style"){that.handleStyle(pair.childNodes[k],sid);found=true;}}}}}if(!title){title=name;}if(typeof title=="undefined"){title="KML Document";}that.title=title;if(title.length>that.maxtitlewidth){that.maxtitlewidth=title.length;}var marknames=["Placemark"];var schema=root.getElementsByTagName("Schema");for(var s=0;s<schema.length;s++){pname=schema[s].getAttribute("parent");if(pname=="Placemark"){pname=schema[s].getAttribute("name");marknames.push(pname);}}bar=Lance$(that.basesidebar);if(bar){bar.style.display="";}idx=that.overlayman.folders.length;var paren=that.kml.length-1;var fid=that.processKML(root,marknames,title,that.basesidebar,idx,paren);that.kml[paren].folders.push(idx);}else{placemarks=root.getElementsByTagName("item");if(placemarks.length<1){placemarks=root.getElementsByTagName("atom");}if(placemarks.length<1){placemarks=root.getElementsByTagName("entry");}if(!title){title=name;}if(typeof title=="undefined"){title="News Feed";}that.title=title;if(title.length>that.maxtitlewidth){that.maxtitlewidth=title.length;}var style;if(that.opts.baseicon){style=that.opts.baseicon;shadow=that.rssicon.replace(".png",".shadow.png");style.shadow=shadow+"_shadow.png";}else{style=new google.maps.MarkerImage(that.rssicon,new google.maps.Size(32,32));style.origin=new google.maps.Point(0,0);style.anchor=new google.maps.Point(16,32);style.url=that.rssicon;shadow=that.rssicon.replace(".png",".shadow.png");style.shadow=shadow+"_shadow.png";}style.strokeColor="#00FFFF";style.strokeWeight="3";style.strokeOpacity=0.50;if(!desc){desc="RSS feed";}that.kml[0].folders.push(that.overlayman.folders.length);if(placemarks.length){bar=Lance$(that.basesidebar);if(bar){bar.style.display="";}that.overlayman.folders.push([]);that.overlayman.folderhtml.push([]);that.overlayman.folderhtmlast.push(0);that.overlayman.folderBounds.push(new google.maps.LatLngBounds());idx=that.overlayman.folders.length-1;that.kml.push(new KMLObj(title,desc,keepopen,idx));that.kml[that.kml.length-1].open=keepopen;if(that.basesidebar){var visible=true;if(that.hideall){visible=false;}var folderid=that.createFolder(idx,title,that.basesidebar,that.globalicon,desc,null,keepopen,visible);}for(i=0;i<placemarks.length;i++){that.handlePlacemark(placemarks[i],idx,sbid,style);}}}}that.progress--;if(that.progress==0){google.maps.event.trigger(that,"initialized");if(!that.opts.sidebarid){that.mb.showMess("Finished Parsing",1000);}if(!that.opts.nozoom&&!that.basesidebar){that.map.fitBounds(that.bounds);}}};GeoXml.prototype.createFolder=function(idx,title,sbid,icon,desc,snippet,keepopen,visible){var sb=Lance$(sbid);keepopen=true;var folderid=this.myvar+'_folder'+idx;var checked="";if(visible){checked=" checked ";}this.overlayman.folderhtml[folderid]="";var disp="display:block";var fw="font-weight:normal";if(typeof keepopen=="undefined"||!keepopen){disp="display:none";fw="font-weight:bold";}if(!desc||desc==""){desc=title;}desc=escape(desc);var htm='<ul><input type="checkbox" id="'+this.myvar+''+idx+'FCB" style="vertical-align:middle" ';htm+=checked;htm+='onclick="'+this.myvar+'.toggleContents('+idx+',this.checked)">';htm+='&nbsp;<span title="'+snippet+'" id="'+this.myvar+'TB'+idx+'" oncontextmenu=\"'+this.myvar+'.saveJSON('+idx+');\" onclick="'+this.myvar+'.toggleFolder('+idx+')" style=\"'+fw+'\">';htm+='<img id=\"'+this.myvar+'FB'+idx+'\" style=\"vertical-align:text-top;padding:0;margin:0\" height=\"'+this.sidebariconheight+'\" border=\"0\" src="'+icon+'" /></span>&nbsp;';htm+='<a href="#" onclick="'+this.myvar+'.overlayman.zoomToFolder('+idx+');'+this.myvar+'.mb.showMess(\''+desc+'\',3000);return false;">'+title+'</a><br><div id=\"'+folderid+'\" style="'+disp+'"></div></ul>';if(sb){sb.innerHTML=sb.innerHTML+htm;}return folderid;};GeoXml.prototype.processGML=function(root,title,latlon,desc,me){var that=this;var isWFS=false;var placemarks=[];var srsName;var isLatLon=false;var xmin=0;var ymin=0;var xscale=1;var yscale=1;var points,pt,pts;var coor,coorstr;var x,y,k,i;var name=title;var visible=true;if(this.hideall){visible=false;}var keepopen=that.allfoldersopen;var pt1,pt2,box;for(var ln=0;ln<root.childNodes.length;ln++){var kid=root.childNodes.item(ln).nodeName;var n=root.childNodes.item(ln);if(kid=="gml:boundedBy"||kid=="boundedBy"){for(var j=0;j<n.childNodes.length;j++){var nn=n.childNodes.item(j).nodeName;var llre=/CRS:84|(4326|4269)$/i;if(nn=="Box"||nn=="gml:Box"){box=n.childNodes.item(j);srsName=n.childNodes.item(j).getAttribute("srsName");if(srsName.match(llre)){isLatLon=true;}else{alert("SRSname ="+srsName+"; attempting to create transform");for(k=0;k<box.childNodes.length;k++){coor=box.childNodes.item(k);if(coor.nodeName=="gml:coordinates"||coor.nodeName=="coordinates"){coorstr=this.getText(coor);pts=coorstr.split(" ");pt1=pts[0].split(",");pt2=pts[1].split(",");xscale=(parseFloat(pt2[0])-parseFloat(pt1[0]))/(latlon.xmax-latlon.xmin);yscale=(parseFloat(pt2[1])-parseFloat(pt1[1]))/(latlon.ymax-latlon.ymin);xmin=pt1[0]/xscale-latlon.xmin;ymin=pt1[1]/yscale-latlon.ymin;}}}break;}if(nn=="Envelope"||nn=="gml:Envelope"){box=n.childNodes.item(j);srsName=n.childNodes.item(j).getAttribute("srsName");if(srsName.match(llre)){isLatLon=true;}else{alert("SRSname ="+srsName+"; attempting to create transform");for(k=0;k<box.childNodes.length;k++){coor=box.childNodes.item(k);if(coor.nodeName=="gml:coordinates"||coor.nodeName=="coordinates"){pts=coor.split(" ");var b={"xmin":100000000,"ymin":100000000,"xmax":-100000000,"ymax":-100000000};for(var m=0;m<pts.length-1;m++){pt=pts[m].split(",");x=parseFloat(pt[0]);y=parseFloat(pt[1]);if(x<b.xmin){b.xmin=x;}if(y<b.ymin){b.ymin=y;}if(x>b.xmax){b.xmax=x;}if(y>b.ymax){b.ymax=y;}}xscale=(b.xmax-b.xmin)/(latlon.xmax-latlon.xmin);yscale=(b.ymax-b.ymin)/(latlon.ymax-latlon.ymin);xmin=b.xmin/xscale-latlon.xmin;ymin=b.ymin/yscale-latlon.ymin;}}}}break;}}if(kid=="gml:featureMember"||kid=="featureMember"){placemarks.push(n);}}var folderid;if(!title){title=name;}this.title=title;if(placemarks.length<1){alert("No features found in "+title);this.mb.showMess("No features found in "+title,3000);}else{this.mb.showMess("Adding "+placemarks.length+" features found in "+title);this.overlayman.folders.push([]);this.overlayman.folderhtml.push([]);this.overlayman.folderhtmlast.push(0);this.overlayman.folderBounds.push(new google.maps.LatLngBounds());var idx=this.overlayman.folders.length-1;if(this.basesidebar){folderid=this.createFolder(idx,title,this.basesidebar,this.gmlicon,desc,null,keepopen,visible);}this.kml.push(new KMLObj(title,desc,true,idx));this.kml[me].open=that.opts.allfoldersopen;this.kml[me].folderid=folderid;if(isLatLon){for(i=0;i<placemarks.length;i++){this.handlePlacemark(placemarks[i],idx,0);}}else{var trans={"xs":xscale,"ys":yscale,"x":xmin,"y":ymin};for(i=0;i<placemarks.length;i++){this.handleGeomark(placemarks[i],idx,trans,0);}}}};google.maps.Polyline.prototype.getBounds=function(){if(typeof this.bounds!="undefined"){return this.bounds;}else{return(this.computeBounds());}};google.maps.Polyline.prototype.getPosition=function(){var p=this.getPath();return(p.getAt(Math.round(p.getLength()/2)));};google.maps.Polyline.prototype.computeBounds=function(){var bounds=new google.maps.LatLngBounds();var p=this.getPath();for(var i=0;i<p.getLength();i++){var v=p.getAt(i);if(v){bounds.extend(v);}}this.bounds=bounds;return bounds;};google.maps.Polygon.prototype.getPosition=function(){return(this.getBounds().getCenter());};google.maps.Polygon.prototype.computeBounds=function(){var bounds=new google.maps.LatLngBounds();var p=this.getPaths();for(var a=0;a<p.getLength();a++){var s=p.getAt(a);for(var i=0;i<s.getLength();i++){var v=s.getAt(i);if(v){bounds.extend(v);}}}this.bounds=bounds;return bounds;};google.maps.Polygon.prototype.getBounds=function(){if(typeof this.bounds!="undefined"){return this.bounds;}else{return(this.computeBounds());}};google.maps.Polygon.prototype.getCenter=function(){return(this.getBounds().getCenter());};OverlayManagerView.prototype=new google.maps.OverlayView();function OverlayManagerView(map){this.setMap(map);};OverlayManagerView.prototype.onAdd=function(){};OverlayManagerView.prototype.draw=function(){};OverlayManagerView.prototype.onRemove=function(){};OverlayManager=function(map,paren){this.myvar=paren.myvar;this.paren=paren;this.map=map;this.markers=[];this.byid=[];this.byname=[];this.groups=[];this.timeout=null;this.folders=[];this.folderBounds=[];this.folderhtml=[];this.folderhtmlast=[];this.subfolders=[];this.currentZoomLevel=map.getZoom();this.isParsed=false;this.overlayview=new OverlayManagerView(map);this.maxVisibleMarkers=OverlayManager.defaultMaxVisibleMarkers;this.gridSize=OverlayManager.defaultGridSize;this.minMarkersPerCluster=OverlayManager.defaultMinMarkersPerCluster;this.maxLinesPerInfoBox=OverlayManager.defaultMaxLinesPerInfoBox;this.icon=OverlayManager.defaultIcon;google.maps.event.addListener(this.paren,'adjusted',OverlayManager.MakeCaller(OverlayManager.Display,this));google.maps.event.addListener(map,'idle',OverlayManager.MakeCaller(OverlayManager.Display,this));google.maps.event.addListener(map,'infowindowclose',OverlayManager.MakeCaller(OverlayManager.PopDown,this));this.icon.pane=this.paren.markerpane;};OverlayManager.defaultMaxVisibleMarkers=6000;OverlayManager.defaultGridSize=20;OverlayManager.defaultMinMarkersPerCluster=10;OverlayManager.defaultMaxLinesPerInfoBox=15;OverlayManager.defaultIcon=new google.maps.MarkerImage('http://maps.google.com/mapfiles/kml/paddle/blu-circle.png',new google.maps.Size(32,32),new google.maps.Point(0,0),new google.maps.Point(16,12),new google.maps.Size(32,32));OverlayManager.prototype.SetIcon=function(icon){this.icon=icon;};OverlayManager.prototype.SetMaxVisibleMarkers=function(n){this.maxVisibleMarkers=n;};OverlayManager.prototype.SetMinMarkersPerCluster=function(n){this.minMarkersPerCluster=n;};OverlayManager.prototype.SetMaxLinesPerInfoBox=function(n){this.maxLinesPerInfoBox=n;};OverlayManager.prototype.AddMarker=function(marker,title,idx,sidebar,visible,forcevisible){if(marker.setMap!=null){marker.setMap(this.map);}marker.hidden=false;if(visible!=true){marker.hidden=true;}if(this.paren.hideall){marker.hidden=true;}marker.title=title;this.folders[idx].push(this.markers.length);var bounds=this.map.getBounds();var vis=false;if(bounds){if(typeof marker.getBounds=="undefined"){if(bounds.contains(marker.getPosition())){vis=true;}}else{var b=marker.getBounds();if(!b.isEmpty()){if(bounds.intersects(b)){vis=true;}}}}else{vis=true;}if(forcevisible){vis=true;}this.markers.push(marker);if(vis){if(marker.hidden){marker.setMap(null);marker.onMap=false;if(!!marker.label){marker.label.hide();}}else{marker.setMap(this.map);marker.onMap=true;}}this.DisplayLater();if(sidebar){this.folderhtml[idx].push(sidebar);}};OverlayManager.prototype.zoomToFolder=function(idx){var bounds=this.folderBounds[idx];this.map.fitBounds(bounds);};OverlayManager.prototype.RemoveMarker=function(marker){for(var i=0;i<this.markers.length;++i){if(this.markers[i]==marker){if(marker.onMap){marker.setMap(null);}if(!!marker.label){marker.label.setMap(null);}for(var j=0;j<this.groups.length;++j){var group=this.groups[j];if(group!=null){for(var k=0;k<group.markers.length;++k){if(group.markers[k]==marker){group.markers[k]=null;--group.markerCount;break;}}if(group.markerCount==0){this.ClearGroup(group);this.groups[j]=null;}else{if(group==this.poppedUpCluster){OverlayManager.RePop(this);}}}}this.markers[i]=null;break;}}this.DisplayLater();};OverlayManager.prototype.DisplayLater=function(){if(this.timeout!=null){clearTimeout(this.timeout);}this.timeout=setTimeout(OverlayManager.MakeCaller(OverlayManager.Display,this),50);};OverlayManager.Display=function(overlaymanager){var i,j,k,marker,group,l;clearTimeout(overlaymanager.timeout);if(overlaymanager.paren.allRemoved){return;}var update_side=false;var count=0;var clon,bits;var vis;var content;if(overlaymanager.paren.basesidebar){for(k=0;k<overlaymanager.folderhtml.length;k++){var curlen=overlaymanager.folderhtml[k].length;var con=overlaymanager.folderhtmlast[k];if(con<curlen){var destid=overlaymanager.paren.myvar+"_folder"+k;var dest=Lance$(destid);if(dest){if(overlaymanager.paren.opts.sortbyname){content=dest.innerHTML;clon=overlaymanager.folderhtml[k].sort();for(l=0;l<curlen;l++){bits=clon[l].split("$$$",8);content+=overlaymanager.paren.sidebarfn(bits[0],bits[1],bits[2],bits[3],bits[4],bits[5],bits[6],bits[7]);}}else{content=dest.innerHTML;clon=overlaymanager.folderhtml[k];for(l=con;l<curlen;l++){bits=clon[l].split("$$$",8);content+=overlaymanager.paren.sidebarfn(bits[0],bits[1],bits[2],bits[3],bits[4],bits[5],bits[6],bits[7]);}}overlaymanager.folderhtmlast[k]=curlen;dest.innerHTML=content;if(overlaymanager.paren.forcefoldersopen){dest.style.display="block";}update_side=true;count=curlen;}else{}}}}if(update_side&&count>0){if(overlaymanager.paren.progress==0){overlaymanager.paren.setFolders();google.maps.event.trigger(overlaymanager.paren,"parsed");if(!overlaymanager.paren.opts.sidebarid){overlaymanager.paren.mb.showMess("Finished Parsing",1000);}var mifinish=new Date();var sec=((mifinish-overlaymanager.miStart)/1000+" seconds");overlaymanager.paren.mb.showMess("Loaded "+count+"  GeoXML elements in "+sec,5000);overlaymanager.paren.ParseURL();if(!overlaymanager.paren.opts.nozoom){overlaymanager.paren.map.fitBounds(overlaymanager.paren.bounds);}}}if(update_side&&typeof resizeKML!="undefined"){resizeKML();}var bounds;var sw;var ne;var dx;var dy;var newZoomLevel=overlaymanager.map.getZoom();if(newZoomLevel!=overlaymanager.currentZoomLevel){for(i=0;i<overlaymanager.groups.length;++i){if(overlaymanager.groups[i]!=null){overlaymanager.ClearGroup(overlaymanager.groups[i]);overlaymanager.groups[i]=null;}}overlaymanager.groups.length=0;overlaymanager.currentZoomLevel=newZoomLevel;}if(overlaymanager.map.getBounds()){bounds=overlaymanager.getMapBounds(overlaymanager);sw=bounds.getSouthWest();ne=bounds.getNorthEast();dx=ne.lng()-sw.lng();dy=ne.lat()-sw.lat();if(dx<300&&dy<150){dx*=0.05;dy*=0.05;bounds=new google.maps.LatLngBounds(new google.maps.LatLng(sw.lat()-dy,sw.lng()-dx),new google.maps.LatLng(ne.lat()+dy,ne.lng()+dx));}}if(!!!bounds&&overlaymanager.map){bounds=overlaymanager.getMapBounds(overlaymanager);if(!!!bounds)return;}var visibleMarkers=[];var nonvisibleMarkers=[];var viscount=0;for(i=0;i<overlaymanager.markers.length;++i){marker=overlaymanager.markers[i];vis=false;if(marker!==null){var mid=overlaymanager.paren.myvar+"sb"+i;if(typeof marker.getBounds=="undefined"){var pos=marker.getPosition();if(bounds.contains(pos)){vis=true;viscount++;}}else{var b=marker.getBounds();if(bounds.intersects(b)){vis=true;}}if(Lance$(mid)){if(vis){Lance$(mid).className="inView";}else{Lance$(mid).className="outView";}}if(vis&&(marker.hidden==false)){visibleMarkers.push(i);}else{nonvisibleMarkers.push(i);}}}for(i=0;i<nonvisibleMarkers.length;++i){marker=overlaymanager.markers[nonvisibleMarkers[i]];if(marker.onMap){if(!!marker.label){marker.label.setMap(null);}marker.setMap(null);marker.onMap=false;}}for(i=0;i<overlaymanager.groups.length;++i){group=overlaymanager.groups[i];if(group!=null&&group.marker){vis=false;if(typeof group.marker.getBounds=="undefined"){if(bounds.contains(group.marker.getPosition())){vis=true;}}else{vis=true;}if(!vis&&group.onMap){group.marker.setMap(null);group.onMap=false;}}}if(viscount>overlaymanager.maxVisibleMarkers){if(!update_side){overlaymanager.paren.mb.showMess("Clustering on "+viscount+"  GeoXML elements");}var latRange=bounds.getNorthEast().lat()-bounds.getSouthWest().lat();var latInc=latRange / overlaymanager.gridSize;var lngInc=latInc / Math.cos( ( bounds.getNorthEast().lat() + bounds.getSouthWest().lat() ) / 2.0 * Math.PI / 180.0);for(var lat=bounds.getSouthWest().lat();lat<=bounds.getNorthEast().lat();lat+=latInc){for(var lng=bounds.getSouthWest().lng();lng<=bounds.getNorthEast().lng();lng+=lngInc){group={};group.overlaymanager=overlaymanager;group.bounds=new google.maps.LatLngBounds(new google.maps.LatLng(lat,lng),new google.maps.LatLng(lat+latInc,lng+lngInc));group.markers=[];group.markerCount=0;group.onMap=false;group.marker=null;overlaymanager.groups.push(group);}}for(i=0;i<visibleMarkers.length;++i){marker=overlaymanager.markers[visibleMarkers[i]];if(marker!=null&&!marker.inCluster){for(j=0;j<overlaymanager.groups.length;++j){group=overlaymanager.groups[j];if(group!=null){vis=false;if(typeof marker.getBounds=="undefined"){if(group.bounds.contains(marker.getPosition())){vis=true;}}if(vis){marker.inCluster=true;overlaymanager.groups[j].markers.push(marker);++overlaymanager.groups[j].markerCount;}}}}}for(i=0;i<overlaymanager.groups.length;++i){if(overlaymanager.groups[i]!=null&&overlaymanager.groups[i].markerCount<overlaymanager.minMarkersPerCluster){overlaymanager.ClearGroup(overlaymanager.groups[i]);overlaymanager.groups[i]=null;}}for(i=overlaymanager.groups.length-1;i>=0;--i){if(overlaymanager.groups[i]!=null){break;}else{--overlaymanager.groups.length;}}for(i=0;i<overlaymanager.groups.length;++i){group=overlaymanager.groups[i];if(group!=null){for(j=0;j<group.markers.length;++j){marker=group.markers[j];if(marker!=null&&marker.onMap){marker.setMap(null);marker.onMap=false;if(!!marker.label){marker.label.hide();}}}}}for(i=0;i<overlaymanager.groups.length;++i){group=overlaymanager.groups[i];if(group!=null&&group.marker==null){var xTotal=0.0;var yTotal=0.0;for(j=0;j<group.markers.length;++j){marker=group.markers[j];if(marker!=null){xTotal+=(+marker.getPosition().lng());yTotal+=(+marker.getPosition().lat());}}var location=new google.maps.LatLng(yTotal / group.markerCount, xTotal / group.markerCount);marker=new google.maps.Marker({position:location,icon:OverlayManager.defaultIcon,title:"Cluster"});group.marker=marker;google.maps.event.addListener(marker,'click',OverlayManager.MakeCaller(OverlayManager.PopUp,group));}}}if(!update_side&&viscount&&(overlaymanager.paren.quiet!=true)){overlaymanager.paren.mb.showMess("Showing "+viscount+"  GeoXML elements",500);}for(i=0;i<visibleMarkers.length;++i){marker=overlaymanager.markers[visibleMarkers[i]];if(marker!=null&&!marker.onMap&&!marker.inCluster){if(marker.addedToMap!=null){marker.addedToMap();}if(marker.hidden){marker.setMap(null);if(!!marker.label){marker.label.setMap(null);}}else{marker.onMap=true;marker.setMap(overlaymanager.map);}}}for(i=0;i<overlaymanager.groups.length;++i){group=overlaymanager.groups[i];if(group!=null&&group.marker){vis=false;if(typeof marker.getPosition!="undefined"){if(bounds.contains(group.marker.getPosition())){vis=true;}}else{if(bounds.intersects(group.marker.getBounds())){vis=true;}}if(!group.onMap&&vis){group.marker.setMap(overlaymanager.map);group.onMap=true;}}}OverlayManager.RePop(overlaymanager);};OverlayManager.PopUp=function(group){var overlaymanager=group.overlaymanager;var html='<table style="font-size:10px" width="300">';var n=0;for(var i=0;i<group.markers.length;++i){var marker=group.markers[i];if(marker!=null){++n;html+='<tr><td>';if(marker.smallImage!=null){html+='<img src="'+marker.smallImage+'">';}else{html+='<img src="'+marker.image_+'" width="'+(marker.width_ / 2 ) + '" height="' + ( marker.height_ / 2)+'">';}html+='</td><td>'+marker.title+'</td></tr>';if(n==overlaymanager.maxLinesPerInfoBox-1&&group.markerCount>overlaymanager.maxLinesPerInfoBox){html+='<tr><td colspan="2">...and '+(group.markerCount-n)+' more</td></tr>';break;}}}html+='</table>';this.paren.lastMarker.infoWindow.close();var infoWindowOptions={content:html,pixelOffset:new google.maps.Size(0,2),position:overlaymanager.marker.getPosition()};if(this.paren.maxiwwidth){infoWindowOptions.maxWidth=this.paren.maxiwwidth;}overlaymanager.marker.infoWindow=new google.maps.InfoWindow(infoWindowOptions);this.paren.lastMarker=overlaymanager.marker;this.paren.lastMarker.infoWindow.open(this.paren.map);overlaymanager.poppedUpCluster=group;};OverlayManager.prototype.getMapBounds=function(overlaymanager){var bounds;if(overlaymanager.map.getZoom()>1){bounds=new google.maps.LatLngBounds(overlaymanager.map.getBounds().getSouthWest(),overlaymanager.map.getBounds().getNorthEast());}else{bounds=new google.maps.LatLngBounds(new google.maps.LatLng(-85.08136444384544,-178.48388434375),new google.maps.LatLng(85.02070771743472,178.00048865625));}var projection=overlaymanager.overlayview.getProjection();var tr=new google.maps.LatLng(bounds.getNorthEast().lat(),bounds.getNorthEast().lng());var bl=new google.maps.LatLng(bounds.getSouthWest().lat(),bounds.getSouthWest().lng());var trPix=projection.fromLatLngToDivPixel(tr);trPix.x+=overlaymanager.gridSize;trPix.y-=overlaymanager.gridSize;var blPix=projection.fromLatLngToDivPixel(bl);blPix.x-=overlaymanager.gridSize;blPix.y+=overlaymanager.gridSize;var ne=projection.fromDivPixelToLatLng(trPix);var sw=projection.fromDivPixelToLatLng(blPix);bounds.extend(ne);bounds.extend(sw);return bounds;};OverlayManager.RePop=function(overlaymanager){if(overlaymanager.poppedUpCluster!=null){OverlayManager.PopUp(overlaymanager.poppedUpCluster);}};OverlayManager.PopDown=function(overlaymanager){overlaymanager.poppedUpCluster=null;};OverlayManager.prototype.ClearGroup=function(group){var i,marker;for(i=0;i<group.markers.length;++i){if(group.markers[i]!=null){group.markers[i].inCluster=false;group.markers[i]=null;}}group.markers.length=0;group.markerCount=0;if(group==this.poppedUpCluster){this.map.closeInfoWindow();}if(group.onMap){group.marker.setMap(null);group.onMap=false;}};OverlayManager.MakeCaller=function(func,arg){return function(){func(arg);};};MessageBox=function(map,paren,myvar,mb){this.map=map;this.paren=paren;this.myvar=paren.myvar+"."+myvar;this.eraseMess=null;this.centerMe=null;this.mb=null;if(mb){this.mb=mb;}this.id=this.myvar+"_message";};MessageBox.prototype.hideMess=function(){if(this.paren.quiet){return;}this.mb.style.visiblity="hidden";this.mb.style.left="-1200px";this.mb.style.top="-1200px";};MessageBox.prototype.centerThis=function(){var c={};c.x=this.map.getDiv().offsetWidth/2;c.y=this.map.getDiv().offsetHeight/2;if(!this.mb){this.mb=Lance$(this.id);}if(this.centerMe){clearTimeout(this.centerMe);}if(this.mb){var nw=this.mb.offsetWidth;if(nw>this.map.getDiv().offsetWidth){nw=parseInt(2*c.x/3,10);this.mb.style.width=nw+"px";this.centerMe=setTimeout(this.myvar+".centerThis()",5);return;}this.mb.style.left=(c.x-(nw/2))+"px";this.mb.style.top=(c.y-20-(this.mb.offsetHeight/2))+"px";}else{this.centerMe=setTimeout(this.myvar+".centerThis()",10);}};MessageBox.prototype.showMess=function(val,temp){if(this.paren.quiet){if(console){console.log(val);}return;}val=unescape(val);if(this.eraseMess){clearTimeout(this.eraseMess);}if(!this.mb){this.mb=Lance$(this.id);}if(this.mb){this.mb.innerHTML="<span>"+val+"</span>";if(temp){this.eraseMess=setTimeout(this.myvar+".hideMess();",temp);}var d=this.map.getDiv();var w=this.mb.offsetWidth/2;var h=this.mb.offsetHeight/2;this.mb.style.left=parseInt(d.offsetWidth/2-w)+"px";this.mb.style.top=parseInt(d.offsetHeight/2-h)+"px";this.mb.style.width="";this.mb.style.height="";this.centerMe=setTimeout(this.myvar+".centerThis()",5);this.mb.style.visibility="visible";}else{var d=document.createElement("div");d.innerHTML=val;d.id=this.myvar+"_message";d.style.position="absolute";d.style.backgroundColor=this.style.backgroundColor||"silver";d.style.opacity=this.style.opacity||0.80;if(document.all){d.style.filter="alpha(opacity="+parseInt(d.style.opacity*100,10)+")";}d.style.color=this.style.color||"black";d.style.padding=this.style.padding||"6px";d.style.borderWidth=this.style.borderWidth||"3px";d.style.borderColor=this.style.borderColor||"";d.style.backgroundImage=this.style.backgroundImage||"";d.style.borderStyle=this.style.borderStyle||"outset";d.style.visibility="visible";d.style.left="-1200px";d.style.top="-1200px";this.centerMe=setTimeout(this.myvar+".centerThis()",5);d.style.zIndex=1000;document.body.appendChild(d);}};GeoXml.prototype.loadJSONUrl=function(url,title,latlon,desc,idx){var that=this;GDownloadUrl(url,function(doc){that.parseJSON(doc,title,latlon,desc,idx);});};GeoXml.prototype.loadXMLUrl=function(url,title,latlon,desc,idx){var that=this;that.DownloadURL(url,function(doc){var xmlDoc=that.parseXML(doc);that.processing(xmlDoc,title,latlon,desc,idx);},title);};GeoXml.prototype.upgradeLayer=function(n){var mt=this.map.getMapTypes();var found=false;for(var i=0;i<mt.length;i++){if(mt[i]==this.baseLayers[n]){found=true;this.map.removeMapType(this.baseLayers[n]);}}if(!found){this.map.addMapType(this.baseLayers[n]);}};GeoXml.prototype.makeWMSTileLayer=function(getmapstring,on,title,opac,attr,grouptitle,wmsbounds){var that=this;gmapstring=new String(getmapstring);getmapstring=gmapstring.replace("&amp;","&");var args=getmapstring.split("?");var baseurl=args[0]+"?";baseurl=baseurl.replace(/&request=getmap/i,"");baseurl=baseurl.replace(/&service=wms/i,"");var version="1.1.0";var format="image/png";var styles="";var layers="";var queryable=false;var opacity=1.0;if(typeof opac!="undefined"){opacity=opac;}var bbox="-180,-90,180,90";var pairs=args[1].split("&");var sld="";var servicename="";var atlasname="";var gmcrs="";var epsg;for(var i=0;i<pairs.length;i++){var dstr=pairs[i];var duo=pairs[i].split("=");var dl=duo[0].toLowerCase();switch(dl){case "version":version=duo[1];break;case "bbox":bbox=duo[1];break;case "width":case "height":break;case "service":break;case "servicename":servicename=duo[1];break;case "atlasname":atlasname=duo[1];break;case "styles":styles=duo[1];break;case "layers":layers=duo[1];break;case "format":format=duo[1];break;case "opacity":opacity=parseFloat(duo[1]);break;case "crs":case "srs":epsg=duo[1];break;case "gmcrs":gmcrs=duo[1];break;case "queryable":queryable=duo[1];break;case "getmap":break;case "service":break;default:if(duo[0]){baseurl+="&"+pairs[i];}break;}}if(gmcrs){epsg=gmcrs;}var bbn=bbox.split(",");var bb={"w":parseFloat(bbn[0]),"s":parseFloat(bbn[1]),"e":parseFloat(bbn[2]),"n":parseFloat(bbn[3])};var lon=(bb.n-bb.s);var z=0;var ex=180;while(ex>=lon){ex=ex/2;z++;}z--;if(z<1){z=1;}if(!attr){attr="Base Map from OGC WMS";}};GeoXml.SEMI_MAJOR_AXIS=6378137.0;GeoXml.ECCENTRICITY=0.0818191913108718138;GeoXml.DEG2RAD=180.0/(Math.PI);GeoXml.merc2Lon=function(lon){return(lon*GeoXml.DEG2RAD)*GeoXml.SEMI_MAJOR_AXIS;};GeoXml.merc2Lat=function(lat){var rad=lat*GeoXml.DEG2RAD;var sinrad=Math.sin(rad);return(GeoXml.SEMI_MAJOR_AXIS*Math.log(Math.tan((rad+Math.PI/2) / 2) * Math.pow(((1 - GeoXml.ECCENTRICITY * sinrad) / (1 + GeoXml.ECCENTRICITY * sinrad)), (GeoXml.ECCENTRICITY/2))));};GeoXml.prototype.toggleLabels=function(on){if(!on){this.removeLabels();}else{this.addLabels();}};GeoXml.prototype.addLabels=function(){this.labels.onMap=true;this.labels.setMap(this.map);};GeoXml.prototype.removeLabels=function(){this.labels.onMap=false;this.labels.setMap(null);};var useLegacyLocalLoad=true;GeoXml.prototype.DownloadURL=function(fpath,callback,title){if(!fpath){return;}var xmlDoc;var that=this;var cmlurl=fpath;if(!topwin.standalone&&this.proxy){cmlurl=this.proxy+"url="+escape(cmlurl);}if(topwin.standalone||useLegacyLocalLoad){if(cmlurl.substring(2,3)==":"){xmlDoc=new ActiveXObject("Msxml2.DOMDocument.4.0");xmlDoc.validateOnParse=false;xmlDoc.async=true;xmlDoc.load(cmlurl);if(xmlDoc.parseError.errorCode!=0){var myErr=xmlDoc.parseError;alert("GeoXml file appears incorrect\n"+myErr.reason+" at line:"+myErr.line);}else{callback(xmlDoc.doc);}return;}}var cmlreq;/*@cc_on @*//*@if(@_jscript_version>=5)try{cmlreq=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{cmlreq=new ActiveXObject("Microsoft.XMLHTTP");}catch(E){alert("attempting xmlhttp");cmlreq=false;}}@end @*/if(!cmlreq&&typeof XMLHttpRequest!='undefined'){cmlreq=new XMLHttpRequest();}else{if(typeof ActiveXObject!="undefined"){cmlreq=new ActiveXObject("Microsoft.XMLHTTP");}}var here=cmlurl;if(cmlreq.overrideMimeType){cmlreq.overrideMimeType("text/xml");}cmlreq.open("GET",here,true);cmlreq.onreadystatechange=function(){switch(cmlreq.readyState){case 4:that.mb.showMess(title+" received",2000);if(typeof ActiveXObject!="undefined"){xmlDoc=new ActiveXObject("Microsoft.XMLDOM");xmlDoc.async="false";var response=cmlreq.responseText;callback(response);}else{if(cmlreq.responseXML){that.mb.showMess(title+" received",2000);callback(cmlreq.responseText);}else{if(cmlreq.status==200){var resp=cmlreq.responseText;var sresp=resp.substring(0,400);var isXML=resp.substring(0,5);if(isXML=="<?xml"&&sresp.indexOf("kml")!=-1){that.mb.showMess(title+" response received",2000);callback(resp.responseText);}else{that.mb.showMess("File does not appear to be a valid GeoData"+resp,6000);}}}}break;case 3:that.mb.showMess("Receiving "+title+"...",2000);break;case 2:that.mb.showMess("Waiting for "+title,2000);break;case 1:that.mb.showMess("Sent request for "+title,2000);break;}};try{cmlreq.send(null);}catch(err){if(cmlurl.substring(2,3)==":"&&!useLegacyLocalLoad){useLegacyLocalLoad=true;this.DownloadURL(cmlurl);}}};

/**
 * @fileOverview Renders KML on the Google Maps JavaScript API Version 3
 * @name GeoXML3
 * @author Sterling Udell, Larry Ross, Brendan Byrd
 * @see http://code.google.com/p/geoxml3/
 *
 * geoxml3.js
 *
 * Renders KML on the Google Maps JavaScript API Version 3
 * http://code.google.com/p/geoxml3/
 *
 * Copyright 2010 Sterling Udell, Larry Ross
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

if (!String.prototype.trim) {
/**
 * Remove leading and trailing whitespace.
 *
 * @augments String
 * @return {String}
 */
  String.prototype.trim = function () {
    return this.replace(/^\s+|\s+$/g, '');
  };
}

/**
 * @namespace The GeoXML3 namespace.
 */
geoXML3 = window.geoXML3 || {instances: []};

/**
 * Constructor for the root KML parser object.
 *
 * <p>All top-level objects and functions are declared under a namespace of geoXML3.
 * The core object is geoXML3.parser; typically, you'll instantiate a one parser
 * per map.</p>
 *
 * @class Main XML parser.
 * @param {geoXML3.parserOptions} options
 */
geoXML3.parser = function (options) {
  // Private variables
  var parserOptions = new geoXML3.parserOptions(options);
  var docs        = [];  // Individual KML documents
  var docsByUrl   = {};  // Same docs as an hash by cleanURL
  var kmzMetaData = {};  // Extra files from KMZ data
  var styles      = {};  // Global list of styles
  var lastPlacemark;
  var parserName;
  if (!parserOptions.infoWindow && parserOptions.singleInfoWindow)
    parserOptions.infoWindow = new google.maps.InfoWindow();

  var parseKmlString = function (kmlString, docSet) {
    // Internal values for the set of documents as a whole
    var internals = {
      parser: this,
      docSet: docSet || [],
      remaining: 1,
      parseOnly: !(parserOptions.afterParse || parserOptions.processStyles)
    };
    thisDoc = new Object();
    thisDoc.internals = internals;
    internals.docSet.push(thisDoc);
    render(geoXML3.xmlParse(kmlString),thisDoc);
  }

  var parse = function (urls, docSet) {
    // Process one or more KML documents
    if (!parserName) {
      parserName = 'geoXML3.instances[' + (geoXML3.instances.push(this) - 1) + ']';
    }

    if (typeof urls === 'string') {
      // Single KML document
      urls = [urls];
    }

    // Internal values for the set of documents as a whole
    var internals = {
      parser: this,
      docSet: docSet || [],
      remaining: urls.length,
      parseOnly: !(parserOptions.afterParse || parserOptions.processStyles)
    };
    var thisDoc, j;
    for (var i = 0; i < urls.length; i++) {
      var baseUrl = cleanURL(defileURL(location.pathname), urls[i]);
      if (docsByUrl[baseUrl]) {
        // Reloading an existing document
        thisDoc = docsByUrl[baseUrl];
        thisDoc.reload = true;
      }
      else {
        thisDoc = new Object();
        thisDoc.baseUrl = baseUrl;
        internals.docSet.push(thisDoc);
      }
      thisDoc.url       = urls[i];
      thisDoc.internals = internals;
      fetchDoc(thisDoc.url, thisDoc);
    }
  };

  function fetchDoc(url, doc, resFunc) {
    resFunc = resFunc || function (responseXML) { render(responseXML, doc); };

    if (typeof ZipFile === 'function' && typeof JSIO === 'object' && typeof JSIO.guessFileType === 'function') {  // KMZ support requires these modules loaded
      contentType = JSIO.guessFileType(doc.baseUrl);
      if (contentType == JSIO.FileType.Binary || contentType == JSIO.FileType.Unknown) {
         doc.isCompressed = true;
         doc.baseDir = doc.baseUrl + '/';
         geoXML3.fetchZIP(url, resFunc, doc.internals.parser);
         return;
      }
    }
    doc.isCompressed = false;
    doc.baseDir = defileURL(doc.baseUrl);
    geoXML3.fetchXML(url, resFunc);
  }

  var hideDocument = function (doc) {
    if (!doc) doc = docs[0];
    // Hide the map objects associated with a document
    var i;
    if (!!doc.markers) {
      for (i = 0; i < doc.markers.length; i++) {
        if(!!doc.markers[i].infoWindow) doc.markers[i].infoWindow.close();
        doc.markers[i].setVisible(false);
      }
    }
    if (!!doc.ggroundoverlays) {
      for (i = 0; i < doc.ggroundoverlays.length; i++) {
        doc.ggroundoverlays[i].setOpacity(0);
      }
    }
    if (!!doc.gpolylines) {
      for (i=0;i<doc.gpolylines.length;i++) {
        if(!!doc.gpolylines[i].infoWindow) doc.gpolylines[i].infoWindow.close();
        doc.gpolylines[i].setMap(null);
      }
    }
    if (!!doc.gpolygons) {
      for (i=0;i<doc.gpolygons.length;i++) {
        if(!!doc.gpolygons[i].infoWindow) doc.gpolygons[i].infoWindow.close();
        doc.gpolygons[i].setMap(null);
      }
    }
  };

  var showDocument = function (doc) {
    if (!doc) doc = docs[0];
    // Show the map objects associated with a document
    var i;
    if (!!doc.markers) {
      for (i = 0; i < doc.markers.length; i++) {
        doc.markers[i].setVisible(true);
      }
    }
    if (!!doc.ggroundoverlays) {
      for (i = 0; i < doc.ggroundoverlays.length; i++) {
        doc.ggroundoverlays[i].setOpacity(doc.ggroundoverlays[i].percentOpacity_);
      }
    }
    if (!!doc.gpolylines) {
      for (i=0;i<doc.gpolylines.length;i++) {
        doc.gpolylines[i].setMap(parserOptions.map);
      }
    }
    if (!!doc.gpolygons) {
      for (i=0;i<doc.gpolygons.length;i++) {
        doc.gpolygons[i].setMap(parserOptions.map);
      }
    }
  };

  var defaultStyle = {
    balloon: {
      bgColor:   'ffffffff',
      textColor: 'ff000000',
      text: "<h3>$[name]</h3>\n<div>$[description]</div>\n<div>$[geDirections]</div>",
      displayMode: 'default'
    },
    icon: {
      scale: 1.0,
      dim: {
        x: 0,
        y: 0,
        w: -1,
        h: -1
      },
      hotSpot: {
        x: 0.5,
        y: 0.5,
        xunits: 'fraction',
        yunits: 'fraction'
      }
    },
    line: {
      color: 'ffffffff', // white (KML default)
      colorMode: 'normal',
      width: 1.0
    },
    poly: {
      color: 'ffffffff', // white (KML default)
      colorMode: 'normal',
      fill: true,
      outline: true
    }
  };

  var kmlNS = 'http://www.opengis.net/kml/2.2';
  var gxNS  = 'http://www.google.com/kml/ext/2.2';
  var nodeValue              = geoXML3.nodeValue;
  var getBooleanValue        = geoXML3.getBooleanValue;
  var getElementsByTagNameNS = geoXML3.getElementsByTagNameNS;
  var getElementsByTagName   = geoXML3.getElementsByTagName;

function processStyleUrl(node) {
  var styleUrlStr = nodeValue(getElementsByTagName(node, 'styleUrl')[0]);
  if (!!styleUrlStr && styleUrlStr.indexOf('#') != -1) 
    var styleUrl = styleUrlStr.split('#');
  else var styleUrl = ["",""];
  return styleUrl;
}

  function processStyle(thisNode, baseUrl, styleID, baseDir) {
    var style = (baseUrl === '{inline}') ? clone(defaultStyle) : (styles[baseUrl][styleID] = styles[baseUrl][styleID] || clone(defaultStyle));

    var styleNodes = getElementsByTagName(thisNode, 'BalloonStyle');
    if (!!styleNodes && styleNodes.length > 0) {
      style.balloon.bgColor     = nodeValue(getElementsByTagName(styleNodes[0], 'bgColor')[0],     style.balloon.bgColor);
      style.balloon.textColor   = nodeValue(getElementsByTagName(styleNodes[0], 'textColor')[0],   style.balloon.textColor);
      style.balloon.text        = nodeValue(getElementsByTagName(styleNodes[0], 'text')[0],        style.balloon.text);
      style.balloon.displayMode = nodeValue(getElementsByTagName(styleNodes[0], 'displayMode')[0], style.balloon.displayMode);
    }

    // style.list = (unsupported; doesn't make sense in Google Maps)

    var styleNodes = getElementsByTagName(thisNode, 'IconStyle');
    if (!!styleNodes && styleNodes.length > 0) {
      var icon = style.icon;

      icon.scale = parseFloat(nodeValue(getElementsByTagName(styleNodes[0], 'scale')[0], icon.scale));
      // style.icon.heading   = (unsupported; not supported in API)
      // style.icon.color     = (unsupported; not supported in API)
      // style.icon.colorMode = (unsupported; not supported in API)

      styleNodes = getElementsByTagName(thisNode, 'Icon');
      if (!!styleNodes && styleNodes.length > 0) {
        icon.href = nodeValue(getElementsByTagName(styleNodes[0], 'href')[0]);
        icon.url  = cleanURL(baseDir, icon.href);
        // Detect images buried in KMZ files (and use a base64 encoded URL)
        if (kmzMetaData[icon.url]) icon.url = kmzMetaData[icon.url].dataUrl;

        // Support for icon palettes and exact size dimensions
        icon.dim = {
          x: parseInt(nodeValue(getElementsByTagNameNS(styleNodes[0], gxNS, 'x')[0], icon.dim.x)),
          y: parseInt(nodeValue(getElementsByTagNameNS(styleNodes[0], gxNS, 'y')[0], icon.dim.y)),
          w: parseInt(nodeValue(getElementsByTagNameNS(styleNodes[0], gxNS, 'w')[0], icon.dim.w)),
          h: parseInt(nodeValue(getElementsByTagNameNS(styleNodes[0], gxNS, 'h')[0], icon.dim.h))
        };

        styleNodes = getElementsByTagName(thisNode, 'hotSpot');
        if (!!styleNodes && styleNodes.length > 0) {
          icon.hotSpot = {
            x:      styleNodes[0].getAttribute('x'),
            y:      styleNodes[0].getAttribute('y'),
            xunits: styleNodes[0].getAttribute('xunits'),
            yunits: styleNodes[0].getAttribute('yunits')
          };
        }

        // certain occasions where we need the pixel size of the image (like the default settings...)
        // (NOTE: Scale is applied to entire image, not just the section of the icon palette.  So,
        //  if we need scaling, we'll need the img dimensions no matter what.)
        if ( (icon.dim.w < 0 || icon.dim.h < 0) && (icon.xunits != 'pixels' || icon.yunits == 'fraction') || icon.scale != 1.0) {
          // (hopefully, this will load by the time we need it...)
          icon.img = new Image();
          icon.img.onload = function() {
            if (icon.dim.w < 0 || icon.dim.h < 0) {
              icon.dim.w = this.width;
              icon.dim.h = this.height;
            }
          };
          icon.img.src = icon.url;

          // sometimes the file is already cached and it never calls onLoad
          if (icon.img.width > 0) {
            icon.dim.w = icon.img.width;
            icon.dim.h = icon.img.height;
          }
        }
      }
    }

    // style.label = (unsupported; may be possible but not with API)

    styleNodes = getElementsByTagName(thisNode, 'LineStyle');
    if (!!styleNodes && styleNodes.length > 0) {
      style.line.color     = nodeValue(getElementsByTagName(styleNodes[0], 'color')[0],     style.line.color);
      style.line.colorMode = nodeValue(getElementsByTagName(styleNodes[0], 'colorMode')[0], style.line.colorMode);
      style.line.width     = nodeValue(getElementsByTagName(styleNodes[0], 'width')[0],     style.line.width);
      // style.line.outerColor      = (unsupported; not supported in API)
      // style.line.outerWidth      = (unsupported; not supported in API)
      // style.line.physicalWidth   = (unsupported; unneccesary in Google Maps)
      // style.line.labelVisibility = (unsupported; possible to implement)
    }

    styleNodes = getElementsByTagName(thisNode, 'PolyStyle');
    if (!!styleNodes && styleNodes.length > 0) {
      style.poly.color     = nodeValue(      getElementsByTagName(styleNodes[0], 'color')[0],     style.poly.color);
      style.poly.colorMode = nodeValue(      getElementsByTagName(styleNodes[0], 'colorMode')[0], style.poly.colorMode);
      style.poly.outline   = getBooleanValue(getElementsByTagName(styleNodes[0], 'outline')[0],   style.poly.outline);
      style.poly.fill      = getBooleanValue(getElementsByTagName(styleNodes[0], 'fill')[0],      style.poly.fill);
    }
    return style;
  }

  // from http://stackoverflow.com/questions/122102/what-is-the-most-efficient-way-to-clone-a-javascript-object
  // http://keithdevens.com/weblog/archive/2007/Jun/07/javascript.clone
  function clone(obj){
    if(obj == null || typeof(obj) != 'object') return obj;
    if (obj.cloneNode) return obj.cloneNode(true);
    var temp = new obj.constructor();
    for(var key in obj) temp[key] = clone(obj[key]);
    return temp;
  }

  function processStyleMap(thisNode, baseUrl, styleID, baseDir) {
    var pairs = getElementsByTagName(thisNode, 'Pair');
    var map = new Object();

    // add each key to the map
    for (var pr=0;pr<pairs.length;pr++) {
      var pairKey      = nodeValue(getElementsByTagName(pairs[pr], 'key')[0]);
      var pairStyle    = nodeValue(getElementsByTagName(pairs[pr], 'Style')[0]);
      var pairStyleUrl = processStyleUrl(pairs[pr]);
      var pairStyleBaseUrl = pairStyleUrl[0] ? cleanURL(baseDir, pairStyleUrl[0]) : baseUrl;
      var pairStyleID      = pairStyleUrl[1];

      if (!!pairStyle) {
        map[pairKey] = processStyle(pairStyle, pairStyleBaseUrl, pairStyleID);
      } else if (!!pairStyleID && !!styles[pairStyleBaseUrl][pairStyleID]) {
        map[pairKey] = clone(styles[pairStyleBaseUrl][pairStyleID]);
      }
    }
    if (!!map["normal"]) {
      styles[baseUrl][styleID] = clone(map["normal"]);
    } else {
      styles[baseUrl][styleID] = clone(defaultStyle);
    }
    if (!!map["highlight"] && !!parserOptions.processStyles) {
      processStyleID(map["highlight"]);
    }
    styles[baseUrl][styleID].map = clone(map);
  }

  function processPlacemarkCoords(node, tag) {
    var parent = getElementsByTagName(node, tag);
    var coordListA = [];
    for (var i=0; i<parent.length; i++) {
      var coordNodes = getElementsByTagName(parent[i], 'coordinates');
      if (!coordNodes) {
        if (coordListA.length > 0) {
          break;
        } else {
          return [{coordinates: []}];
        }
      }

      for (var j=0; j<coordNodes.length;j++) {
        var coords = nodeValue(coordNodes[j]).trim();
        coords = coords.replace(/,\s+/g, ',');
        var path = coords.split(/\s+/g);
        var pathLength = path.length;
        var coordList = [];
        for (var k = 0; k < pathLength; k++) {
          coords = path[k].split(',');
          if (!isNaN(coords[0]) && !isNaN(coords[1])) {
            coordList.push({
              lat: parseFloat(coords[1]),
              lng: parseFloat(coords[0]),
              alt: parseFloat(coords[2])
            });
          }
        }
        coordListA.push({coordinates: coordList});
      }
    }
    return coordListA;
  }

  var render = function (responseXML, doc) {
    // Callback for retrieving a KML document: parse the KML and display it on the map
    if (!responseXML) {
      // Error retrieving the data
      geoXML3.log('Unable to retrieve ' + doc.url);
      if (parserOptions.failedParse) parserOptions.failedParse(doc);
      doc.failed = true;
      return;
    } else if (responseXML.parseError && responseXML.parseError.errorCode != 0) {
      // IE parse error
      var err = responseXML.parseError;
      var msg = 'Parse error in line ' + err.line + ', col ' + err.linePos + ' (error code: ' + err.errorCode + ")\n" +
        "\nError Reason: " + err.reason +
        'Error Line: ' + err.srcText;

      geoXML3.log('Unable to retrieve ' + doc.url + ': ' + msg);
      if (parserOptions.failedParse) parserOptions.failedParse(doc);
      doc.failed = true;
      return;
    } else if (responseXML.documentElement && responseXML.documentElement.nodeName == 'parsererror') {
      // Firefox parse error
      geoXML3.log('Unable to retrieve ' + doc.url + ': ' + responseXML.documentElement.childNodes[0].nodeValue);
      if (parserOptions.failedParse) parserOptions.failedParse(doc);
      doc.failed = true;
      return;
    } else if (!doc) {
      throw 'geoXML3 internal error: render called with null document';
    } else { //no errors
      var i;
      doc.placemarks      = [];
      doc.groundoverlays  = [];
      doc.ggroundoverlays = [];
      doc.networkLinks    = [];
      doc.gpolygons       = [];
      doc.gpolylines      = [];

      // Check for dependent KML files
      var nodes = getElementsByTagName(responseXML, 'styleUrl');
      var docSet = doc.internals.docSet;

      for (var i = 0; i < nodes.length; i++) {
        var url = nodeValue(nodes[i]).split('#')[0];
        if (!url)                 continue;  // #id (inside doc)
        var rUrl = cleanURL( doc.baseDir, url );
        if (rUrl === doc.baseUrl) continue;  // self
        if (docsByUrl[rUrl])      continue;  // already loaded

        var thisDoc;
        var j = docSet.indexOfObjWithItem('baseUrl', rUrl);
        if (j != -1) {
          // Already listed to be loaded, but probably in the wrong order.
          // Load it right away to immediately resolve dependency.
          thisDoc = docSet[j];
          if (thisDoc.failed) continue;  // failed to load last time; don't retry it again
        }
        else {
          // Not listed at all; add it in
          thisDoc           = new Object();
          thisDoc.url       = rUrl;  // url can't be trusted inside KMZ files, since it may .. outside of the archive
          thisDoc.baseUrl   = rUrl;
          thisDoc.internals = doc.internals;

          doc.internals.docSet.push(thisDoc);
          doc.internals.remaining++;
        }

        // render dependent KML first then re-run renderer
        fetchDoc(rUrl, thisDoc, function (thisResXML) {
          render(thisResXML, thisDoc);
          render(responseXML, doc);
        });

        // to prevent cross-dependency issues, just load the one
        // file first and re-check the rest later
        return;
      }

      // Parse styles
      doc.styles = styles[doc.baseUrl] = styles[doc.baseUrl] || {};
      var styleID, styleNodes;
      nodes = getElementsByTagName(responseXML, 'Style');
      nodeCount = nodes.length;
      for (i = 0; i < nodeCount; i++) {
        thisNode = nodes[i];
        var styleID = thisNode.getAttribute('id');
        if (!!styleID) processStyle(thisNode, doc.baseUrl, styleID, doc.baseDir);
      }
      // Parse StyleMap nodes
      nodes = getElementsByTagName(responseXML, 'StyleMap');
      for (i = 0; i < nodes.length; i++) {
        thisNode = nodes[i];
        var styleID = thisNode.getAttribute('id');
        if (!!styleID) processStyleMap(thisNode, doc.baseUrl, styleID, doc.baseDir);
      }

      if (!!parserOptions.processStyles || !parserOptions.createMarker) {
        // Convert parsed styles into GMaps equivalents
        processStyles(doc);
      }

      // Parse placemarks
      if (!!doc.reload && !!doc.markers) {
        for (i = 0; i < doc.markers.length; i++) {
          doc.markers[i].active = false;
        }
      }
      var placemark, node, coords, path, marker, poly;
      var placemark, coords, path, pathLength, marker, polygonNodes, coordList;
      var placemarkNodes = getElementsByTagName(responseXML, 'Placemark');
      for (pm = 0; pm < placemarkNodes.length; pm++) {
        // Init the placemark object
        node = placemarkNodes[pm];
        var styleUrl = processStyleUrl(node);
        placemark = {
          name:         nodeValue(getElementsByTagName(node, 'name')[0]),
          description:  nodeValue(getElementsByTagName(node, 'description')[0]),
          styleUrl:     styleUrl.join('#'),
          styleBaseUrl: styleUrl[0] ? cleanURL(doc.baseDir, styleUrl[0]) : doc.baseUrl,
          styleID:      styleUrl[1],
          visibility:        getBooleanValue(getElementsByTagName(node, 'visibility')[0], true),
          balloonVisibility: getBooleanValue(getElementsByTagNameNS(node, gxNS, 'balloonVisibility')[0], !parserOptions.suppressInfoWindows)
        };
        placemark.style = (styles[placemark.styleBaseUrl] && styles[placemark.styleBaseUrl][placemark.styleID]) || clone(defaultStyle);
        // inline style overrides shared style
        var inlineStyles = getElementsByTagName(node, 'Style');
        if (inlineStyles && (inlineStyles.length > 0)) {
          var style = processStyle(node, '{inline}', '{inline}');
          processStyleID(style);
          if (style) placemark.style = style;
        }

        if (/^https?:\/\//.test(placemark.description)) {
          placemark.description = ['<a href="', placemark.description, '">', placemark.description, '</a>'].join('');
        }

        // record list of variables for substitution
        placemark.vars = {
          display: {
            name:         'Name',
            description:  'Description',
            address:      'Street Address',
            id:           'ID',
            Snippet:      'Snippet',
            geDirections: 'Directions'
          },
          val: {
            name:        placemark.name || '',
            description: placemark.description || '',
            address:     nodeValue(getElementsByTagName(node, 'address')[0], ''),
            id:          node.getAttribute('id') || '',
            Snippet:     nodeValue(getElementsByTagName(node, 'Snippet')[0], '')
          },
          directions: [
            'f=d',
            'source=GeoXML3'
          ]
        };

        // add extended data to variables
        var extDataNodes = getElementsByTagName(node, 'ExtendedData');
        if (!!extDataNodes && extDataNodes.length > 0) {
          var dataNodes = getElementsByTagName(extDataNodes[0], 'Data');
          for (var d = 0; d < dataNodes.length; d++) {
            var dn    = dataNodes[d];
            var name  = dn.getAttribute('name');
            if (!name) continue;
            var dName = nodeValue(getElementsByTagName(dn, 'displayName')[0], name);
            var val   = nodeValue(getElementsByTagName(dn, 'value')[0]);

            placemark.vars.val[name]     = val;
            placemark.vars.display[name] = dName;
          }
        }

        // process MultiGeometry
        var GeometryNodes = getElementsByTagName(node, 'coordinates');
        var Geometry = null;
        if (!!GeometryNodes && (GeometryNodes.length > 0)) {
          for (var gn=0;gn<GeometryNodes.length;gn++) {
            if (GeometryNodes[gn].parentNode &&
                GeometryNodes[gn].parentNode.nodeName) {
              var GeometryPN = GeometryNodes[gn].parentNode;
              Geometry = GeometryPN.nodeName;

              // Extract the coordinates
              // What sort of placemark?
              switch(Geometry) {
                case "Point":
                  placemark.Point = processPlacemarkCoords(node, "Point")[0];
                  placemark.latlng = new google.maps.LatLng(placemark.Point.coordinates[0].lat, placemark.Point.coordinates[0].lng);
                  pathLength = 1;
                  break;
                case "LinearRing":
                  // Polygon/line
                  polygonNodes = getElementsByTagName(node, 'Polygon');
                  // Polygon
                  if (!placemark.Polygon)
                    placemark.Polygon = [{
                      outerBoundaryIs: {coordinates: []},
                      innerBoundaryIs: [{coordinates: []}]
                    }];
                  for (var pg=0;pg<polygonNodes.length;pg++) {
                     placemark.Polygon[pg] = {
                       outerBoundaryIs: {coordinates: []},
                       innerBoundaryIs: [{coordinates: []}]
                     }
                     placemark.Polygon[pg].outerBoundaryIs = processPlacemarkCoords(polygonNodes[pg], "outerBoundaryIs");
                     placemark.Polygon[pg].innerBoundaryIs = processPlacemarkCoords(polygonNodes[pg], "innerBoundaryIs");
                  }
                  coordList = placemark.Polygon[0].outerBoundaryIs;
                  break;

                case "LineString":
                  pathLength = 0;
                  placemark.LineString = processPlacemarkCoords(node,"LineString");
                  break;

                default:
                  break;
              }
            }
          }
        }

        // call the custom placemark parse function if it is defined
        if (!!parserOptions.pmParseFn) parserOptions.pmParseFn(node, placemark);
        doc.placemarks.push(placemark);

        // single marker
        if (placemark.Point) {
          if (!!google.maps) {
            doc.bounds = doc.bounds || new google.maps.LatLngBounds();
            doc.bounds.extend(placemark.latlng);
          }

          // Potential user-defined marker handler
          var pointCreateFunc = parserOptions.createMarker || createMarker;
          var found = false;
          if (!parserOptions.createMarker) {
            // Check to see if this marker was created on a previous load of this document
            if (!!doc) {
              doc.markers = doc.markers || [];
              if (doc.reload) {
                for (var j = 0; j < doc.markers.length; j++) {
                  if (doc.markers[j].getPosition().equals(placemark.latlng)) {
                    found = doc.markers[j].active = true;
                    break;
                  }
                }
              }
            }
          }
          if (!found) {
            // Call the marker creator
            var marker = pointCreateFunc(placemark, doc);
            if (marker) marker.active = placemark.visibility;
          }
        }
        // polygon/line
        var poly, line;
        if (!!doc) {
          if (placemark.Polygon)    doc.gpolygons  = doc.gpolygons  || [];
          if (placemark.LineString) doc.gpolylines = doc.gpolylines || [];
        }

        var polyCreateFunc = parserOptions.createPolygon    || createPolygon;
        var lineCreateFunc = parserOptions.createLineString || createPolyline;
        if (placemark.Polygon) {
          poly = polyCreateFunc(placemark,doc);
          if (poly) poly.active = placemark.visibility;
        }
        if (placemark.LineString) {
          line = lineCreateFunc(placemark,doc);
          if (line) line.active = placemark.visibility;
        }
        if (!!google.maps) {
          doc.bounds = doc.bounds || new google.maps.LatLngBounds();
          if (poly) doc.bounds.union(poly.bounds);
          if (line) doc.bounds.union(line.bounds);
        }

      } // placemark loop

      if (!!doc.reload && !!doc.markers) {
        for (i = doc.markers.length - 1; i >= 0 ; i--) {
          if (!doc.markers[i].active) {
            if (!!doc.markers[i].infoWindow) {
              doc.markers[i].infoWindow.close();
            }
            doc.markers[i].setMap(null);
            doc.markers.splice(i, 1);
          }
        }
      }

      // Parse ground overlays
      if (!!doc.reload && !!doc.groundoverlays) {
        for (i = 0; i < doc.groundoverlays.length; i++) {
          doc.groundoverlays[i].active = false;
        }
      }

      if (!!doc) {
        doc.groundoverlays = doc.groundoverlays || [];
      }
      // doc.groundoverlays =[];
      var groundOverlay, color, transparency, overlay;
      var groundNodes = getElementsByTagName(responseXML, 'GroundOverlay');
      for (i = 0; i < groundNodes.length; i++) {
        node = groundNodes[i];

        // Detect images buried in KMZ files (and use a base64 encoded URL)
        var gnUrl = cleanURL( doc.baseDir, nodeValue(getElementsByTagName(node, 'href')[0]) );
        if (kmzMetaData[gnUrl]) gnUrl = kmzMetaData[gnUrl].dataUrl;

        // Init the ground overlay object
        groundOverlay = {
          name:        nodeValue(getElementsByTagName(node, 'name')[0]),
          description: nodeValue(getElementsByTagName(node, 'description')[0]),
          icon: { href: gnUrl },
          latLonBox: {
            north: parseFloat(nodeValue(getElementsByTagName(node, 'north')[0])),
            east:  parseFloat(nodeValue(getElementsByTagName(node, 'east')[0])),
            south: parseFloat(nodeValue(getElementsByTagName(node, 'south')[0])),
            west:  parseFloat(nodeValue(getElementsByTagName(node, 'west')[0]))
          }
        };
        if (!!google.maps) {
          doc.bounds = doc.bounds || new google.maps.LatLngBounds();
          doc.bounds.union(new google.maps.LatLngBounds(
            new google.maps.LatLng(groundOverlay.latLonBox.south, groundOverlay.latLonBox.west),
            new google.maps.LatLng(groundOverlay.latLonBox.north, groundOverlay.latLonBox.east)
          ));
        }

        // Opacity is encoded in the color node
        var colorNode = getElementsByTagName(node, 'color');
        if (colorNode && colorNode.length > 0) {
          groundOverlay.opacity = geoXML3.getOpacity(nodeValue(colorNode[0]));
        } else {
          groundOverlay.opacity = 1.0;  // KML default
        }

        doc.groundoverlays.push(groundOverlay);
        if (!!parserOptions.createOverlay) {
          // User-defined overlay handler
          parserOptions.createOverlay(groundOverlay, doc);
        } else {
          // Check to see if this overlay was created on a previous load of this document
          var found = false;
          if (!!doc) {
            doc.groundoverlays = doc.groundoverlays || [];
            if (doc.reload) {
              overlayBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(groundOverlay.latLonBox.south, groundOverlay.latLonBox.west),
                new google.maps.LatLng(groundOverlay.latLonBox.north, groundOverlay.latLonBox.east)
              );
              var overlays = doc.groundoverlays;
              for (i = overlays.length; i--;) {
                if ((overlays[i].bounds().equals(overlayBounds)) &&
                    (overlays.url_ === groundOverlay.icon.href)) {
                  found = overlays[i].active = true;
                  break;
                }
              }
            }
          }

          if (!found) {
            // Call the built-in overlay creator
            overlay = createOverlay(groundOverlay, doc);
            overlay.active = true;
          }
        }
        if (!!doc.reload && !!doc.groundoverlays && !!doc.groundoverlays.length) {
          var overlays = doc.groundoverlays;
          for (i = overlays.length; i--;) {
            if (!overlays[i].active) {
              overlays[i].remove();
              overlays.splice(i, 1);
            }
          }
          doc.groundoverlays = overlays;
        }
      }

      // Parse network links
      var networkLink;
      var docPath = document.location.pathname.split('/');
      docPath = docPath.splice(0, docPath.length - 1).join('/');
      var linkNodes = getElementsByTagName(responseXML, 'NetworkLink');
      for (i = 0; i < linkNodes.length; i++) {
        node = linkNodes[i];

        // Init the network link object
        networkLink = {
          name: nodeValue(getElementsByTagName(node, 'name')[0]),
          link: {
            href:        nodeValue(getElementsByTagName(node, 'href')[0]),
            refreshMode: nodeValue(getElementsByTagName(node, 'refreshMode')[0])
          }
        };

        // Establish the specific refresh mode
        if (!networkLink.link.refreshMode) {
          networkLink.link.refreshMode = 'onChange';
        }
        if (networkLink.link.refreshMode === 'onInterval') {
          networkLink.link.refreshInterval = parseFloat(nodeValue(getElementsByTagName(node, 'refreshInterval')[0]));
          if (isNaN(networkLink.link.refreshInterval)) {
            networkLink.link.refreshInterval = 0;
          }
        } else if (networkLink.link.refreshMode === 'onChange') {
          networkLink.link.viewRefreshMode = nodeValue(getElementsByTagName(node, 'viewRefreshMode')[0]);
          if (!networkLink.link.viewRefreshMode) {
            networkLink.link.viewRefreshMode = 'never';
          }
          if (networkLink.link.viewRefreshMode === 'onStop') {
            networkLink.link.viewRefreshTime = nodeValue(getElementsByTagName(node, 'refreshMode')[0]);
            networkLink.link.viewFormat =      nodeValue(getElementsByTagName(node, 'refreshMode')[0]);
            if (!networkLink.link.viewFormat) {
              networkLink.link.viewFormat = 'BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]';
            }
          }
        }

        if (!/^[\/|http]/.test(networkLink.link.href)) {
          // Fully-qualify the HREF
          networkLink.link.href = docPath + '/' + networkLink.link.href;
        }

        // Apply the link
        if ((networkLink.link.refreshMode === 'onInterval') &&
            (networkLink.link.refreshInterval > 0)) {
          // Reload at regular intervals
          setInterval(parserName + '.parse("' + networkLink.link.href + '")',
                      1000 * networkLink.link.refreshInterval);
        } else if (networkLink.link.refreshMode === 'onChange') {
          if (networkLink.link.viewRefreshMode === 'never') {
            // Load the link just once
            doc.internals.parser.parse(networkLink.link.href, doc.internals.docSet);
          } else if (networkLink.link.viewRefreshMode === 'onStop') {
            // Reload when the map view changes

          }
        }
      }
    }

    if (!!doc.bounds) {
      doc.internals.bounds = doc.internals.bounds || new google.maps.LatLngBounds();
      doc.internals.bounds.union(doc.bounds);
    }
    if (!!doc.markers || !!doc.groundoverlays || !!doc.gpolylines || !!doc.gpolygons) {
      doc.internals.parseOnly = false;
    }

    if (!doc.internals.parseOnly) {
      // geoXML3 is not being used only as a real-time parser, so keep the processed documents around
      if (!docsByUrl[doc.baseUrl]) {
        docs.push(doc);
        docsByUrl[doc.baseUrl] = doc;
      }
      else {
        // internal replacement, which keeps the same memory ref loc in docs and docsByUrl
        for (var i in docsByUrl[doc.baseUrl]) {
          docsByUrl[doc.baseUrl][i] = doc[i];
        }
      }
    }

    doc.internals.remaining--;
    if (doc.internals.remaining === 0) {
      // We're done processing this set of KML documents
      // Options that get invoked after parsing completes
      if (parserOptions.zoom && !!doc.internals.bounds &&
          !doc.internals.bounds.isEmpty() && !!parserOptions.map) {
        parserOptions.map.fitBounds(doc.internals.bounds);
      }
      if (parserOptions.afterParse) {
        parserOptions.afterParse(doc.internals.docSet);
      }
    }
  };

  var kmlColor = function (kmlIn, colorMode) {
    var kmlColor = {};
    kmlIn = kmlIn || 'ffffffff';  // white (KML 2.2 default)

    var aa = kmlIn.substr(0,2);
    var bb = kmlIn.substr(2,2);
    var gg = kmlIn.substr(4,2);
    var rr = kmlIn.substr(6,2);

    kmlColor.opacity = parseInt(aa, 16) / 256;
    kmlColor.color   = (colorMode === 'random') ? randomColor(rr, gg, bb) : '#' + rr + gg + bb;
    return kmlColor;
  };

  // Implemented per KML 2.2 <ColorStyle> specs
  var randomColor = function(rr, gg, bb) {
    var col = { rr: rr, gg: gg, bb: bb };
    for (var k in col) {
      var v = col[k];
      if (v == null) v = 'ff';

      // RGB values are limiters for random numbers (ie: 7f would be a random value between 0 and 7f)
      v = Math.round(Math.random() * parseInt(rr, 16)).toString(16);
      if (v.length === 1) v = '0' + v;
      col[k] = v;
    }

    return '#' + col.rr + col.gg + col.bb;
  };

  var processStyleID = function (style) {
    var icon = style.icon;
    if (!icon.href) return;

    if (icon.img && !icon.img.complete && (icon.dim.w < 0) && (icon.dim.h < 0) ) {
      // we're still waiting on the image loading (probably because we've been blocking since the declaration)
      // so, let's queue this function on the onload stack
      icon.markerBacklog = [];
      icon.img.onload = function() {
        if (icon.dim.w < 0 || icon.dim.h < 0) {
          icon.dim.w = this.width;
          icon.dim.h = this.height;
        }
        processStyleID(style);

        // we will undoubtedly get some createMarker queuing, so set this up in advance
        for (var i = 0; i < icon.markerBacklog.length; i++) {
          var p = icon.markerBacklog[i][0];
          var d = icon.markerBacklog[i][1];
          createMarker(p, d);
          if (p.marker) p.marker.active = true;
        }
        delete icon.markerBacklog;
      };
      return;
    }
    else if (icon.dim.w < 0 || icon.dim.h < 0) {
      if (icon.img && icon.img.complete) {
        // sometimes the file is already cached and it never calls onLoad
        icon.dim.w = icon.img.width;
        icon.dim.h = icon.img.height;
      }
      else {
        // settle for a default of 32x32
        icon.dim.whGuess = true;
        icon.dim.w = 32;
        icon.dim.h = 32;
      }
    }

    // pre-scaled variables
    var rnd = Math.round;
    var scaled = {
      x:  icon.dim.x     * icon.scale,
      y:  icon.dim.y     * icon.scale,
      w:  icon.dim.w     * icon.scale,
      h:  icon.dim.h     * icon.scale,
      aX: icon.hotSpot.x * icon.scale,
      aY: icon.hotSpot.y * icon.scale,
      iW: (icon.img ? icon.img.width  : icon.dim.w) * icon.scale,
      iH: (icon.img ? icon.img.height : icon.dim.h) * icon.scale
    };

    // Figure out the anchor spot
    var aX, aY;
    switch (icon.hotSpot.xunits) {
      case 'fraction':    aX = rnd(scaled.aX * icon.dim.w); break;
      case 'insetPixels': aX = rnd(icon.dim.w * icon.scale - scaled.aX); break;
      default:            aX = rnd(scaled.aX); break;  // already pixels
    }
    aY = rnd( ((icon.hotSpot.yunits === 'fraction') ? icon.dim.h : 1) * scaled.aY );  // insetPixels Y = pixels Y
    var iconAnchor = new google.maps.Point(aX, aY);

    // Sizes
    // (NOTE: Scale is applied to entire image, not just the section of the icon palette.)
    var iconSize   = icon.dim.whGuess  ? null : new google.maps.Size(rnd(scaled.w),  rnd(scaled.h));
    var iconScale  = icon.scale == 1.0 ? null :
                     icon.dim.whGuess  ?        new google.maps.Size(rnd(scaled.w),  rnd(scaled.h))
                                              : new google.maps.Size(rnd(scaled.iW), rnd(scaled.iH));
    var iconOrigin = new google.maps.Point(rnd(scaled.x), rnd(scaled.y));

    // Detect images buried in KMZ files (and use a base64 encoded URL)
    if (kmzMetaData[icon.url]) icon.url = kmzMetaData[icon.url].dataUrl;

    // Init the style object with the KML icon
    icon.marker = new google.maps.MarkerImage(
      icon.url,    // url
      iconSize,    // size
      iconOrigin,  // origin
      iconAnchor,  // anchor
      iconScale    // scaledSize
    );

    // Look for a predictable shadow
    var stdRegEx = /\/(red|blue|green|yellow|lightblue|purple|pink|orange)(-dot)?\.png/;
    var shadowSize = new google.maps.Size(59, 32);
    var shadowPoint = new google.maps.Point(16, 32);
    if (stdRegEx.test(icon.href)) {
      // A standard GMap-style marker icon
      icon.shadow = new google.maps.MarkerImage(
        'http://maps.google.com/mapfiles/ms/micons/msmarker.shadow.png', // url
        shadowSize,                                                      // size
        null,                                                            // origin
        shadowPoint,                                                     // anchor
        shadowSize                                                       // scaledSize
      );
    } else if (icon.href.indexOf('-pushpin.png') > -1) {
      // Pushpin marker icon
      icon.shadow = new google.maps.MarkerImage(
        'http://maps.google.com/mapfiles/ms/micons/pushpin_shadow.png',  // url
        shadowSize,                                                      // size
        null,                                                            // origin
        shadowPoint,                                                     // anchor
        shadowSize                                                       // scaledSize
      );
    } /* else {
      // Other MyMaps KML standard icon
      icon.shadow = new google.maps.MarkerImage(
        icon.href.replace('.png', '.shadow.png'),                        // url
        shadowSize,                                                      // size
        null,                                                            // origin
        anchorPoint,                                                     // anchor
        shadowSize                                                       // scaledSize
      );
    } */
  }

  var processStyles = function (doc) {
    for (var styleID in doc.styles) {
      processStyleID(doc.styles[styleID]);
    }
  };

  var createMarker = function (placemark, doc) {
    // create a Marker to the map from a placemark KML object
    var icon = placemark.style.icon;

    if ( !icon.marker && icon.img ) {
      // yay, single point of failure is holding up multiple markers...
      icon.markerBacklog = icon.markerBacklog || [];
      icon.markerBacklog.push([placemark, doc]);
      return;
    }

    // Load basic marker properties
    var markerOptions = geoXML3.combineOptions(parserOptions.markerOptions, {
      map:      parserOptions.map,
      position: new google.maps.LatLng(placemark.Point.coordinates[0].lat, placemark.Point.coordinates[0].lng),
      title:    placemark.name,
      zIndex:   Math.round(placemark.Point.coordinates[0].lat * -100000)<<5,
      icon:     icon.marker,
      shadow:   icon.shadow,
      flat:     !icon.shadow,
      visible:  placemark.visibility
    });

    // Create the marker on the map
    var marker = new google.maps.Marker(markerOptions);
    if (!!doc) doc.markers.push(marker);

    // Set up and create the infowindow if it is not suppressed
    createInfoWindow(placemark, doc, marker);
    placemark.marker = marker;
    return marker;
  };

  var createOverlay = function (groundOverlay, doc) {
    // Add a ProjectedOverlay to the map from a groundOverlay KML object

    if (!window.ProjectedOverlay) {
      throw 'geoXML3 error: ProjectedOverlay not found while rendering GroundOverlay from KML';
    }

    var bounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(groundOverlay.latLonBox.south, groundOverlay.latLonBox.west),
        new google.maps.LatLng(groundOverlay.latLonBox.north, groundOverlay.latLonBox.east)
    );
    var overlayOptions = geoXML3.combineOptions(parserOptions.overlayOptions, {percentOpacity: groundOverlay.opacity*100});
    var overlay = new ProjectedOverlay(parserOptions.map, groundOverlay.icon.href, bounds, overlayOptions);

    if (!!doc) {
      doc.ggroundoverlays = doc.ggroundoverlays || [];
      doc.ggroundoverlays.push(overlay);
    }

    return overlay;
  };

  // Create Polyline
  var createPolyline = function(placemark, doc) {
    var path = [];
    for (var j=0; j<placemark.LineString.length; j++) {
      var coords = placemark.LineString[j].coordinates;
      var bounds = new google.maps.LatLngBounds();
      for (var i=0;i<coords.length;i++) {
        var pt = new google.maps.LatLng(coords[i].lat, coords[i].lng);
        path.push(pt);
        bounds.extend(pt);
      }
    }
    // point to open the infowindow if triggered
    var point = path[Math.floor(path.length/2)];
    // Load basic polyline properties
    var kmlStrokeColor = kmlColor(placemark.style.line.color, placemark.style.line.colorMode);
    var polyOptions = geoXML3.combineOptions(parserOptions.polylineOptions, {
      map:           parserOptions.map,
      path:          path,
      strokeColor:   kmlStrokeColor.color,
      strokeWeight:  placemark.style.line.width,
      strokeOpacity: kmlStrokeColor.opacity,
      title:         placemark.name,
      visible:       placemark.visibility
    });
    var p = new google.maps.Polyline(polyOptions);
    p.bounds = bounds;

    // setup and create the infoWindow if it is not suppressed
    createInfoWindow(placemark, doc, p);
    if (!!doc) doc.gpolylines.push(p);
    placemark.polyline = p;
    return p;
  }

  // Create Polygon
  var createPolygon = function(placemark, doc) {
    var bounds = new google.maps.LatLngBounds();
    var pathsLength = 0;
    var paths = [];
    for (var polygonPart=0;polygonPart<placemark.Polygon.length;polygonPart++) {
      for (var j=0; j<placemark.Polygon[polygonPart].outerBoundaryIs.length; j++) {
        var coords = placemark.Polygon[polygonPart].outerBoundaryIs[j].coordinates;
        var path = [];
        for (var i=0;i<coords.length;i++) {
          var pt = new google.maps.LatLng(coords[i].lat, coords[i].lng);
          path.push(pt);
          bounds.extend(pt);
        }
        paths.push(path);
        pathsLength += path.length;
      }
      for (var j=0; j<placemark.Polygon[polygonPart].innerBoundaryIs.length; j++) {
        var coords = placemark.Polygon[polygonPart].innerBoundaryIs[j].coordinates;
        var path = [];
        for (var i=0;i<coords.length;i++) {
          var pt = new google.maps.LatLng(coords[i].lat, coords[i].lng);
          path.push(pt);
          bounds.extend(pt);
        }
        paths.push(path);
        pathsLength += path.length;
      }
    }

    // Load basic polygon properties
    var kmlStrokeColor = kmlColor(placemark.style.line.color, placemark.style.line.colorMode);
    var kmlFillColor = kmlColor(placemark.style.poly.color, placemark.style.poly.colorMode);
    if (!placemark.style.poly.fill) kmlFillColor.opacity = 0.0;
    var strokeWeight = placemark.style.line.width;
    if (!placemark.style.poly.outline) {
      strokeWeight = 0;
      kmlStrokeColor.opacity = 0.0;
    }
    var polyOptions = geoXML3.combineOptions(parserOptions.polygonOptions, {
      map:           parserOptions.map,
      paths:         paths,
      title:         placemark.name,
      strokeColor:   kmlStrokeColor.color,
      strokeWeight:  strokeWeight,
      strokeOpacity: kmlStrokeColor.opacity,
      fillColor:     kmlFillColor.color,
      fillOpacity:   kmlFillColor.opacity,
      visible:       placemark.visibility
    });
    var p = new google.maps.Polygon(polyOptions);
    p.bounds = bounds;

    createInfoWindow(placemark, doc, p);
    if (!!doc) doc.gpolygons.push(p);
    placemark.polygon = p;
    return p;
  }

  var createInfoWindow = function(placemark, doc, gObj) {
    var bStyle = placemark.style.balloon;
    var vars = placemark.vars;

    if (!placemark.balloonVisibility || bStyle.displayMode === 'hide') return;

    // define geDirections
    if (placemark.latlng) {
      vars.directions.push('sll=' + placemark.latlng.toUrlValue());

      var url = 'http://maps.google.com/maps?' + vars.directions.join('&');
      var address = encodeURIComponent( vars.val.address || placemark.latlng.toUrlValue() ).replace(/\%20/g, '+');

      vars.val.geDirections = '<a href="' + url + '&daddr=' + address + '" target=_blank>To Here</a> - <a href="' + url + '&saddr=' + address + '" target=_blank>From Here</a>';
    }
    else vars.val.geDirections = '';

    // add in the variables
    var iwText = bStyle.text.replace(/\$\[(\w+(\/displayName)?)\]/g, function(txt, n, dn) { return dn ? vars.display[n] : vars.val[n]; });
    var classTxt = 'geoxml3_infowindow geoxml3_style_' + placemark.styleID;

    // color styles
    var styleArr = [];
    if (bStyle.bgColor   != 'ffffffff') styleArr.push('background: ' + kmlColor(bStyle.bgColor  ).color + ';');
    if (bStyle.textColor != 'ff000000') styleArr.push('color: '      + kmlColor(bStyle.textColor).color + ';');
    var styleProp = styleArr.length ? ' style="' + styleArr.join(' ') + '"' : '';

    var infoWindowOptions = geoXML3.combineOptions(parserOptions.infoWindowOptions, {
      content: '<div class="' + classTxt + '"' + styleProp + '>' + iwText + '</div>',
      pixelOffset: new google.maps.Size(0, 2)
    });

    gObj.infoWindow = parserOptions.infoWindow || new google.maps.InfoWindow(infoWindowOptions);
    gObj.infoWindowOptions = infoWindowOptions;

    // Info Window-opening event handler
    google.maps.event.addListener(gObj, 'click', function(e) {
      var iW = this.infoWindow;
      iW.close();
      iW.setOptions(this.infoWindowOptions);

      if      (e && e.latLng) iW.setPosition(e.latLng);
      else if (this.bounds)   iW.setPosition(this.bounds.getCenter());

      iW.setContent("<div id='geoxml3_infowindow'>"+iW.getContent()+"</div>");
      google.maps.event.addListenerOnce(iW, "domready", function() {
        var node = document.getElementById('geoxml3_infowindow');
        var imgArray = node.getElementsByTagName('img');
        for (var i = 0; i < imgArray.length; i++) 
        {
          var imgUrlIE = imgArray[i].getAttribute("src");
          var imgUrl  = cleanURL(doc.baseDir, imgUrlIE);

          if (kmzMetaData[imgUrl]) {
             imgArray[i].src = kmzMetaData[imgUrl].dataUrl;
          } else if (kmzMetaData[imgUrlIE]) {
             imgArray[i].src = kmzMetaData[imgUrlIE].dataUrl;
          }
        }
      });
      iW.open(this.map, this.bounds ? null : this);
    });

  }

  return {
    // Expose some properties and methods

    options:     parserOptions,
    docs:        docs,
    docsByUrl:   docsByUrl,
    kmzMetaData: kmzMetaData,

    parse:          parse,
    render:         render,
    parseKmlString: parseKmlString,
    hideDocument:   hideDocument,
    showDocument:   showDocument,
    processStyles:  processStyles,
    createMarker:   createMarker,
    createOverlay:  createOverlay,
    createPolyline: createPolyline,
    createPolygon:  createPolygon
  };
};
// End of KML Parser

// Helper objects and functions
geoXML3.getOpacity = function (kmlColor) {
  // Extract opacity encoded in a KML color value. Returns a number between 0 and 1.
  if (!!kmlColor &&
      (kmlColor !== '') &&
      (kmlColor.length == 8)) {
    var transparency = parseInt(kmlColor.substr(0, 2), 16);
    return transparency / 255;
  } else {
    return 1;
  }
};

// Log a message to the debugging console, if one exists
geoXML3.log = function(msg) {
  if (!!window.console) {
    console.log(msg);
  } else { alert("log:"+msg); }
};

/**
 * Creates a new parserOptions object.
 * @class GeoXML3 parser options.
 * @param {Object} overrides Any options you want to declare outside of the defaults should be included here.
 * @property {google.maps.Map} map The API map on which geo objects should be rendered.
 * @property {google.maps.MarkerOptions} markerOptions If the parser is adding Markers to the map itself, any options specified here will be applied to them.
 * @property {google.maps.InfoWindowOptions} infoWindowOptions If the parser is adding Markers to the map itself, any options specified here will be applied to their attached InfoWindows.
 * @property {ProjectedOverlay.options} overlayOptions If the parser is adding ProjectedOverlays to the map itself, any options specified here will be applied to them.
 */
geoXML3.parserOptions = function (overrides) {
  this.map                 = null,
  /** If true, the parser will automatically move the map to a best-fit of the geodata after parsing of a KML document completes.
   * @type Boolean
   * @default true
   */
  this.zoom                = true,
  /**#@+ @type Boolean
   *     @default false */
  /** If true, only a single Marker created by the parser will be able to have its InfoWindow open at once (simulating the behavior of GMaps API v2). */
  this.singleInfoWindow    = false,
  /** If true, suppresses the rendering of info windows. */
  this.suppressInfoWindows = false,
  /**
   * Control whether to process styles now or later.
   *
   * <p>By default, the parser only processes KML &lt;Style&gt; elements into their GMaps equivalents
   * if it will be creating its own Markers (the createMarker option is null). Setting this option
   * to true will force such processing to happen anyway, useful if you're going to be calling parser.createMarker
   * yourself later. OTOH, leaving this option false removes runtime dependency on the GMaps API, enabling
   * the use of geoXML3 as a standalone KML parser.</p>
   */
  this.processStyles       = false,
  /**#@-*/

  this.markerOptions       = {},
  this.infoWindowOptions   = {},
  this.overlayOptions      = {},

  /**#@+ @event */
  /** This function will be called when parsing of a KML document is complete.
   * @param {geoXML3.parser#docs} doc Parsed KML data. */
  this.afterParse          = null,
  /** This function will be called when parsing of a KML document is complete.
   * @param {geoXML3.parser#docs} doc Parsed KML data. */
  this.failedParse         = null,
  /**
   * If supplied, this function will be called once for each marker <Placemark> in the KML document, instead of the parser adding its own Marker to the map.
   * @param {geoXML3.parser.render#placemark} placemark Placemark object.
   * @param {geoXML3.parser#docs} doc Parsed KML data.
   */
  this.createMarker        = null,
  /**
   * If supplied, this function will be called once for each <GroundOverlay> in the KML document, instead of the parser adding its own ProjectedOverlay to the map.
   * @param {geoXML3.parser.render#groundOverlay} groundOverlay GroundOverlay object.
   * @param {geoXML3.parser#docs} doc Parsed KML data.
   */
  this.createOverlay       = null
  /**#@-*/

  if (overrides) {
    for (var prop in overrides) {
      if (overrides.hasOwnProperty(prop)) this[prop] = overrides[prop];
    }
  }
  return this;
};

/**
 * Combine two options objects: a set of default values and a set of override values.
 *
 * @deprecated This has been replaced with {@link geoXML3.parserOptions#combineOptions}.
 * @param {geoXML3.parserOptions|Object} overrides Override values.
 * @param {geoXML3.parserOptions|Object} defaults Default values.
 * @return {geoXML3.parserOptions} Combined result.
 */
geoXML3.combineOptions = function (overrides, defaults) {
  var result = {};
  if (!!overrides) {
    for (var prop in overrides) {
      if (overrides.hasOwnProperty(prop))                              result[prop] = overrides[prop];
    }
  }
  if (!!defaults) {
    for (prop in defaults) {
      if (defaults.hasOwnProperty(prop) && result[prop] === undefined) result[prop] = defaults[prop];
    }
  }
  return result;
};

/**
 * Combine two options objects: a set of default values and a set of override values.
 *
 * @function
 * @param {geoXML3.parserOptions|Object} overrides Override values.
 * @param {geoXML3.parserOptions|Object} defaults Default values.
 * @return {geoXML3.parserOptions} Combined result.
 */
geoXML3.parserOptions.prototype.combineOptions = geoXML3.combineOptions;

// Retrieve an XML document from url and pass it to callback as a DOM document
geoXML3.fetchers = [];

/**
 * Parses a XML string.
 *
 * <p>Parses the given XML string and returns the parsed document in a
 * DOM data structure. This function will return an empty DOM node if
 * XML parsing is not supported in this browser.</p>
 *
 * @param {String} str XML string.
 * @return {Element|Document} DOM.
 */
geoXML3.xmlParse = function (str) {
  if (typeof ActiveXObject != 'undefined' && typeof GetObject != 'undefined') {
    var doc = new ActiveXObject('Microsoft.XMLDOM');
    doc.loadXML(str);
    return doc;
  }

  if (typeof DOMParser != 'undefined') {
    return (new DOMParser()).parseFromString(str, 'text/xml');
  }

  return createElement('div', null);
}

/**
 * Fetches a XML document.
 *
 * <p>Fetches/parses the given XML URL and passes the parsed document (in a
 * DOM data structure) to the given callback.  Documents are downloaded
 * and parsed asynchronously.</p>
 *
 * @param {String} url URL of XML document.  Must be uncompressed XML only.
 * @param {Function(Document)} callback Function to call when the document is processed.
 */
geoXML3.fetchXML = function (url, callback) {
  function timeoutHandler() { callback(); };

  var xhrFetcher = new Object();
  if      (!!geoXML3.fetchers.length) xhrFetcher = geoXML3.fetchers.pop();
  else if (!!window.XMLHttpRequest)   xhrFetcher.fetcher = new window.XMLHttpRequest();  // Most browsers
  else if (!!window.ActiveXObject) {                                                     // Some IE
    // the many versions of IE's XML fetchers
    var AXOs = [
      'MSXML2.XMLHTTP.6.0',
      'MSXML2.XMLHTTP.5.0',
      'MSXML2.XMLHTTP.4.0',
      'MSXML2.XMLHTTP.3.0',
      'MSXML2.XMLHTTP',
      'Microsoft.XMLHTTP',
      'MSXML.XMLHTTP'
    ];
    for (var i = 0; i < AXOs.length; i++) {
      try      { xhrFetcher.fetcher = new ActiveXObject(AXOs[i]); break; }
      catch(e) { continue; }
    }
    if (!xhrFetcher.fetcher) {
      geoXML3.log('Unable to create XHR object');
      callback(null);
      return null;
    }
  }

  if (!!xhrFetcher.fetcher.overrideMimeType) xhrFetcher.fetcher.overrideMimeType('text/xml');
  xhrFetcher.fetcher.open('GET', url, true);
  xhrFetcher.fetcher.onreadystatechange = function () {
    if (xhrFetcher.fetcher.readyState === 4) {
      // Retrieval complete
      if (!!xhrFetcher.xhrtimeout) clearTimeout(xhrFetcher.xhrtimeout);
      if (xhrFetcher.fetcher.status >= 400) {
        geoXML3.log('HTTP error ' + xhrFetcher.fetcher.status + ' retrieving ' + url);
        callback();
      }
      // Returned successfully
      else {
        if (xhrFetcher.fetcher.responseXML) {
        // Sometimes IE will get the data, but won't bother loading it as an XML doc
        var xmlDoc = xhrFetcher.fetcher.responseXML;
        if (xmlDoc && !xmlDoc.documentElement && !xmlDoc.ownerElement) xmlDoc.loadXML(xhrFetcher.fetcher.responseText);
          callback(xmlDoc);          
        } else // handle valid xml sent with wrong MIME type 
          callback(geoXML3.xmlParse(xhrFetcher.fetcher.responseText));
      }

      // We're done with this fetcher object
      geoXML3.fetchers.push(xhrFetcher);
    }
  };

  xhrFetcher.xhrtimeout = setTimeout(timeoutHandler, 60000);
  xhrFetcher.fetcher.send(null);
  return null;
};

var IEversion = function() {
  // http://msdn.microsoft.com/workshop/author/dhtml/overview/browserdetection.asp
  // Returns the version of Internet Explorer or a -1
  // (indicating the use of another browser).
  var rv = -1; // Return value assumes failure
  if (navigator.appName == 'Microsoft Internet Explorer') {
    var ua = navigator.userAgent;
    var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null) {
      rv = parseFloat( RegExp.$1 );
    }
  }
  return rv;
};

/**
 * Fetches a KMZ document.
 *
 * <p>Fetches/parses the given ZIP URL, parses each image file, and passes
 * the parsed KML document to the given callback.  Documents are downloaded
 * and parsed asynchronously, though the KML file is always passed after the
 * images have been processed, in case the callback requires the image data.</p>
 *
 * @requires ZipFile.complete.js
 * @param {String} url URL of KMZ document.  Must be a valid KMZ/ZIP archive.
 * @param {Function(Document)} callback Function to call when the document is processed.
 * @param {geoXML3.parser} parser A geoXML3.parser object.  This is used to populate the KMZ image data.
 * @author Brendan Byrd
 * @see http://code.google.com/apis/kml/documentation/kmzarchives.html
 */
geoXML3.fetchZIP = function (url, callback, parser) {
  // Just need a single 'new' declaration with a really long function...
  var zipFile = new ZipFile(url, function (zip) {
    // Retrieval complete

    // Check for ERRORs in zip.status
    for (var i = 0; i < zip.status.length; i++) {
      var msg = zip.status[i];
      if      (msg.indexOf("ERROR") == 0) {
        geoXML3.log('HTTP/ZIP error retrieving ' + url + ': ' + msg);
        callback();
        return;
      }
      else if (msg.indexOf("WARNING") == 0) {  // non-fatal, but still might be useful
        geoXML3.log('HTTP/ZIP warning retrieving ' + url + ': ' + msg);
      }
    }

    // Make sure KMZ structure is according to spec (with a single KML file in the root dir)
    var KMLCount = 0;
    var KML;
    for (var i = 0; i < zip.entries.length; i++) {
      var name = zip.entries[i].name;
      if (!/\.kml$/.test(name)) continue;

      KMLCount++;
      if (KMLCount == 1) KML = i;
      else {
        geoXML3.log('KMZ warning retrieving ' + url + ': found extra KML "' + name + '" in KMZ; discarding...');
      }
    }

    // Returned successfully, but still needs extracting
    var baseUrl = cleanURL(defileURL(url), url) + '/';
    var kmlProcessing = {  // this is an object just so it gets passed properly
      timer: null,
      extractLeft: 0,
      timerCalls: 0
    };
    var extractCb = function(entry, entryContent) {
      var mdUrl = cleanURL(baseUrl, entry.name);
      var ext = entry.name.substring(entry.name.lastIndexOf(".") + 1).toLowerCase();
      kmlProcessing.extractLeft--;

      if ((typeof entryContent.description == "string") && (entryContent.name == "Error")) {
        geoXML3.log('KMZ error extracting ' + mdUrl + ': ' + entryContent.description);
        callback();
        return;
      }

      // MIME types that can be used in KML
      var mime;
      if (ext === 'jpg') ext = 'jpeg';
      if (/^(gif|jpeg|png)$/.test(ext)) mime = 'image/' + ext;
      else if (ext === 'mp3')           mime = 'audio/mpeg';
      else if (ext === 'm4a')           mime = 'audio/mp4';
      else if (ext === 'm4a')           mime = 'audio/MP4-LATM';
      else                              mime = 'application/octet-stream';

      parser.kmzMetaData[mdUrl] = {};
      parser.kmzMetaData[mdUrl].entry = entry;
      // data:image/gif;base64,R0lGODlhEAAOALMA...
      parser.kmzMetaData[mdUrl].dataUrl = 'data:' + mime + ';base64,' + base64Encode(entryContent);
      // IE cannot handle GET requests beyond 2071 characters, even if it's an inline image
        if (/msie/i.test(navigator.userAgent) && !/opera/i.test(navigator.userAgent))
        { 
            if (((IEversion() < 8.0) &&
                 (parser.kmzMetaData[mdUrl].dataUrl.length > 2071)) ||
                ((IEversion < 9.0) && 
                 (parser.kmzMetaData[mdUrl].dataUrl.length > 32767))) {
             parser.kmzMetaData[mdUrl].dataUrl =
             // this is a simple IE icon; to hint at the problem...
             'data:image/gif;base64,R0lGODlhDwAQAOMPADBPvSpQ1Dpoyz1p6FhwvU2A6ECP63CM04CWxYCk+V6x+UK++Jao3rvC3fj7+v///yH5BAEKAA8ALAAAAAAPABAAAASC8Mk5mwCAUMlWwcLRHEelLA' +
             'oGDMgzSsiyGCAhCETDPMh5XQCBwYBrNBIKWmg0MCQHj8MJU5IoroYCY6AAAgrDIbbQDGIK6DR5UPhlNo0JAlSUNAiDgH7eNAxEDWAKCQM2AAFheVxYAA0AIkFOJ1gBcQQaUQKKA5w7LpcEBwkJaKMUEQA7';
            } 
       }
       parser.kmzMetaData[internalSrc(entry.name)]=parser.kmzMetaData[mdUrl];   

    };
    var kmlExtractCb = function(entry, entryContent) {
      if ((typeof entryContent.description == "string") && (entryContent.name == "Error")) {
        geoXML3.log('KMZ error extracting ' + mdUrl + ': ' + entryContent.description);
        callback();
        return;
      }

      // check to see if the KML is the last file extracted
      clearTimeout(kmlProcessing.timer);
      if (kmlProcessing.extractLeft <= 1) {
        kmlProcessing.extractLeft--;
        callback(geoXML3.xmlParse(entryContent));
        return;
      }
      else {
        // KML file isn't last yet; it may need to use those files, so wait a bit (100ms)
        kmlProcessing.timerCalls++;
        if (kmlProcessing.timerCalls < 100) {
          kmlProcessing.timer = setTimeout(function() { kmlExtractCb(entry, entryContent); }, 100);
        }
        else {
          geoXML3.log('KMZ warning extracting ' + url + ': entire ZIP has not been extracted after 10 seconds; running through KML, anyway...');
          kmlProcessing.extractLeft--;
          callback(geoXML3.xmlParse(entryContent));
        }
      }
      return;
    };
    for (var i = 0; i < zip.entries.length; i++) {
      var entry = zip.entries[i];
      var ext = entry.name.substring(entry.name.lastIndexOf(".") + 1).toLowerCase();
      if (!/^(gif|jpe?g|png|kml)$/.test(ext)) continue;  // not going to bother to extract files we don't support
      if (ext === "kml" && i != KML)          continue;  // extra KMLs get discarded
      if (!parser && ext != "kml")            continue;  // cannot store images without a parser object

      // extract asynchronously
      kmlProcessing.extractLeft++;
      if (ext === "kml") entry.extract(kmlExtractCb);
      else               entry.extract(extractCb);
    }
  });

};

/**
 * Extract the text value of a DOM node, with leading and trailing whitespace trimmed.
 *
 * @param {Element} node XML node/element.
 * @param {Any} delVal Default value if the node doesn't exist.
 * @return {String|Null}
 */
geoXML3.nodeValue = function(node, defVal) {
  var retStr="";
  if (!node) {
    return (typeof defVal === 'undefined' || defVal === null) ? null : defVal;
  }
   if(node.nodeType==3||node.nodeType==4||node.nodeType==2){
      retStr+=node.nodeValue;
   }else if(node.nodeType==1||node.nodeType==9||node.nodeType==11){
      for(var i=0;i<node.childNodes.length;++i){
         retStr+=arguments.callee(node.childNodes[i]);
      }
   }
   return retStr;
};

/**
 * Loosely translate various values of a DOM node to a boolean.
 *
 * @param {Element} node XML node/element.
 * @param {Boolean} delVal Default value if the node doesn't exist.
 * @return {Boolean|Null}
 */
geoXML3.getBooleanValue = function(node, defVal) {
  var nodeContents = geoXML3.nodeValue(node);
  if (nodeContents === null) return defVal || false;
  nodeContents = parseInt(nodeContents);
  if (isNaN(nodeContents)) return true;
  if (nodeContents == 0) return false;
  else return true;
}

/**
 * Browser-normalized version of getElementsByTagNameNS.
 *
 * <p>Required because IE8 doesn't define it.</p>
 *
 * @param {Element|Document} node DOM object.
 * @param {String} namespace Full namespace URL to search against.
 * @param {String} tagname XML local tag name.
 * @return {Array of Elements}
 * @author Brendan Byrd
 */
geoXML3.getElementsByTagNameNS = function(node, namespace, tagname) {
  if (node && typeof node.getElementsByTagNameNS != 'undefined') return node.getElementsByTagNameNS(namespace, tagname);
  if (!node) return [];

  var root = node.documentElement || node.ownerDocument && node.ownerDocument.documentElement;
  if (!root || !root.attributes) return [];

  // search for namespace prefix
  for (var i = 0; i < root.attributes.length; i++) {
    var attr = root.attributes[i];
    if      (attr.prefix   === 'xmlns' && attr.nodeValue === namespace) return node.getElementsByTagName(attr.baseName + ':' + tagname);
    else if (attr.nodeName === 'xmlns' && attr.nodeValue === namespace) {
      // default namespace
      if (typeof node.selectNodes != 'undefined') {
        // Newer IEs have the SelectionNamespace property that can be used with selectNodes
        if (!root.ownerDocument.getProperty('SelectionNamespaces'))
          root.ownerDocument.setProperty('SelectionNamespaces', "xmlns:defaultNS='" + namespace + "'");
        return node.selectNodes('.//defaultNS:' + tagname);
      }
      else {
        // Otherwise, you can still try to tack on the 'xmlns' attribute to root
        root.setAttribute('xmlns:defaultNS', namespace);
        return node.getElementsByTagName('defaultNS:' + tagname);
      }
    }
  }
  return geoXML3.getElementsByTagName(node, tagname);  // try the unqualified version
};

/**
 * Browser-normalized version of getElementsByTagName.
 *
 * <p>Required because MSXML 6.0 will treat this function as a NS-qualified function,
 * despite the missing NS parameter.</p>
 *
 * @param {Element|Document} node DOM object.
 * @param {String} tagname XML local tag name.
 * @return {Array of Elements}
 * @author Brendan Byrd
 */
geoXML3.getElementsByTagName = function(node, tagname) {
  if (node && typeof node.getElementsByTagNameNS != 'undefined') return node.getElementsByTagName(tagname);  // if it has both functions, it should be accurate
//  if (node && typeof node.selectNodes != 'undefined')            return node.selectNodes(".//*[local-name()='" + tagname + "']");
  return node.getElementsByTagName(tagname);  // hope for the best...
}

/**
 * Turn a directory + relative URL into an absolute one.
 *
 * @private
 * @param {String} d Base directory.
 * @param {String} s Relative URL.
 * @return {String} Absolute URL.
 * @author Brendan Byrd
 */
var toAbsURL = function (d, s) {
  var p, f, i;
  var h = location.protocol + "://" + location.host;

  if (!s.length)           return '';
  if (/^\w+:/.test(s))     return s;
  if (s.indexOf('/') == 0) return h + s;

  p = d.replace(/\/[^\/]*$/, '');
  f = s.match(/\.\.\//g);
  if (f) {
    s = s.substring(f.length * 3);
    for (i = f.length; i--;) { p = p.substring(0, p.lastIndexOf('/')); }
  }

  return h + p + '/' + s;
}

var internalSrc = function(src) {
  //this gets the full url
  var url = document.location.href;
  //this removes everything after the last slash in the path
  url = url.substring(0,url.lastIndexOf("/") + 1);
  var internalPath= url+src;
  return internalPath;
}

/**
 * Remove current host from URL
 *
 * @private
 * @param {String} s Absolute or relative URL.
 * @return {String} Root-based relative URL.
 * @author Brendan Byrd
 */
var dehostURL = function (s) {
  var h = location.protocol + "://" + location.host;
  h = h.replace(/([\.\\\+\*\?\[\^\]\$\(\)])/g, '\\$1');  // quotemeta
  return s.replace(new RegExp('^' + h, 'i'), '');
}

/**
 * Removes all query strings, #IDs, '../' references, and
 * hosts from a URL.
 *
 * @private
 * @param {String} d Base directory.
 * @param {String} s Absolute or relative URL.
 * @return {String} Root-based relative URL.
 * @author Brendan Byrd
 */
var cleanURL  = function (d, s) { return dehostURL(toAbsURL(d ? d.split('#')[0].split('?')[0] : defileURL(location.pathname), s ? s.split('#')[0].split('?')[0] : '')); }
/**
 * Remove filename from URL
 *
 * @private
 * @param {String} s Relative URL.
 * @return {String} Base directory.
 * @author Brendan Byrd
 */
var defileURL = function (s)    { return s ? s.substr(0, s.lastIndexOf('/') + 1) : '/'; }


// Some extra Array subs for ease of use
// http://stackoverflow.com/questions/143847/best-way-to-find-an-item-in-a-javascript-array
Array.prototype.hasObject = (
  !Array.indexOf ? function (obj) {
    var l = this.length + 1;
    while (l--) {
      if (this[l - 1] === obj) return true;
    }
    return false;
  } : function (obj) {
    return (this.indexOf(obj) !== -1);
  }
);
Array.prototype.hasItemInObj = function (name, item) {
  var l = this.length + 1;
  while (l--) {
    if (this[l - 1][name] === item) return true;
  }
  return false;
};
if (!Array.prototype.indexOf) {
  Array.prototype.indexOf = function (obj, fromIndex) {
    if (fromIndex == null) {
      fromIndex = 0;
    } else if (fromIndex < 0) {
      fromIndex = Math.max(0, this.length + fromIndex);
    }
    for (var i = fromIndex, j = this.length; i < j; i++) {
      if (this[i] === obj) return i;
    }
    return -1;
  };
}
Array.prototype.indexOfObjWithItem = function (name, item, fromIndex) {
  if (fromIndex == null) {
    fromIndex = 0;
  } else if (fromIndex < 0) {
    fromIndex = Math.max(0, this.length + fromIndex);
  }
  for (var i = fromIndex, j = this.length; i < j; i++) {
    if (this[i][name] === item) return i;
  }
  return -1;
};

/**
 * Borrowed from jquery.base64.js, with some "Array as input" corrections
 *
 * @private
 * @param {Array of charCodes} input An array of byte ASCII codes (0-255).
 * @return {String} A base64-encoded string.
 * @author Brendan Byrd
 */
var base64Encode = function(input) {
  var keyString = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
  var output = "";
  var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
  var i = 0;
  while (i < input.length) {
    chr1 = input[i++];
    chr2 = input[i++];
    chr3 = input[i++];
    enc1 = chr1 >> 2;
    enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
    enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
    enc4 = chr3 & 63;

    if      (chr2 == undefined) enc3 = enc4 = 64;
    else if (chr3 == undefined) enc4 = 64;

    output = output + keyString.charAt(enc1) + keyString.charAt(enc2) + keyString.charAt(enc3) + keyString.charAt(enc4);
  }
  return output;
};