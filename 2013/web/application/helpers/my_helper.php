<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('searchSubArray'))
{
	function searchSubArray(Array $array, $key, $value) {
        foreach ($array as $subarray){
            if (isset($subarray[$key]) && $subarray[$key] == $value)
              return $subarray;
        }
    }
}

if ( ! function_exists('____')){
  function ____($var, $dump = TRUE, $exit = TRUE) {
    echo '<pre style="font-size: 1.3em; color: #FF0000; line-height: 18px;">';
      if(!$dump) {
        echo_r($var);
      } else {
        var_dump($var);
      }
    echo '</pre>';

    if($exit) {
      exit();
    }
  }
}


if ( ! function_exists('count_searchSubArray'))
{
	function count_searchSubArray(Array $array, $key, $values) {
    	$num = 0;
        foreach ($array as $subarray){
            foreach ($values as $value){
            if (isset($subarray[$key]) && $subarray[$key] == $value)
                 $num++;
            }
        }
    	return $num;
    }
}

if ( ! function_exists('obfuscate'))
{

    function obfuscate($string) {
       $key='+-o.0123456789#abcdefghijklmnopqrstuvwxyz';
       $result = '';
       for($i=0; $i<strlen($string); $i++) {
          $char = substr($string, $i, 1);
          $keychar = substr($key, ($i % strlen($key))-1, 1);
          $char = chr(ord($char)+ord($keychar));
          $result.=$char;
       }
       return base64_encode($result);
    }

}

if ( ! function_exists('no_obfuscate'))
{
    function no_obfuscate($string) {
       $key='+-o.0123456789#abcdefghijklmnopqrstuvwxyz';
       $result = '';
       $string = base64_decode($string);
       for($i=0; $i<strlen($string); $i++) {
          $char = substr($string, $i, 1);
          $keychar = substr($key, ($i % strlen($key))-1, 1);
          $char = chr(ord($char)-ord($keychar));
          $result.=$char;
       }
       return $result;
    }
}


if ( ! function_exists('validtoken_get'))
{

    function validtoken_get($token= NULL){


            $response="";
            $CI = get_instance();
            $CI->load->model('visor/Personal_Patrimonio_model');

            if(!$token)
            {
               return false;
            }
            //$data=$this->Personal_Patrimonio_model->count($this->get('imei'));
            $resulttoken=$CI->Personal_Patrimonio_model->get_token($token);
            if ($resulttoken->num_rows() > 0){


                $msg=  array('message' => "token valido",
                               'value'=> true);

                return true;

            }else{


                $msg=  array('message' => "token invalido",
                               'value'=> false);


                return false;
            }
    }
}


if ( ! function_exists('header_json'))
{
    function header_json(){
        header('Content-type: text/json');
        header('Content-type: application/json');
    }
}

if ( ! function_exists('my_json_encode'))
{


function my_json_encode($in) {

  $out = "";
  if (is_object($in)) {
    $class_vars = get_object_vars(($in));
    $arr = array();
    foreach ($class_vars as $key => $val) {
      $arr[$key] = "\"{$key}\":\"{$val}\"";
    }
    $val = implode(',', $arr);
    $out .= utf8_encode("{{$val}}");
  }elseif (is_array($in)) {
    $obj = false;
    $arr = array();
    foreach($in AS $key => $val) {
      if(!is_numeric($key)) {
        $obj = true;
      }
      $arr[$key] = my_json_encode($val);
    }
    if($obj) {
      foreach($arr AS $key => $val) {
        $arr[$key] = "\"{$key}\":{$val}";
      }
      $val = implode(',', $arr);
      $out .= "{{$val}}";
    }else {
      $val = implode(',', $arr);
      $out .= "[{$val}]";
    }
  }elseif (is_bool($in)) {
    $out .= $in ? 'true' : 'false';
  }elseif (is_null($in)) {
    $out .= 'null';
  }elseif (is_string($in)) {
    $out .= utf8_encode("\"{$in}\"");
  }else {
    $out .= $in;
  }
  return "{$out}";
}

}

