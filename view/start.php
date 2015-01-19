<?php

    $rank=$session->getUserDetails();
   
    if($rank['rank']=="admin")
    {
?>
<div style="background:#e0e0e0"><br><h1 align="center" >Content Manager</h1><a href="god" style="float:right;margin-top: -10px" class="btn btn-inverse">Back</a><hr></div>
<form method="post" action="start">
    <div>
    
            <?php
            $var=@$_GET['page'];
            $extra=@$_GET['extra'];
            
            $crawl = new start();
            $page = $cms->getPages();
            $wapps = $crawl->getTypes(isset($var)?$var:"index");
    
             echo '<div style="float:right;margin-right:20px;">Edit Types:<select name="wapps" id="wapps" ><option value="'.$extra.'">Choose</option>';
            foreach ($wapps as $value) {
               
                echo '<option value='.$value['type'].'>'.$value['type'].'</option>';
            }
            echo '<option value="content">Content</option>';
            echo '</select></div>';
            
            echo '<div style="float:right;margin-right:60px;">Edit existing page:<select id="page" ><option value='.$var.'>Choose Page</option>';
            foreach ($page as $value) {
                if($value['page']!="error")
                echo '<option value='.$value['page'].'>'.$value['page'].'</option>';
            }
         
            echo '</select></div>';
           
    ?>
        <div>
           
           
            <b>Page Name:</b> <input type="text" id="name" name="pname" required value=<?php echo $var; ?> >
              
   
           
         <span><b>Title: </b><input type="text" name="title" required value=<?php $cms->getPageTitle($var); ?> ></span>
         <br><br>   Choose Class:<select id="css" onblur="iframe(this.value)">
        <?php
        $file = fopen(URL . "css/style.css", "r");
        while (!feof($file)) {
            $str = fgets($file);
            preg_match("/^.*{\$/", $str, $fin);
            foreach ($fin as $val) {
                $val = str_replace("{", "", $val);
                $val = str_replace(".", "", $val);
                echo "<option value=" . $val . ">" . $val . "</option>";
            }
        }
        ?>
             </select>
        
            <textarea id="elm1" name="elm1" rows="18" cols="85" style="margin-left: 50px;width: 90%;">
                 <?php
                
                if(isset($var)){
                    
                    if(isset($extra)&&$extra!="content"){
                        $content=$cms->getWapps($var,$extra);
                         foreach ($content as $key) {
                    if ($key['flag'] == 1) {
                        echo $key['content'];
                    } else {
                        echo '<br><h1 align="center"><br>Oops! This page has been temporarily removed! <br></h1>';
                    }
                }
                    }
                else{    
                $content = $cms->getContents($var);
                foreach ($content as $key) {
                    if ($key['flag'] == 1) {
                        echo $key['content'];
                    } else {
                        echo '<br><h1 align="center"><br>Oops! This page has been temporarily removed! <br></h1>';
                    }
                }
                }
                }
                ?>
            </textarea>
         
        </div>
        <br>
        <!-- Some integration calls -->
          <input type="reset" style="float:right;margin-right: 3px" class="btn btn-primary" name="reset" value="Reset" />
        <input type="submit" style="float:right;margin-right:6px;" class="btn btn-danger" name="save" value="Submit" />
      
    </div>
    <span class="label label-inverse" style="padding:5px;float:left"><input type="checkbox" name="login" <?php  if(isset($var))echo $crawl->islogged($var)?"checked=true":"false" ?>> &nbsp;Login needed</span>
    <span class="label label-inverse" style="padding:5px;float:left"><input type="checkbox" name="menu" <?php  if(isset($var))echo $crawl->isMenu($var)?"checked=true":"false" ?>> &nbsp;Show in menu</span>
   
    <br>
    <br><br>
 <div style="float:left;">
     
     <span class="badge label-inverse" style="padding:10px"><input type="checkbox" id="leftneeded" name="lcheck">&nbsp;<b>Left Side bar</b></span>
     
        <h2 id="lhead">Left sidebar</h2>
        <input name="lwidth" id="lwidth" type="range" value="0" max="3" min="1"><br>
        <div id="lwid" style="margin-top: 0px;box-shadow: 0px 0px 3px 1px #a00;background:#333;color: #fff;width:50px;border-radius: 0px 10px 10px 0px">span1</div>
           </div>
        <div style="float:right;margin-left: 406px;margin-bottom: 20px">
        <span class="badge label-inverse" style="padding:10px">     <input type="checkbox" id="rightneeded" name="rcheck">&nbsp;<b>Right Side bar</b></span>
        <h2 id="rhead">Right sidebar</h2>
        <input name="rwidth" id="rwidth" type="range" value="3" max="3" min="1">
        </div>
          <div id="rwid" style="margin-top: -20px;box-shadow: 0px 0px 3px 1px #a00;margin-left: 97%;float:right;background:#333;color: #fff;width:50px;border-radius: 10px 0px 0px 10px">span1</div>


</form>

<?php

    }
else
    header('Location:index');
?>
</body>