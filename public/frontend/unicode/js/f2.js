/*  Deepaks's Unicode Converters Version 3.0
    Copyright (C) 2014(Deepak Raj Giri) http://www.deepakgiri.com.np

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

    Further to the terms mentioned you should leave this copyright notice
    intact, stating me as the original author.
*/ 
//newawiki modified
var isIE = document.all?true:false;
var myimg = new Image();
var sPos = 0;
var isTh = false;
var isNg = false;
var kbmode = "roman";
var pkbmode = "roman";
var SplKeys = new Array();
var toShowHelp = false;
var webhome = "http://www.deepakgiri.com.np"; //http://www.newawiki.co.cc http://www.higopi.com

SplKeys["ZR"] = 0;
SplKeys["BS"] = 8;
SplKeys["CR"] = 13;

function incfont(fontname, fontfile)
{
if(isIE)
	document.write("<STY"+"LE TYPE='text/css'>\n<!--\n@font-face {\n"
				+ "font-family: "+fontname+";\nsrc:url("+fontfile+".eot);\n"
				+ "}\n-->\n</ST"+"YLE>")
}

function getStyleObject(objectId)
{
    // cross-browser function to get an object's style object given its
    if(document.getElementById && document.getElementById(objectId)) {
	// W3C DOM
	return document.getElementById(objectId).style;
    } else if (document.all && document.all(objectId)) {
	// MSIE 4 DOM
	return document.all(objectId).style;
    } else if (document.layers && document.layers[objectId]) {
	// NN 4 DOM.. note: this won't find nested layers
	return document.layers[objectId];
    } else {
	return false;
    }
} // getStyleObject


function showMap(obj)
{
  if(!obj.checked)
  {	hideMap();	return;	}

  if(document.getElementById('KeyMapDiv') == null)
    {
	    mapdiv  = document.createElement('div');
		mapdiv.setAttribute('id','KeyMapDiv');
		mapdiv.setAttribute('align','left');
		mapdiv.onmousedown = downMap;
		mapdiv.onmouseup = upMap;
		bdy = document.getElementsByTagName('BODY')[0];
		bdy.appendChild(mapdiv);

		mapstyle = getStyleObject('KeyMapDiv');
		mapstyle.width = '140px';
		mapstyle.backgroundColor= '#FFFFFF';
		mapstyle.position = 'absolute';
		mapstyle.cursor = 'move';
	}
	else
	{
		mapdiv  = document.getElementById('KeyMapDiv');
		mapstyle = getStyleObject('KeyMapDiv');
	}
	mapdiv.innerHTML = '<table border="0" cellpadding="0" cellspacing="0" style="border:3px solid #0e88af;background-color:#ffffff;width:100%;"><tr>'
						+'<td style="background-color:#0e88af;color:#ffffff;" nowrap="nowrap"><b>&nbsp;Keypad Map - '
						+lang.substring(0,1).toUpperCase() + lang.substring(1)+'</b></td><td bgcolor="#0e88af" nowrap="nowrap" width="20" align="right">'
						+'<div align="right" onclick="hideMap()" style="padding:2px;width:20px;text-align:right;background-color:#0e88af;color:#ffffff;cursor:default">'
						+'<b> &nbsp; X &nbsp; </b></div></td></tr><tr><td colspan="2" align="center"><img name="KeyMap" src='+myimg.src
						+' style="display:block"></td></tr></table>';
	mapstyle.left = '100px';
	if(isIE)
	{	mapstyle.pixelTop = document.body.scrollTop+100;	}
	else
	{	mapstyle.top = window.pageYOffset+100+"px";	}
	mapstyle.display = 'inline';
}

function moveMap(e)
{
	mapdiv  = document.getElementById('KeyMapDiv');
	mapstyle = getStyleObject('KeyMapDiv');

	if (!e) e = window.event;
	if (dragok)
	{
	  if (isIE) { 	 mapstyle.left = dx + e.clientX - tempX + "px";	 mapstyle.top  = dy + e.clientY - tempY + "px";	}
	  else { 	 mapstyle.left = dx + e.pageX - tempX + "px";	 mapstyle.top  = dy + e.pageY - tempY + "px";	}
	  return false;
	}
}

var dx,dy,tempX,tempY;
var dragok = false;
var n = 500;

function downMap(e)
{
	mapdiv  = document.getElementById('KeyMapDiv');
	mapstyle = getStyleObject('KeyMapDiv');
 	dragok = true;
 	mapstyle.zIndex = n++;
 	dx = parseInt(mapstyle.left+0);
 	dy = parseInt(mapstyle.top+0);
	if (!e) e = window.event;
	if (isIE) { 	tempX = e.clientX;		 	tempY = e.clientY;}
	else { 	tempX = e.pageX;		 	tempY = e.pageY;	}

 	document.onmousemove = moveMap;

 	return false;
}

