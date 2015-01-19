<?php

    $rank=$session->getUserDetails();
   
    if($rank['rank']=="admin")
    {
?>
<div style="background:#e0e0e0"><br><h1 align="center" >Style</h1><a href="god" style="float:right;margin-top: -10px;" class="btn btn-inverse">Back</a><hr></div>

<?php
$main = "";


function getCss($val) {
    static $dir = "";
    $css_main = @scandir('css/' . $val);
    if (!empty($css_main))
        foreach ($css_main as $css) {
            if ($css != "." && $css != "..") {

                $part = explode(".", $css);
                if (end($part) == "css")
                    echo '<option>' . $part[0] . '</option>';
                else {
                    $dir.=$part[0] . ",";

                    getCss($part[0]);
                }
            }
        }

    return $dir;
}


$page = $cms->getPages();
$var = @$_GET['page'];
$ch = "choose";
$v = isset($var) ? $var : $ch;
echo '<div style="margin-top:30px;"><b>Choose your css:</b><select id="page" ><option >' . $v . '</option>';

$main = getcss("");

echo '</select></div>';
?>
    
 <div class="btn-group"><h3 class="btn btn-success dropdown-toggle" id="show">Aiders<span class="caret"></span></h3></div>
<div id="aid" style="display:none">
    <br><br>
    
Width:<input type="number" style="width:70px;margin-left: 10px" id="width" value="100">px&nbsp;
Height:<input type="number" style="width:70px;margin-left: 10px" id="height" value="100">px&nbsp;
<input type="color" id="color" value="#f00" style="width:20px;margin-left: 10px" >
<input type="text" style="width:80px" id="value">
<br>
<h3 align="left">Test your colours & scales</h3>
<div style="border: 2px #040a0e solid;width:48%;height:200px;overflow: auto">
    <div id="test" style="padding:10px;margin: 10px">
        
    </div>
</div>
<br>
</div> 
<?php $head=isset($var)?$var:"CSS";echo '<h2 align="center">'.strtoupper($head).'.CSS</h2>';?>
<form action="" method="post">
    <textarea id="css" rows="20" cols="20" style="width:96%;margin: 20px;background: #222;color:#dee;box-shadow: 3px 5px 5px 1px #333">
    <?php
    $path="";
    if (isset($var)) {
       
        $file = "css/" . $var . ".css";
        if (file_exists($file)){
            $path=$file;
            echo file_get_contents($file);
        }
        else {
            $dir = explode(",", $main);
            foreach ($dir as $value) {
                if($value)
                $file = "css/" . $value . "/" . $var . ".css";
              //  echo $file;
                $path=$file;
                if (file_exists($file)){
                    echo file_get_contents($file);
                    
                 break;   
                }
            }
        }
    }
    ?>
</textarea>
<input type="hidden" id="path" value=<?php echo $path ?>>


   
<input id="save" type="button" style="margin:10px" class="btn btn-medium btn-danger" value="Save">
</form>
 
<?php

    }
    else
    header('Location:index');

?>