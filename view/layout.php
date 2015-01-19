<body>

    <?php
    $getNeeds = $skeleton->getSkeleton($name);
    $header = $skeleton->getWappcontent($name, "header");
    $footer = @$skeleton->getWappcontent($name, "footer");
    $lbar = @$skeleton->getWappcontent($name, "leftbar");
    $rbar = @$skeleton->getWappcontent($name, "rightbar");
    $lw = $lbar['width'];
    @$rw = $rbar['width'];
    $width = 11 - ($lw + $rw);

   
/*
    if (empty($getNeeds)) {
        $getNeeds = $skeleton->getSkeleton("all");
        $needed = $getNeeds[0];
    }
    else
        $needed = $getNeeds[0];
    */
    $content = $cms->getContents($name);


    if (!empty($header)) {
        include 'wapps/header.php';
    }
    echo '<div class="container-fluid"><div class="row-fluid">';
    if (!empty($lbar) && $lw != 0) {

        echo '<div class="span' . $lw . '">' . $lbar['content'] . '</div>';
    }

    echo '<div class="span' . $width . '">';

    if (!empty($content)) {
        foreach ($content as $key) {
            if ($key['flag'] == 1) {
                // echo '<h1 align="center">Welcome</h1>';
                if ($key['login']) {

                    if ($session->getSession("user")) {
                        $disp = $key['content'];
                        $arr = explode("^", $disp);
                        foreach ($arr as $value) {

                            if (file_exists("wapps/" . $value . ".php")) {
                                $rep = "^" . $value . "^";
                                include 'wapps/' . $value . '.php';
                            } else {
                                echo $value;
                            }
                        }
                    }
                
                else {
                        include 'wapps/login.php';
                    }
                }    
                 else {
                    $disp = $key['content'];
                    $arr = explode("^", $disp);
                    foreach ($arr as $value) {

                        if (file_exists("wapps/" . $value . ".php")) {
                            $rep = "^" . $value . "^";
                            include 'wapps/' . $value . '.php';
                        } else {
                            echo $value;
                        }
                    }
                }
            } else {
                echo '<br><h1 align="center"><br>Oops! This page has been temporarily removed! <br></h1>';
            }
        }
    } else {
        echo '<img src="' . URL . 'img/N404.jpg" >';
    }
    echo '</div>';
   
    if (!empty($rbar) && $rw != 0) {
        echo '<div class="span' . $rw . '">' . $rbar['content'] . '</div>';
    }
    echo '</div>';
    ?>

</body>
<!--/span-->