function upMap()
{
	dragok = false;
	document.onmousemove = null;
}

function hideMap()
{
		mapstyle = getStyleObject('KeyMapDiv');
		mapstyle.display = 'none';
}

function convertThis(e,numchar)
{
    if (!isIE)
	    Key = e.which;
    else
		Key = e.keyCode;

	Char = String.fromCharCode(Key);
	if(typeof numchar == "undefined")
		numchar = 4;
	if( isIE )
	{
		myField = e.srcElement;
		myField.caretPos = document.selection.createRange().duplicate();
		prevChar = myField.caretPos.text;
		diff = 0;
		cpos = getCursorPosition(myField);
		if(prevChar.length != 0)
			document.selection.clear();
		if(myField.value.length != 0 && cpos != "1,1" )
		{
			myField.caretPos.moveStart('character',-1);
			prevChar = myField.caretPos.text;
			diff ++;
		}
		if(prevChar == chnbin)
		{
			myField.caretPos.moveStart('character',-1);
			prevChar = myField.caretPos.text;
			diff ++;
		}

		if(cpos[1] > numchar )
		{
			myField.caretPos.moveStart('character', diff - numchar);
			prevChar = myField.caretPos.text;
		}
		if(prevChar == "" && cpos != "1,1")
			prevChar =  "\u000A";
		if(Key == 13)
			Char = "\u000A";
		myField.caretPos.text = getLang(prevChar,Char, 0)
		e.cancelBubble = true;
		e.returnValue = false;
	}
	else
	{
		myField = e.target;
		if( myField.selectionStart >= 0)
		{
			if(isSplKey(Key) ||  e.ctrlKey )
				return true;
			var startPos = myField.selectionStart;
			var endPos = myField.selectionEnd;
			txtTop = myField.scrollTop;
			if(myField.value.length == 0)
			{
				prevChar = "";
				myField.value = getLang(prevChar,Char, startPos)
			}
			else
			{
				prevChar = myField.value.substring(startPos - 1,startPos);
				prevStr =  myField.value.substring(0,startPos - 1);
				if(prevChar == chnbin)
				{
					prevChar = myField.value.substring(startPos - 2,startPos);
					prevStr =  myField.value.substring(0,startPos - 2);
				}
				cpos = getCursorPosition(myField);
				if(cpos[1] >= numchar)
				{
					prevChar = myField.value.substring(startPos - numchar,startPos);
					prevStr =  myField.value.substring(0,startPos - numchar);
				}
				myField.value = prevStr + getLang(prevChar,Char, myField.selectionStart)
						  + myField.value.substring(endPos, myField.value.length);
			}
			myField.selectionStart = sPos ;
			myField.selectionEnd = sPos;
			if((myField.scrollHeight+4)+"px" != myField.style.height)
				myField.scrollTop = txtTop;
			e.stopPropagation();
			e.preventDefault();
		}
	}
	showCombi(e)
}

function toggleT(obj)
{
	isTh = obj.checked;
	if(isTh)
		ta['t'] = "\u0BA4\u0BCD";
	else
		ta['t'] = "\u0B9F\u0BCD";
}

function toggleG(obj)
{
	isNg = obj.checked;
	if(isNg)
		ta['g'] = "\u0B99\u0BCD";
	else
		ta['g'] = "\u0B95\u0BCD"
}

function toggleKBMode(e,obj)
{
	if(obj != null)
	{
		pkbmode = kbmode;
		kbmode = obj.value;
		if(kbmode == "typewriter" && lang != 'english')
			myimg.src = webhome+"/dhuku/images/"+lang+"tw.png";
		else if(kbmode == "tamil99")
			myimg.src = webhome+"/dhuku/images/tamil99.png";
		else
			myimg.src = webhome+"/dhuku/images/"+lang+".png";
	}
	else
	{
		if (!isIE)
	        key = e.which;
	    else
			key = e.keyCode;
		if (key == 123)
		{
			if(kbmode != "english")
			{
				pkbmode = kbmode;
				kbmode = "english";
			}
			else
			{
				kbmode = pkbmode;
				pkbmode = "english";
			}
		}

	}
}

function isSplKey(keynum)
{
	retVal = false;
	for(i in SplKeys)
	{
		if(keynum == SplKeys[i])
			retVal = true;
	}
	return retVal;
}

