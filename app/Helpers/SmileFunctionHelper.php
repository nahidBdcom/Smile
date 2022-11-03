<?php

/**
 *
 */
namespace App\Helpers;
class SmileFunctionHelper
{

  	public static function rgb2hex2rgb($c){
        //if(!$c) return false;
        if(!$c) return "";
        $c = trim($c);
        $out = false;
        if(preg_match("/^[0-9ABCDEFabcdef\#]+$/i", $c)){
            $c = str_replace('#','', $c);
            $l = strlen($c) == 3 ? 1 : (strlen($c) == 6 ? 2 : false);
        
            if($l){
                unset($out);
                $out[0] = $out['r'] = $out['red'] = hexdec(substr($c, 0,1*$l));
                $out[1] = $out['g'] = $out['green'] = hexdec(substr($c, 1*$l,1*$l));
                $out[2] = $out['b'] = $out['blue'] = hexdec(substr($c, 2*$l,1*$l));
            }else{
                $out = false;
            } 
                    
        }elseif (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $c)){
            $spr = str_replace(array(',',' ','.'), ':', $c);
            $e = explode(":", $spr);
            if(count($e) != 3) {return false;}
            $out = '#';
            for($i = 0; $i<3; $i++)
                $e[$i] = dechex(($e[$i] <= 0)?0:(($e[$i] >= 255)?255:$e[$i]));
                
            for($i = 0; $i<3; $i++)
                $out .= ((strlen($e[$i]) < 2)?'0':'').$e[$i];
                    
            $out = strtoupper($out);
        }else{
            $out = "";
        }
                
        return $out;        
  	}

    public static function rgbFormater($hexColor){
	    //if(!$hexColor) return false;
        if(!$hexColor) return "false";
        $rgb = self::rgb2hex2rgb($hexColor);
        if(!$rgb) return false;
        return "".$rgb['red'].",".$rgb['green'].",".$rgb['blue']."";

    }
    

}
