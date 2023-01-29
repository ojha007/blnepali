/*  Gopi's Unicode Converters Version 3.0
    Copyright (C) 2008 Gopalakrishnan (Gopi) http://www.higopi.com

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
var lang = "hindi";
var chnbin = "\u094D";
var ugar = "\u0941";
var uugar = "\u0942";
myimg.src = "images/"+lang+".png";

var hi	= new Array();


//Phonetic
hi['B'] = "b";
hi['C'] = "c";
hi['F'] = "ph";
hi['f'] = "ph";
hi['G'] = "g";
hi['J'] = "j";
hi['K'] = "k";
hi['M'] = "m";
hi['P'] = "p";
hi['Q'] = "q";
hi['V'] = "v";
hi['W'] = "v";
hi['w'] = "v";
hi['X'] = "x";
hi['Y'] = "y";
hi['Z'] = "z";
//Cons
hi['k'] = "\क\u094D";
hi['c'] = "\च\u094D";
hi['T'] = "\ट\u094D";
hi['D'] = "\ड\u094D";
hi['N'] = "\ण\u094D";
hi['t'] = "\त\u094D";
hi['d'] = "\द\u094D";
hi['p'] = "\प\u094D";
hi['b'] = "\ब\u094D";


hi['y'] = "\य\u094D";
hi['R'] = "\ऱ\u094D";
hi['L'] = "\ळ\u094D";
hi['v'] = "\व\u094D";
hi['s'] = "\स\u094D";
hi['S'] = "\श\u094D";
hi['H'] = "\ः"; //bisarga
hi['x'] = "\क\u094D\श\u094D";

hi['\u200Dn'] = "\u0901";
hi['\u200Dm'] = "\u0902";
hi['m'] = "\म\u094D";
hi['n'] = "\न\u094D";
hi[':h'] = "\ः";

hi['\u0928\u094D\\.'] = "\ऩ\u094D";
hi['\u0930\u094D\\.'] = "\ऱ\u094D";
hi['q'] = "\क़\u094D";
hi['\u0915\u094D\\.'] = "\क़\u094D";
hi['\u0916\u094D\\.'] = "\ख़\u094D";
hi['\u0917\u094D\\.'] = "\ग़\u094D";
hi['z'] = "\ज़\u094D";
hi['\u0921\u094D\\.'] = "\ड़\u094D";
hi['\u0922\u094D\\.'] = "\ढ़\u094D";
hi['\u092B\u094D\\.'] = "\फ़\u094D";
hi['\u092F\u094D\\.'] = "\य़\u094D";

hi['\u0915\u094Dh'] = "\ख\u094D";
hi['\u0917\u094Dh'] = "\घ\u094D";
hi['\u0928\u094Dg'] = "\ङ\u094D";
hi['\u091A\u094Dh'] = "\छ\u094D";
hi['\u091C\u094Dh'] = "\झ\u094D";
hi['\u0928\u094Dj'] = "\ञ\u094D";
hi['\u091F\u094Dh'] = "\ठ\u094D";
hi['\u0921\u094Dh'] = "\ढ\u094D";
hi['\u0924\u094Dh'] = "\थ\u094D";
hi['\u0926\u094Dh'] = "\ध\u094D";
hi['\u092A\u094Dh'] = "\फ\u094D";
hi['\u092C\u094Dh'] = "\भ\u094D";
hi['\u0938\u094Dh'] = "\श\u094D";
hi['\u0931\u094Dr'] = "\ऋ";
hi['\u0933\u094Dl'] = "\ऌ";
hi['\u094D\u090B'] = "\ृ";
hi['\u0913\u092E\u094D'] = "\u0950";
hi['r'] = "\र\u094D";
hi['l'] = "\ल\u094D";
hi['h'] = "\ह\u094D";
hi['g'] = "\ग\u094D";
hi['j'] = "\ज\u094D";
//VowSml
hi['\u094Da'] = "\u200C";
hi['\u094Di'] = "\ि";
hi['\u094Du'] = "\ु";
hi['\u094De'] = "\े";
hi['\u094Do'] = "\ो";//
hi['\u200Ci'] = "\ै";
hi['\u200Cu'] = "\ौ";
hi['\u200C-'] = "\u200D";
hi['\u200C:'] = ":";
hi['-'] = "\u200D";
//VowBig
hi['\u200Ca'] = "\ा";
hi['\u093Fi'] = "\ी";
hi['\u0941u'] = "\ू";
hi['\u0947e'] = "\े";//u0946e
hi['\u094Bo'] = "\ो"; //u094A
hi['\u094DA'] = "\ा";
hi['\u094DI'] = "\ी";
hi['\u094DU'] = "\ू";
hi['\u094DE'] = "\ॆ";
hi['\u094DO'] = "\ॊ";//
//Vows
hi['\u0905i'] = "\ऐ";
hi['\u0905u'] = "\औ";
hi['\u0905a'] = "\आ";
hi['\u0907i'] = "\ई";
hi['\u0909u'] = "\ऊ";
hi['\u090Ee'] = "\ए";
hi['\u0912o'] = "\ओ";
hi['\u0913m'] = "\u0950";

hi['a'] = "\अ";
hi['A'] = "\आ";
hi['i'] = "\इ";
hi['I'] = "\ई";
hi['u'] = "\उ";
hi['U'] = "\ऊ";
hi['e'] = "\ए";
hi['E'] = "\ए";
hi['o'] = "\ओ";
hi['O'] = "\ऒ";
//Nums
hi['\u200D1'] = "\१";
hi['\u200D2'] = "\२";
hi['\u200D3'] = "\३";
hi['\u200D4'] = "\४";
hi['\u200D5'] = "\५";
hi['\u200D6'] = "\६";
hi['\u200D7'] = "\७";
hi['\u200D8'] = "\८";
hi['\u200D9'] = "\९";
hi['\u200D0'] = "\०";
hi['(.+)\u200C(.+)'] = "$1$2";