function getLang(prv, txt, sP)
{
	sPos = sP;
	if(kbmode == "english")
	{
		retTxt = prv+txt;
		sPos ++;
	}
	else if(kbmode == "typewriter")
	{
		if(prv == ugar && mapLang(txt,sP,"tw") == uugar)
			retTxt = mapLang(prv+txt,sP,"tw");
		else
			retTxt = prv+mapLang(txt,sP,"tw");
	}
	else if(kbmode == "tamil99")
	{
		retTxt = mapLang(prv+txt,sP,"t99");
	}
	else
	{
		if(pkbmode == "english")
		{
			retTxt = prv+mapLang(txt);
			pkbmode = "roman";
		}
		else
			retTxt = mapLang(prv+txt);
	}
	return retTxt;
}

function mapLang(txt,sP,mod)
{
	if(sP != null)
		sPos = sP;
	prvlen = txt.length;
	txtarr = eval(lang.substring(0,2));
	if(mod != null && mod == "tw")
		txtarr = eval(lang.substring(0,2)+"tw");
	if(mod != null && mod == "t99")
		txtarr = eval(lang.substring(0,2)+"99");
	retTxt = "";
	for(itm in txtarr)
	{
		rexp = new RegExp(itm,"g");
		txt = txt.replace(rexp, txtarr[itm]);
	}
	sPos += (txt.length -prvlen +1);
	return txt;
}

function getCursorPosition(textarea)
{
	var txt = textarea.value;
	var len = txt.length;
	var erg = txt.split("\n");
	var pos = -1;
	if(typeof document.selection != "undefined")
	{ // FOR MSIE
	range_sel = document.selection.createRange();
	range_obj = textarea.createTextRange();
	range_obj.moveToBookmark(range_sel.getBookmark());
	range_obj.moveEnd('character',textarea.value.length);
	pos = len - range_obj.text.length;
	}
	else if(typeof textarea.selectionStart != "undefined")
	{ // FOR MOZILLA
	pos = textarea.selectionStart;
	}
	if(pos != -1)
	{
		for(ind = 0;ind<erg.length;ind++)
		{
			len = erg[ind].length + 1;
			if(pos < len)
				break;
			pos -= len;
		}
		ind++; pos++;
		return [ind, pos]; // ind = LINE, pos = COLUMN
	}
}

