<?php
/*
 * FUNGSI NUMERIK KE TERHITUNG
 * (c) 2008-2010 by amarullz@yahoo.com
 *
 */

function terbilang_get_valid($str,$from,$to,$min=1,$max=9){
	$val=false;
	$from=($from<0)?0:$from;
	for ($i=$from;$i<$to;$i++){
		if (((int) $str{$i}>=$min)&&((int) $str{$i}<=$max)) $val=true;
	}
	return $val;
}
function terbilang_get_str($i,$str,$len){
	$numA=array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan");
	$numB=array("","se","dua ","tiga ","empat ","lima ","enam ","tujuh ","delapan ","sembilan ");
	$numC=array("","satu ","dua ","tiga ","empat ","lima ","enam ","tujuh ","delapan ","sembilan ");
	$numD=array(0=>"puluh",1=>"belas",2=>"ratus",4=>"ribu", 7=>"juta", 10=>"milyar", 13=>"triliun");
	$buf="";
	$pos=$len-$i;
	$pos1=$len1-$i;
	switch($pos){
		case 1:
				if (!terbilang_get_valid($str,$i-1,$i,1,1))
					$buf=$numA[(int) $str{$i}];
			break;
		case 2:	case 5: case 8: case 11: case 14:
				if ((int) $str{$i}==1){
					if ((int) $str{$i+1}==0)
						$buf=($numB[(int) $str{$i}]).($numD[0]);
					else
						$buf=($numB[(int) $str{$i+1}]).($numD[1]);
				}
				else if ((int) $str{$i}>1){
						$buf=($numB[(int) $str{$i}]).($numD[0]);
				}				
			break;
		case 3: case 6: case 9: case 12: case 15:
				if ((int) $str{$i}>0){
						$buf=($numB[(int) $str{$i}]).($numD[2]);
				}
			break;
		case 4: case 7: case 10: case 13:
				if (terbilang_get_valid($str,$i-2,$i)){
					if (!terbilang_get_valid($str,$i-1,$i,1,1))
						$buf=$numC[(int) $str{$i}].($numD[$pos]);
					else
						$buf=$numD[$pos];
				}
				else if((int) $str{$i}>0){
					if ($pos==4)
						$buf=($numB[(int) $str{$i}]).($numD[$pos]);
					else
						$buf=($numC[(int) $str{$i}]).($numD[$pos]);
				}
			break;
	
	
			
	}
    $buf1 = $buf1 . ' ' . $bufa;
	$buf = $buf . ' ' . $bufa;
	return $buf;
	
	
}

function toTerbilang($nominal){
	$buf="";
	$str=$nominal."";
	$str = explode(".",$str);
	//print_r( $str);
	//exit; 
	$len=strlen($str[0]);
	$len1=strlen($str[1]);
	for ($i=0;$i<$len;$i++){
		$bufa=trim($bufa) ." ".terbilang_get_str($i,$str[0],$len);
	}
	
	for ($i=0;$i<$len1;$i++){
		$bufb=trim($bufb) ." ".terbilang_get_str($i,$str[1],$len1);
	}
	if(!empty($str[1]))
	{	
	$buf = $bufa . 'Koma ' . $bufb;
	}
	else
	{	
	$buf = $bufa;
	}
	
	return trim($buf);
}

?>