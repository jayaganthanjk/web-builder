<?php

$rank = $session->getUserDetails();

if ($rank['rank'] == "admin") {
    ?>

<div style="background:#e0e0e0"><br><h1 align="center" >Remove</h1><a href="god" style="float:right;margin-top: -10px" class="btn btn-inverse">Back</a><hr></div>

        <div>
        <form action="remove" method="GET">
         
            <?php
            $var=@$_GET['page'];
          
            $extra=@$_GET['extra'];
            $imp=array("header","login","menu","profile","write");
            $dp=array("index","boot","profile");
            
               $crawl = new remove();
            $page = $cms->getPages();
            $wapps = $crawl->getTypes(isset($var)?$var:"index");?>
            <input style="float:right;margin-left:10px" class="btn btn-danger" title="Permenantly Remove" type="submit"  name="delete" value="Delete"/>
             <input style="float:right;color:#fff" class="btn btn-success" title="Temporarily Remove" type="submit"  name="remove" id="remove" value="Ban"/>
        
        <?php
             echo '<div style="float:right;margin-right:20px;">Edit Types:<select name="wapps" id="wapps" ><option value="'.$extra.'">Choose</option>';
            foreach ($wapps as $value) {
               
                echo '<option value='.$value['type'].'>'.$value['type'].'</option>';
            }
            echo '<option value="content">Content</option>';
            echo '</select></div>';
            
                 echo '<div style="float:right;margin-right:60px;">Pages:<select name="page" id="page" ><option value='.$var.'>Choose Page</option>';
            foreach ($page as $value) {
                $p=$value['page'];
                if(!in_array($p, $dp))
                echo '<option value='.$value['page'].'>'.$value['page'].'</option>';
            }
         
            echo '</select>';
     
            ?>
       
        </div>
        </form>
          
<form action="remove" method="GET">           
<?php


function getDir($val,$imp) {
    static $dir = "";
    $css_main = @scandir('wapps/' . $val);
    if (!empty($css_main))
        foreach ($css_main as $css) {
            if ($css != "." && $css != "..") {

                $part = explode(".", $css);
                if (end($part) == "php"){
             //       foreach ($array as $imp) {
                        if(!in_array($part[0], $imp))
                        echo '<option>' . $part[0] . '</option>';
               //     }
                    
                    
                }
                else {
                    $dir.=$part[0] . ",";

                    getDir($part[0]);
                }
            }
        }

    return $dir;
}

echo '<div style="float:left;margin-right:40px;" ><b>Choose your script:</b><select id="page" name="file" ><option ></option>';

$main = getDir("",$imp);

echo '</select>';

?>
    <input type="submit" style="margin-left: 10px" class="btn btn-danger" name="delete_page" id="delete_page" value="delete">
    <br>
    
    </div>
    <br>
</form>
            <br>
        <input  style="width: 20%;height:50px;margin-left: 40%;" type="submit" value="Preview" href="<?php echo @$_GET['page']; ?>"  class="livepreview" id="livepreview">
<?php

}
?>