if ( ! function_exists('prettyPrint'))
{
    function prettyPrint( $json ){

        $result = '';
        $level = 0;
        $prev_char = '';
        $in_quotes = false;
        $ends_line_level = NULL;
        $json_length = strlen( $json );

        for( $i = 0; $i < $json_length; $i++ ) {
            $char = $json[$i];
            $new_line_level = NULL;
            $post = "";
            if( $ends_line_level !== NULL ) {
                $new_line_level = $ends_line_level;
                $ends_line_level = NULL;
            }
            if( $char === '"' && $prev_char != '\\' ) {
                $in_quotes = !$in_quotes;
            } else if( ! $in_quotes ) {
                switch( $char ) {
                    case '}': case ']':
                        $level--;
                        $ends_line_level = NULL;
                        $new_line_level = $level;
                        break;

                    case '{': case '[':
                        $level++;
                    case ',':
                        $ends_line_level = $level;
                        break;

                    case ':':
                        $post = " ";
                        break;

                    case " ": case "\t": case "\n": case "\r":
                        $char = "";
                        $ends_line_level = $new_line_level;
                        $new_line_level = NULL;
                        break;
                }
            }
            if( $new_line_level !== NULL ) {
                $result .= "\n".str_repeat( "\t", $new_line_level );
            }
            $result .= $char.$post;
            $prev_char = $char;
        }

        echo $result;

    }
}

if ( ! function_exists('b64'))
{
    function b64($string, $decode = false)
    {
      return $decode ? base64_decode(strtr($string,'-_,','+/=')) : strtr(base64_encode($string), '+/=', '-_,');
    }
}


if ( ! function_exists('givemethefuckingkml'))
{
    function givemethefuckingkml($regs){
        // Creates the Document.
        $dom = new DOMDocument('1.0', 'UTF-8');

        // Creates the root KML element and appends it to the root document.
        $node = $dom->createElementNS('http://earth.google.com/kml/2.2', 'kml');
        $parNode = $dom->appendChild($node);

        // Creates a KML Document element and append it to the KML element.
        $dnode = $dom->createElement('Document');
        $docNode = $parNode->appendChild($dnode);
            //Create Style
            $restStyleNode = $dom->createElement('Style');
            $restStyleNode->setAttribute('id', 'mystyle');

            $LineStyleNode = $dom->createElement('LineStyle');
            $LColorNode = $dom->createElement('color', '7dff0000');
            $WidthNode = $dom->createElement('width', '2');
            $LineStyleNode->appendChild($LColorNode);
            $LineStyleNode->appendChild($WidthNode);

            $PolyStyleNode = $dom->createElement('PolyStyle');
            $ColorNode = $dom->createElement('color', '7dff0000');
            $PolyStyleNode->appendChild($ColorNode);

            $restStyleNode->appendChild($PolyStyleNode);
            $restStyleNode->appendChild($LineStyleNode);
            $docNode->appendChild($restStyleNode);



        // Iterates through the MySQL results, creating one Placemark for each row.
        foreach ($regs as $reg)
        {

          // Creates a Placemark and append it to the Document.

          $node = $dom->createElement('Placemark');
          $placeNode = $docNode->appendChild($node);

          // Creates an id attribute and assign it the value of id column.
          //$placeNode->setAttribute('id', 'placemark' . $row['id']);

          // Create name, and description elements and assigns them the values of the name and address columns from the results.
            $descNode = $dom->createElement('description', $reg->DES_DISTRITO);
            $placeNode->appendChild($descNode);

           $styleUrl = $dom->createElement('styleUrl', '#mystyle');
           $placeNode->appendChild($styleUrl);

            // Creates a Point element.
            $multiNode = $dom->createElement('MultiGeometry');
            $polygonNode = $dom->createElement('Polygon');
            $outerNode = $dom->createElement('outerBoundaryIs');
            $linearNode = $dom->createElement('LinearRing');
            $coordNode = $dom->createElement('coordinates',trim($reg->GCOORD));

            $linearNode->appendChild($coordNode);
            $outerNode->appendChild($linearNode);
            $polygonNode->appendChild($outerNode);
            $multiNode->appendChild($polygonNode);
            $placeNode->appendChild($multiNode);

            // Creates a Point element.
            // $pointNode = $dom->createElement('Point');
            // $placeNode->appendChild($pointNode);

            // // Creates a coordinates element and gives it the value of the lng and lat columns from the results.
            // $coorNode = $dom->createElement('coordinates', $reg->CENTRO);
            // $pointNode->appendChild($coorNode);

        }

        $kmlOutput = $dom->saveXML();
        //header('Content-type: application/vnd.google-earth.kml+xml');
        return trim($kmlOutput);
    }

if ( ! function_exists('makedaysql'))
{
    function makedaysql($string)
    {
       $ah = explode('/', $string);
       $r = $ah[2] . '-' . $ah[1] . '-' . $ah[0];
       return $r;
    }
}

}