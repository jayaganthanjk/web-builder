<?php

    $rank=$session->getUserDetails();
   
    if($rank['rank']=="admin")
    {
?>
<div style="background:#e0e0e0"><br><h1 align="center" >Script</h1><a href="god" style="float:right;margin-top: -10px;" class="btn btn-inverse">Back</a><hr></div>

<?php
$main = "";

function getCss($val) {
    static $dir = "";
    $css_main = @scandir('wapps/' . $val);
    if (!empty($css_main))
        foreach ($css_main as $css) {
            if ($css != "." && $css != "..") {

                $part = explode(".", $css);
                if (end($part) == "php")
                    echo '<option>' . $part[0] . '</option>';
                
            }
        }

    return $dir;
}


$page = $cms->getPages();
$var = @$_GET['page'];
$ch = "";
$v = isset($var) ? $var:"";
echo '<div style="margin-top:30px;"><b>Choose your script:</b><select id="page" ><option ></option>';

$main = getcss("");

echo '<option ></option></select></div>';
?>
    

</div> 
<?php $head=isset($var)?$var:"PHP";echo '<h2 align="center">'.strtoupper($head).'</h2>';?>
<form action="" method="post">
    New Script:<input type="text" name="name" id="name">
    <textarea id="css" rows="20" cols="20" style="width:96%;margin: 20px;background: #222;color:#dee;box-shadow: 3px 5px 5px 1px #333">
    <?php
    $path="";
    if (isset($var)) {
       
        $file = "wapps/" . $var . ".php";
        if (file_exists($file)){
            $path=$file;
            echo file_get_contents($file);
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