function showCombi(e)
{
    if(document.getElementById('HelpDiv') == null)
    {
	    helpdiv  = document.createElement('div');
		helpdiv.setAttribute('id','HelpDiv');
		helpdiv.setAttribute('align','left');
		if(isIE)
		{
			bdy = e.srcElement.parentNode;
			bdy.insertBefore(helpdiv, e.srcElement);
		}
		else
		{
			bdy = e.target.parentNode;
			bdy.insertBefore(helpdiv, e.target);
		}

	}
	else
	{
		helpdiv  = document.getElementById('HelpDiv');
	}
	helpstyle = getStyleObject('HelpDiv');
	if(!toShowHelp || kbmode != 'roman')
	{	helpstyle.display = 'none';	return;	}

	prevWord =  getLang(prevChar,Char,0)
	if(isLangOtru(prevWord.substring(prevWord.length - 1)))
		prevWord = prevWord.substring(prevWord.length - 2)
	else
		prevWord = prevWord.substring(prevWord.length - 1)

	helptxt = "";
	prevLet = getLang(prevWord,Char,0); prevLet = prevLet.substring(prevLet.length - 1);
	if( prevWord != "" && !isLangOtru(prevWord) && prevLet != getLang('',Char,0) )
	{
		if(Char == 'a' || Char == 'i' ||Char == 'u' || Char == 'e' || Char == 'o' )
		{
			helptxt =  '<td style="font-size:12px;border:1px solid #0DE8E9;">' +prevWord+ ' + ' + Char+' = <b>' + getLang(prevWord,Char,0) + "</b></td>" ;
			if(Char == 'a')
				helptxt +=  '<td style="font-size:12px;border:1px solid #0DE8E9;">' + prevWord + ' + i = <b>' + getLang(prevWord,'i',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
						  + prevWord + ' + u = <b>' + getLang(prevWord,'u',0) + "</b></td>";
		}
		else if( Char != getLang('',Char,0))
		{
			helptxt = '<td style="font-size:12px;border:1px solid #0DE8E9;">' +prevWord + ' + a = <b>' + getLang(prevWord,'a',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + A = <b>' + getLang(prevWord,'A',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + i = <b>' + getLang(prevWord,'i',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + I = <b>' + getLang(prevWord,'I',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + u = <b>' + getLang(prevWord,'u',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + U = <b>' + getLang(prevWord,'U',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + e = <b>' + getLang(prevWord,'e',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + E = <b>' + getLang(prevWord,'E',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + a + i = <b>' + getLang(getLang(prevWord,'a',0),'i',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + o = <b>' + getLang(prevWord,'o',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + o = <b>' + getLang(prevWord,'O',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
				+ prevWord + ' + a + u = <b>' + getLang(getLang(prevWord,'a',0),'u',0) + "</b></td>"
			if(lang == 'tamil')
			{
				if(getLang('','t',0) == prevWord)
					helptxt += '<td style="font-size:12px;border:1px solid #0DE8E9;">' +prevWord + ' + h = <b>' + getLang(prevWord,'h',0) + "</b></td>";
				if(getLang('','s',0) == prevWord)
					helptxt += '<td style="font-size:12px;border:1px solid #0DE8E9;">' +prevWord + ' + h = <b>' + getLang(prevWord,'h',0)+ "</b></td>";
				if(getLang('','S',0) == prevWord)
					helptxt += '<td style="font-size:12px;border:1px solid #0DE8E9;">' + prevWord + ' + r + I = <b>' + getLang(getLang(prevWord,'r',0),'I',0) + "</b></td>";
				if(getLang('k','n',0).indexOf(prevWord) > 0 )
					helptxt += '<td style="font-size:12px;border:1px solid #0DE8E9;">' +prevWord + ' + t + h = <b>' + getLang(getLang(prevWord,'t',0),'h',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
								+ prevWord + ' + g = <b>' + getLang(prevWord,'g',0) + "</b></td><td style='font-size:12px;border:1px solid #0DE8E9;'>"
								+ prevWord + ' + j = <b>' + getLang(prevWord,'j',0) + "</b></td>";
			}
		}
		helpdiv.innerHTML = '<table cellpadding="2" cellspacing="0" border="0" style="border:1px solid #0DE8E9;background-color:#BDE8E9"><tr>'+ helptxt + '</tr></table>';
		helpstyle.display = 'block';

	}
	else
		helpstyle.display = 'none';
	if(isIE) e.srcElement.onblur = hideHelp;
	else e.target.onblur = hideHelp;
}

function isLangOtru(letter)
{
	isOtru = false;
	otruArr = new Array (	'\u200C',
	"\u0BCD","\u0BBE","\u0BBF","\u0BC0", "\u0BC1","\u0BC2","\u0BC6","\u0BC7","\u0BC8","\u0BCA","\u0BCB","\u0BCC", // Tamil
	"\u0C4D","\u0C3E","\u0C3F","\u0C40","\u0C41","\u0C42","\u0C46","\u0C47","\u0C48","\u0C4A","\u0C4B","\u0C4C","\u0C43","\u0C44","\u0C01","\u0C02","\u0C03",  //Telugu
	"\u094D","\u093E","\u093F","\u0940","\u0941","\u0942","\u0946","\u0947","\u0948","\u094A","\u094B","\u094C","\u0901","\u0902","\u0903",// Hindi
	"\u0D3E","\u0D3F","\u0D40","\u0D41","\u0D42","\u0D43","\u0D47","\u0D46","\u0D48","\u0D4A","\u0D4B","\u0D4C","\u0D02","\u0D03",  //Malayalam
	"\u0CBE","\u0CBF","\u0CC0","\u0CC1","\u0CC2","\u0CC3","\u0CC4","\u0CC6","\u0CC7","\u0CC8","\u0CCA","\u0CCB","\u0CCC","\u0C82","\u0C83",//Kannada
	"\u0ABE","\u0ABF","\u0AC0","\u0AC1","\u0AC2","\u0AC5","\u0AC7","\u0AC8","\u0AC9","\u0ACB","\u0ACC","\u0A81","\u0A82","\u0A83",//Gujarathi
	"\u0B3E","\u0B3F","\u0B40","\u0B41","\u0B42","\u0B46","\u0B47","\u0B48","\u0B4A","\u0B4B","\u0B4C","\u0B01","\u0B02","\u0B03",//Oriya
	"\u09BE","\u09BF","\u09C0","\u09C1","\u09C2","\u09C6","\u09C7","\u09C8","\u09CA","\u09CB","\u09CC","\u0981","\u0982","\u0983",//Bengali
	"\u0A3E","\u0A3F","\u0A40","\u0A41","\u0A42","\u0A46","\u0A47","\u0A48","\u0A4A","\u0A4B","\u0A4C","\u0A50","\u0A03"//Punjabi
	);
	for(i=0;i<otruArr.length;i++)
		if(otruArr[i] == letter)
			isOtru = true;
	return isOtru;
}

function showHelp(obj)
{
	toShowHelp = obj.checked;
	helpstyle = getStyleObject('HelpDiv');
	if(!toShowHelp)
		helpstyle.display = 'none';
}

function hideHelp()
{
	helpstyle  = getStyleObject('HelpDiv');
	helpstyle.display = 'none';
}
