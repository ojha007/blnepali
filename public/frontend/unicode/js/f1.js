function convert_to_unicode()
{

var array_one = new Array( 

"ç","˜",".","'m","]m","Fmf","Fm",

")","!","@","#","$","%","^","&","*","(",

"k|m","em","km","Qm","qm","N˜",
"¡","¢","1","2","4",">","?","B","I","Q","ß",
"q","„","‹","•","›","§","°","¶","¿","Å",   
"Ë","Ì","Í","Î","Ý","å",
"6«","7«","8«","9«",

"Ø","|",

"8Þ","9Þ",

"S","s","V","v","U","u","£","3","ª",
"R","r","5","H","h","‰","´","~", "`",

"6","7","8","9","0",
"T","t","Y","y","b","W","w","G","g",  

"K","k","ˆ","A","a","E", "e","D","d",
"o","/","N","n","J", "j", "Z","z","i",":",";","X","x", 

"cf‘","c‘f","cf}","cf]","cf","c","O{","O","pm","p","C","P]","P",

"f‘","\"","'","+","f","[","\\","]","}","F", "L","M",

"्ा","्ो","्ौ","अो","अा","आै","आे","ाो","ाॅ","ाे",
"ंु","ेे","अै","ाे","अे","ंा","अॅ","ाै","ैा","ंृ",
"ँा","ँू","ेा","ंे")     // Remove typing mistakes in the original file

//"_","Ö","Ù","Ú","Û","Ü","Þ","Æ","±","-","<","=")    // Punctuation marks

var array_two = new Array(

"ॐ","ऽ","।","m'","m]","mfF","mF",

"०","१","२","३","४","५","६","७","८","९",

"फ्र","झ","फ","क्त","क्र","ल",
"ज्ञ्","द्घ","ज्ञ","द्द","द्ध","श्र","रु","द्य","क्ष्","त्त","द्म", 
"त्र","ध्र","ङ्घ","ड्ड","द्र","ट्ट","ड्ढ","ठ्ठ","रू","हृ",   
"ङ्ग","त्र","ङ्क","ङ्ख","ट्ठ","द्व",
"ट्र","ठ्र","ड्र","ढ्र",

"्य","्र",

"ड़","ढ़",

"क्","क","ख्","ख","ग्","ग","घ्","घ", "ङ",
"च्","च","छ","ज्","ज","झ्","झ","ञ्", "ञ",

"ट","ठ","ड","ढ","ण्",
"त्","त","थ्","थ","द","ध्","ध","न्","न",  

"प्","प","फ्","ब्","ब","भ्","भ","म्","म",
"य","र","ल्","ल","व्","व","श्","श","ष्","स्","स","ह्","ह",

"ऑ","ऑ","औ","ओ","आ","अ","ई","इ","ऊ","उ","ऋ","ऐ","ए",

"ॉ","ू","ु","ं","ा","ृ","्","े","ै","ँ","ी","ः",

"","े","ै","ओ","आ","औ","ओ","ो","ॉ","ो",
"ुं","े","अ‍ै","ो","अ‍े","ां","अ‍ॅ","ौ","ौ","ृं",
"ाँ","ूँ","ो","ें")     // Remove typing mistakes in the original file 

//  ")","=", ";", "’","!","%",".","”","+","(","?",".")       // Punctuation marks

//**************************************************************************************
// The following two characters are to be replaced through proper checking of locations:
//**************************************************************************************
//  "l", 
//  "ि",
//
// "{"
// "र्" (reph) 
//**************************************************************************************

    var array_one_length = array_one.length ;

    var modified_substring = document.getElementById("legacy_text").value  ;

    Replace_Symbols( ) ;

    processed_text = modified_substring ;
     
    document.getElementById("unicode_text").value = processed_text  ;
// --------------------------------------------------


function Replace_Symbols( )

{

//substitute array_two elements in place of corresponding array_one elements

if ( modified_substring != "" )  // if stringto be converted is non-blank then no need of any processing.
{
for ( input_symbol_idx = 0;   input_symbol_idx < array_one_length;    input_symbol_idx++ )

{ 

//  alert(" modified substring = "+modified_substring)

//***********************************************************
// if (input_symbol_idx==106) 
//  { alert(" input_symbol_idx = "+input_symbol_idx);
//    alert(" input_symbol_idx = "+input_symbol_idx)
//; alert(" character =" + modified_substring.CharCodeAt(input_symbol_idx))
//     alert(" character = "+modified_string.fromCharCode(input_symbol_idx)) 
//   }
// if (input_symbol_idx == 107) 
//   { alert(" input_symbol_idx = "+input_symbol_idx);
//    alert(" character = ",+string.fromCharCode(input_symbol_idx)) 
//   }
//***********************************************************
idx = 0  ;  // index of the symbol being searched for replacement

while (idx != -1 ) //while-00
{

modified_substring = modified_substring.replace( array_one[ input_symbol_idx ] , array_two[input_symbol_idx] )
idx = modified_substring.indexOf( array_one[input_symbol_idx] )

} // end of while-00 loop
// alert(" end of while loop")
} // end of for loop
// alert(" end of for loop")

// alert(" modified substring2 = "+modified_substring)
//*******************************************************
var position_of_i = modified_substring.indexOf( "l" )

while ( position_of_i != -1 )  //while-02
{
var charecter_next_to_i = modified_substring.charAt( position_of_i + 1 )
var charecter_to_be_replaced = "l" + charecter_next_to_i
modified_substring = modified_substring.replace( charecter_to_be_replaced , charecter_next_to_i + "ि" ) 
position_of_i = modified_substring.search( /l/ , position_of_i + 1 ) // search for i ahead of the current position.

} // end of while-02 loop

//**********************************************************************************
// End of Code for Replacing four Special glyphs
//**********************************************************************************

// following loop to eliminate 'chhotee ee kee maatraa' on half-letters as a result of above transformation.

var position_of_wrong_ee = modified_substring.indexOf( "ि्" ) 

while ( position_of_wrong_ee != -1 )  //while-03

{
var consonent_next_to_wrong_ee = modified_substring.charAt( position_of_wrong_ee + 2 )
var charecter_to_be_replaced = "ि्" + consonent_next_to_wrong_ee 
modified_substring = modified_substring.replace( charecter_to_be_replaced , "्" + consonent_next_to_wrong_ee + "ि" ) 
position_of_wrong_ee = modified_substring.search( /ि्/ , position_of_wrong_ee + 2 ) // search for 'wrong ee' ahead of the current position. 

} // end of while-03 loop

// following loop to eliminate 'chhotee ee kee maatraa' on half-letters as a result of above transformation.

var position_of_wrong_ee = modified_substring.indexOf( "िं्" ) 

while ( position_of_wrong_ee != -1 )  //while-03

{
var consonent_next_to_wrong_ee = modified_substring.charAt( position_of_wrong_ee + 3 )
var charecter_to_be_replaced = "िं्" + consonent_next_to_wrong_ee 
modified_substring = modified_substring.replace( charecter_to_be_replaced , "्" + consonent_next_to_wrong_ee + "िं" ) 
position_of_wrong_ee = modified_substring.search( /िं्/ , position_of_wrong_ee + 3 ) // search for 'wrong ee' ahead of the current position. 

} // end of while-03 loop


// Eliminating reph "Ô" and putting 'half - r' at proper position for this.
set_of_matras = "ा ि ी ु ू ृ े ै ो ौ ं : ँ ॅ" 
var position_of_R = modified_substring.indexOf( "{" )

while ( position_of_R > 0 )  // while-04
{
probable_position_of_half_r = position_of_R - 1 ;
var charecter_at_probable_position_of_half_r = modified_substring.charAt( probable_position_of_half_r )


// trying to find non-maatra position left to current O (ie, half -r).

while ( set_of_matras.match( charecter_at_probable_position_of_half_r ) != null )  // while-05

{
probable_position_of_half_r = probable_position_of_half_r - 1 ;
charecter_at_probable_position_of_half_r = modified_substring.charAt( probable_position_of_half_r ) ;

} // end of while-05


charecter_to_be_replaced = modified_substring.substr ( probable_position_of_half_r , ( position_of_R - probable_position_of_half_r ) ) ;
new_replacement_string = "र्" + charecter_to_be_replaced ; 
charecter_to_be_replaced = charecter_to_be_replaced + "{" ;
modified_substring = modified_substring.replace( charecter_to_be_replaced , new_replacement_string ) ;
position_of_R = modified_substring.indexOf( "{" ) ;

} // end of while-04

// global conversion of punctuation marks
//    "=","_","Ö","Ù","‘","Ú","Û","Ü","æ","Æ","±","-","<",  
//    ".",")","=", ";","…", "’","!","%","“","”","+","(","?",

modified_substring = modified_substring.replace( /=/g , "." )   ;  
modified_substring = modified_substring.replace( /_/g , ")" )   ;  
modified_substring = modified_substring.replace( /Ö/g , "=" )   ;  
modified_substring = modified_substring.replace( /Ù/g , ";" )   ;  
modified_substring = modified_substring.replace( /…/g , "‘" )   ;  
modified_substring = modified_substring.replace( /Ú/g , "’" )   ;  
modified_substring = modified_substring.replace( /Û/g , "!" )   ;  
modified_substring = modified_substring.replace( /Ü/g , "%" )   ;  
modified_substring = modified_substring.replace( /æ/g , "“" )   ;  
modified_substring = modified_substring.replace( /Æ/g , "”" )   ;  
modified_substring = modified_substring.replace( /±/g , "+" )   ;  
modified_substring = modified_substring.replace( /-/g , "(" )   ;  
modified_substring = modified_substring.replace( /</g , "?" )   ;  

} // end of IF  statement  meant to  supress processing of  blank  string.

} // end of the function  Replace_Symbols

} // end of convert_to_unicode function

