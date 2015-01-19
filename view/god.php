<?php

    $rank=$session->getUserDetails();
   
    if($rank['rank']=="admin")
    {
?>
<div style="background:#e0e0e0"><br><h1 align="center" >Dashboard</h1><hr></div>
<div id="men">
    <ul id="menulink">
    <a href="start"><li id="page"><br><br><h3>Page Content</h3></li></a>
    <a href="style"><li><br><br><h3>Style</h3></li></a>
     <a href="script"><li><br><br><h3>Script</h3></li></a>
    <a href="remove"><li><br><br><h3>Remove</h3></li></a>
    <a href="index"><li><br><br><h3>Back to site</h3></li></a>
    <ul>
</div>
<div id="loader" >
    
</div>

<?php

    }
    else
    header('Location:index');

?>
