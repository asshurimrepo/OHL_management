/*var _0x10aa=["\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x6C\x6F\x63\x61\x6C\x68\x6F\x73\x74","\x69\x6E\x64\x65\x78\x4F\x66","\x68\x74\x74\x70\x3A\x2F\x2F\x6C\x6F\x63\x61\x6C\x68\x6F\x73\x74\x2F","","\x72\x65\x70\x6C\x61\x63\x65","\x68\x74\x74\x70\x3A\x2F\x2F","\x3F","\x73\x70\x6C\x69\x74","\x2F","\x61","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x54\x61\x67\x4E\x61\x6D\x65","\x20","\x63\x6C\x61\x73\x73\x4E\x61\x6D\x65","\x70\x61\x72\x65\x6E\x74\x4E\x6F\x64\x65","\x74\x6F\x4C\x6F\x77\x65\x72\x43\x61\x73\x65","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x6C\x65\x6E\x67\x74\x68","\x68\x72\x65\x66","\x70\x68\x70\x66\x6F\x78","\x20\x61\x6A\x61\x78\x5F\x6C\x69\x6E\x6B\x5F\x61\x63\x74\x69\x76\x65","\x20\x61\x63\x74\x69\x76\x65"];function addAjaxLinkActiveClass(_0xdcf1x2){var _0xdcf1x3=window[_0x10aa[0]].toString();if(_0xdcf1x3[_0x10aa[2]](_0x10aa[1])>0){_0xdcf1x3=_0xdcf1x3[_0x10aa[5]](_0x10aa[3],_0x10aa[4]);} else {_0xdcf1x3=_0xdcf1x3[_0x10aa[5]](_0x10aa[6],_0x10aa[4]);} ;if(_0xdcf1x3[_0x10aa[2]](_0x10aa[7])>0){var _0xdcf1x4=_0xdcf1x3[_0x10aa[8]](_0x10aa[7]);var _0xdcf1x5=_0xdcf1x4[1][_0x10aa[8]](_0x10aa[9]);} else {var _0xdcf1x5=_0xdcf1x3[_0x10aa[8]](_0x10aa[9]);} ;var _0xdcf1x6=document[_0x10aa[11]](_0x10aa[10]),_0xdcf1x7;var _0xdcf1x8=0;var _0xdcf1x9= new Array();for(_0xdcf1x7 in _0xdcf1x6){if((_0x10aa[12]+_0xdcf1x6[_0xdcf1x7][_0x10aa[13]]+_0x10aa[12])[_0x10aa[2]](_0x10aa[12]+_0xdcf1x2+_0x10aa[12])>-1){_0xdcf1x9[_0xdcf1x8]=_0xdcf1x6[_0xdcf1x7];_0xdcf1x9[_0xdcf1x8][_0x10aa[14]][_0x10aa[13]]+=(_0xdcf1x9[_0xdcf1x8][_0x10aa[16]][_0x10aa[15]]());_0xdcf1x8++;} ;} ;for(_0xdcf1x8=0;_0xdcf1x8<_0xdcf1x9[_0x10aa[17]];_0xdcf1x8++){var _0xdcf1xa=_0xdcf1x9[_0xdcf1x8][_0x10aa[18]].toString();if(_0xdcf1xa[_0x10aa[2]](_0x10aa[1])>0){_0xdcf1xa=_0xdcf1xa[_0x10aa[5]](_0x10aa[3],_0x10aa[4]);} else {_0xdcf1xa=_0xdcf1xa[_0x10aa[5]](_0x10aa[6],_0x10aa[4]);} ;if(_0xdcf1xa[_0x10aa[2]](_0x10aa[7])>0){var _0xdcf1xb=_0xdcf1xa[_0x10aa[8]](_0x10aa[7]);var _0xdcf1xc=_0xdcf1xb[1][_0x10aa[8]](_0x10aa[9]);} else {var _0xdcf1xc=_0xdcf1xa[_0x10aa[8]](_0x10aa[9]);} ;if((_0xdcf1x5[1]==_0x10aa[19])||_0xdcf1x5[1]==_0x10aa[4]){_0xdcf1x9[0][_0x10aa[13]]+=(_0x10aa[20]);_0xdcf1x9[0][_0x10aa[14]][_0x10aa[13]]+=(_0x10aa[21]);break ;} else {if(_0xdcf1xc[1]===_0xdcf1x5[1]){_0xdcf1x9[_0xdcf1x8][_0x10aa[13]]+=(_0x10aa[20]);_0xdcf1x9[_0xdcf1x8][_0x10aa[14]][_0x10aa[13]]+=(_0x10aa[21]);break ;} ;} ;} ;} ;*/

$(function(){
	var menuitems = $('#header_menu > ul li > a');
	$Behavior.Change_menu = function() {
		$("#header_menu > ul > li > a").click(function() {
			menuitems.map(function(i, m) {
				var menuitem = $(m);
				//alert(menuitem);
				if(menuitem.hasClass("ajax_link_active")) {
					menuitem.removeClass("ajax_link_active");
					menuitem.parent().removeClass("active");
				}
			});
			$(this).addClass("ajax_link_active");
			$(this).parent().addClass("active");
		});
	}
});

function addAjaxLinkActiveClass(matchClass)
	{
	
	//retrieve last string from page url
	var myLoc = window.location.toString();
	if (myLoc.indexOf('localhost')>0)
		{
			myLoc = myLoc.replace("http://localhost/", "");
		}
	else
		{
			myLoc = myLoc.replace("http://", "");
		}
		
	if (myLoc.indexOf('?')>0)
		{
			var myURLParts = myLoc.split("?"); 
			var myURL = myURLParts[1].split("/");
		}
	else
		{
			var myURL = myLoc.split("/");
		}

	//get all elements with <a> tag and store in elems array
	var elems = document.getElementsByTagName('a'),i;
	
	//store all <a> tag elements with "ajax_link" class in MatchedElems array
	var j=0;
	var MatchedElems = new Array();
	var tmpclass;
	for (i in elems)
		{
		if((" "+elems[i].className+" ").indexOf(" "+matchClass+" ") > -1)
			{
			MatchedElems[j] = elems[i];
			tmpclass = MatchedElems[j].innerHTML.replace("/", "_").toLowerCase();
			MatchedElems[j].parentNode.setAttribute("class",tmpclass);
			j++;
			}
		}
	
	//Iterate through all <a> tags in MatchedElems array
	for (j=0;j<MatchedElems.length;j++)
		{
		//retrieve last string from href attribute
		var Ref = MatchedElems[j].href.toString(); 
		if (Ref.indexOf('localhost')>0)
			{
				Ref = Ref.replace("http://localhost/", "");
			}
		else
			{
				Ref = Ref.replace("http://", "");
			}
			
		if (Ref.indexOf('?')>0)
			{
				var RefParts = Ref.split("?"); 
				var aRef = RefParts[1].split("/");
			}
		else
			{
				var aRef = Ref.split("/");
			}

		//add an "active" class name to first <a> tag in MatchedElems array if last string from page url is empty
		if ((myURL[1]=='phpfox')||myURL[1]=='') {
			MatchedElems[0].className+=(" ajax_link_active");
			MatchedElems[0].parentNode.className+=(" active");
			break;
			}
			
		//add an "active" class name to <a> tag in MatchedElems array if last string from page url is matched to last string from href attribute
		else if (aRef[1]===myURL[1]) 
			{
			//alert('myURL:'+myURL+'is matched to aRef:'+aRef);
			MatchedElems[j].className+=(" ajax_link_active");
			MatchedElems[j].parentNode.className+=(" active");
			break;
			}
		}
	}