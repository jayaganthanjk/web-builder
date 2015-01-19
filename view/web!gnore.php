<!DOCTYPE html>
<html>
<head>
    <title>
        <?php 
        $cms->getTitle();
        ?>
    </title>
        <?php 
        $content=new meta;
         $meta=$content->getmeta("all");
        foreach ($meta as $value) {
        echo "<meta ".$value['part1']."=\"".$value['content1']."\" ".$value['part2']."=\"".$value['content2']."\">";    
        }
        
        $meta=$content->getmeta($name);
        foreach ($meta as $value) {
        echo "<meta ".$value['part1']."=\"".$value['content1']."\" ".$value['part2']."=\"".$value['content2']."\">";    
        }
        ?>
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
    $main_js= @scandir('js/') or "";
    $main_css= @scandir('css/') or "";
    

    if(!empty($main_js))       
 foreach ($main_js as $js) {
     if($js!="."&&$js!=".."){
          $part=  explode(".", $js);
         if(end($part)=="js")
     echo "<script type=\"text/javascript\" src=\"".URL."js/".$js."\"></script>";
     }
 }   
 
     if(!empty($main_css))       
 foreach ($main_css as $css) {
     if($css!="."&&$css!=".."){
          $part=  explode(".", $css);
         if(end($part)=="css")
     echo "<link rel=\"stylesheet\"type=\"text/css\" href=\"".URL."css/".$css."\">";
     }
 }  
 
 
    if($name=="start")
        echo '<script type="text/javascript" src="js/start/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>';
    
 
 if(!empty($this->js))       
 foreach ($this->js as $js) {
     if($js!="."&&$js!=".."){
          $part=  explode(".", $js);
         if(end($part)=="js"){
             $arr=  explode("_", $part[0]);
     if(!in_array("hide",$arr))        
     echo "<script type=\"text/javascript\" src=\"".URL."js/".$name."/".$js."\"></script>";
         }
 echo "\n";    
     }
 }   
 
 
 if(!empty($this->css)) 
  foreach ($this->css as $css) {
     if($css!="."&&$css!=".."){
         $part=  explode(".", $css);
         if(end($part)=="css")
     echo "<link rel=\"stylesheet\"type=\"text/css\" href=\"".URL."css/".$name."/".$css."\">";
     }
 }   
 $session=new session();
$session->createSession();
 ?>
    
 
</head>