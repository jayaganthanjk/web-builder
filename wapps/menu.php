
<ul class="nav">
    <?php
    $crawl = $cms->getPages();
     $ses=$session->getSession("user");
    foreach ($crawl as $val) {
        
        if ($val['menu']) {
            
            $value = $val['page'];
            $class = ($name == $value) ? "class=active" : "";
           
                if($value!="boot")
            echo '<li id="' . $value . '"' . $class . ' ><a href=' . $value . '>' . strtoupper($value) . '</a></li>';
        }
    }
   
    if($ses){
        $class=($name == "profile") ? "class=active" : "";
       echo '<li id="profile" '.$class.'><a href="profile">PROFILE</a></li>';
    
      echo '<li id="logout"><a href="logout">LOG OUT</a></li>';
    }
      ?>
</ul>