//*******************************************************************************
function convert_to_Preeti()
{
var array_one = new Array(
"‘","?",
"क़","ख़","ग़","ज़","ड़","ढ़","फ़",  // two-byte varnas            // 7

"ॐ","ऽ","।","m'","m]","mfF","mF",

"०","१","२","३","४","५","६","७","८","९",

"फ्र","झ","फ","क्त","क्र","ल",
"ज्ञ्","द्घ","ज्ञ","द्द","द्ध","श्र","रु","द्य","क्ष्","क्ष","त्त","द्म", 
"त्र","ध्र","ङ्घ","ड्ड","द्र","ट्ट","ड्ढ","ठ्ठ","रू","हृ",   
"ङ्ग","त्र","ङ्क","ङ्ख","ट्ठ","द्व",
"ट्र","ठ्र","ड्र","ढ्र",

"्र",

"ड़","ढ़",

"क्","क","ख्","ख","ग्","ग","घ्","घ", "ङ",
"च्","च","छ","ज्","ज","झ्","झ","ञ्", "ञ",

"ट","ठ","ड","ढ","ण्","ण",
"त्","त","थ्","थ","द","ध्","ध","न्","न",  

"प्","प","फ्","ब्","ब","भ्","भ","म्","म",
"य","र","ल्","ल","व्","व","श्","श","ष्","ष","स्","स","ह्","ह",

"्य",

"ऑ","ऑ","औ","ओ","आ","अ","ई","इ","ऊ","उ","ऋ","ऐ","ए",

"ॉ","ू","ु","ं","ा","ृ","्","े","ै","ँ","ी","ः","ो","ौ")

var array_two = new Array( 
"…","<",
"क़","ख़","ग़","ज़","ड़","ढ़","फ़",  //one-byte varnas                  // 7

"ç","˜",".","'m","]m","Fmf","Fm",

")","!","@","#","$","%","^","&","*","(",

"k|m","em","km","Qm","qm","n",
"¡","¢","1","2","4",">","?","B","I","If","Q","ß",
"q","„","‹","•","›","§","°","¶","¿","Å",   
"Ë","Ì","Í","Î","Ý","å",
"6«","7«","8«","9«",

"|",

"8Þ","9Þ",

"S","s","V","v","U","u","£","3","ª",
"R","r","5","H","h","‰","´","~", "`",

"6","7","8","9","0","0f",
"T","t","Y","y","b","W","w","G","g",  

"K","k","ˆ","A","a","E", "e","D","d",
"o","/","N","n","J", "j", "Z","z","i","if",":",";","X","x", 

"Ø",

"cf‘","c‘f","cf}","cf]","cf","c","O{","O","pm","p","C","P]","P",

"f‘","\"","'","+","f","[","\\","]","}","F", "L","M","f]","f}")

  
//************************************************************
//Put "Enter chunk size:" line before "<textarea name= ..." if required to be used.    
//************************************************************
//Enter chunk size: <input type="text" name="chunksize" value="6000" size="7" maxsize="7" style="text-align:right"><br/><br/>
//************************************************************
// The following two characters are to be replaced through proper checking of locations:

// "र्" (reph) 
// "R" )

// "ि"  
// "i" )


    var array_one_length = array_one.length ;

    var modified_substring = document.getElementById("unicode_text").value  ;

    Replace_Symbols( ) ;

    processed_text = modified_substring ;

    document.getElementById("legacy_text").value = processed_text  ;


//**************************************************

function Replace_Symbols( )
   {

    // if string to be converted is non-blank then no need of any processing.
    if (modified_substring != "" )  
       {

// first replace the two-byte nukta_varNa with corresponding one-byte nukta varNas.

// modified_substring = modified_substring.replace ( /क़/ , "क़" )  ; 
// modified_substring = modified_substring.replace ( /ख़‌/g , "ख़" )  ;
// modified_substring = modified_substring.replace ( /ग़/g , "ग़" )  ;
// modified_substring = modified_substring.replace ( /ज़/g , "ज़" )  ;
// modified_substring = modified_substring.replace ( /ड़/g , "ड़" )  ;
// modified_substring = modified_substring.replace ( /ढ़/g , "ढ़" )  ;
// modified_substring = modified_substring.replace ( /ऩ/g , "ऩ" )  ;
// modified_substring = modified_substring.replace ( /फ़/g , "फ़" )  ;
// modified_substring = modified_substring.replace ( /य़/g , "य़" )  ;
// modified_substring = modified_substring.replace ( /ऱ/g , "ऱ" )  ;


        // code for replacing "ि" (chhotee ee kii maatraa) with "i"  and correcting its position too.
        
        var position_of_f = modified_substring.indexOf( "ि" )  ;
         while ( position_of_f != -1 )  //while-02
           {
            var character_left_to_f = modified_substring.charAt( position_of_f - 1 )  ;
            modified_substring = modified_substring.replace( character_left_to_f + "ि" ,  "l" + character_left_to_f )  ;

            position_of_f = position_of_f - 1  ;

            while (( modified_substring.charAt( position_of_f - 1 ) == "्" )  &  ( position_of_f != 0  ) )
               {
                var string_to_be_replaced = modified_substring.charAt( position_of_f - 2 ) + "्"  ;
                  modified_substring = modified_substring.replace( string_to_be_replaced + "l", "l" + string_to_be_replaced ) ;

                position_of_f = position_of_f - 2  ;
               }
            position_of_f = modified_substring.search( /ि/ , position_of_f + 1 ) ; // search for f ahead of the current position.

           } // end of while-02 loop
   //************************************************************     
   //     modified_substring = modified_substring.replace( /fर्/g , "£"  )  ;
   //************************************************************     
        // Eliminating "र्" and putting  Z  at proper position for this.

       set_of_matras = "ािीुूृेैोौं:ँॅ" 

modified_substring += '  '    ;  // add two spaces after the string to avoid UNDEFINED char in the following code.
       var space = " "
       var position_of_half_R = modified_substring.indexOf( "र्" ) ;

//************************************************************************************
   while ( position_of_half_R > 0  )  // while-03
   {
    // "र्"  is two bytes long
    var probable_position_of_Z = position_of_half_R + 2   ;  
    var character_at_probable_position_of_Z = modified_substring.charAt( probable_position_of_Z )

//  alert(" 3. probable_position_of_Z = "+probable_position_of_Z );
//  alert(" 4. character_at_probable_position_of_Z = "+character_at_probable_position_of_Z );

    // trying to find non-maatra position right to probable_position_of_Z .

    while( set_of_matras.match( character_at_probable_position_of_Z ) != null ) // while-04 
    {
     probable_position_of_Z = probable_position_of_Z + 1 ;
     character_at_probable_position_of_Z = modified_substring.charAt( probable_position_of_Z ) ;

//   alert(" 5. probable_position_of_Z = "+probable_position_of_Z );
//   alert(" 6. character_at_probable_position_of_Z = "+character_at_probable_position_of_Z );
    } // end of while-04
//************************************************************
// check if the next character is a halant
//************************************************************
    var right_to_position_of_Z = probable_position_of_Z + 1 ;
//  alert(" 7. right_to_position_of_Z = "+right_to_position_of_Z );

    if (right_to_position_of_Z > 0)  // if-03
    { var character_right_to_position_of_Z = modified_substring.charAt( right_to_position_of_Z )
//    alert(" 8. character_right_to_position_of_Z = "+character_right_to_position_of_Z );

      while ("्".match( character_right_to_position_of_Z ) != null ) // while-05
      {  
//       halant found, move to next character
         probable_position_of_Z = right_to_position_of_Z + 1 ;
         character_at_probable_position_of_Z = modified_substring.charAt( probable_position_of_Z ) ;

//       alert(" 9. probable_position_of_Z = "+probable_position_of_Z );
//       alert("10. character_at_probable_position_of_Z = "+character_at_probable_position_of_Z );
       
         right_to_position_of_Z = probable_position_of_Z + 1 ;
         character_right_to_position_of_Z = modified_substring.charAt( right_to_position_of_Z )

//       alert("11. right_to_position_of_Z = "+right_to_position_of_Z );
//       alert("12. character_right_to_position_of_Z = "+character_right_to_position_of_Z );
      } // end of while-05
   } // end of if-03
//************************************************************

       string_to_be_replaced = modified_substring.substr ( position_of_half_R + 2,(probable_position_of_Z - position_of_half_R)-1) ;
//************************************************************
//     check if character_right_to_position_of_Z is a space
//       if (space.match(character_right_to_position_of_Z) != null) 
//       {
//          string_to_be_replaced = string_to_be_replaced.substr(0,string_to_be_replaced.length - 1)
//        alert("13. string_to_be_replaced = "+string_to_be_replaced );
//        alert("14. string_to_be_replaced.length ="+string_to_be_replaced.length);
//       }
       modified_substring = modified_substring.replace( "र्" + string_to_be_replaced, string_to_be_replaced + "{" ) ;

//     alert("15. string_to_be_replaced = "+string_to_be_replaced );
//     alert("16. modified_substring = "+modified_substring );
       position_of_half_R = modified_substring.indexOf( "र्" ) ;
//      alert("17. position_of_half_R = "+position_of_half_R )

   } // end of while-03
//***********************************************************

modified_substring = modified_substring.substr ( 0 , modified_substring.length - 2 )  ;


        //substitute array_two elements in place of corresponding array_one elements

        for( input_symbol_idx = 0; input_symbol_idx < array_one_length; input_symbol_idx++ )
           {
            idx = 0  ;  // index of the symbol being searched for replacement

            while (idx != -1 ) //whie-00
               {
                modified_substring = modified_substring.replace( array_one[ input_symbol_idx ] , array_two[input_symbol_idx] )
                idx = modified_substring.indexOf( array_one[input_symbol_idx] )
               } // end of while-00 loop
           } // end of for loop

        } // end of IF  statement  meant to  supress processing of  blank  string.
//       modified_substring = modified_substring.replace ( /-ao/g , "ao-" ) 


    } // end of the function  Replace_Symbols( )

  } // end of convert_to_Preeti function

//*************************************************************
