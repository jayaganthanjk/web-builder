<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$incept=new install();
if($incept->isEmpty()){
    ?>
     <p><h4>Choose a template:</h4></p>
             <ul class="thumbnails ">
  <li class="span4">
    <a class="thumbnail" href="examples/hero.html">
      <img src="img/N404.jpg" alt="">
    </a>
    <h3>Single Column</h3>
    <p>Featuring a hero unit for a primary message and three supporting elements.</p>
  </li>
  <li class="span4">
    <a class="thumbnail" href="examples/fluid.html">
      <img src="img/N404.jpg" alt="">
    </a>
    <h3>Dual Column</h3>
    <p>Uses our new responsive, fluid grid system to create a seamless liquid layout.</p>
  </li>
  <li class="span4">
    <a class="thumbnail" href="examples/starter-template.html">
      <img src="img/N404.jpg" alt="">
    </a>
    <h3>Starter template</h3>
    <p>A barebones HTML document with all the Bootstrap CSS and javascript included.</p>
  </li>
  
  <li class="span4">
    <a class="thumbnail" href="examples/starter-template.html">
      <img src="img/N404.jpg" alt="">
    </a>
    <h3>Starter template</h3>
    <p>A barebones HTML document with all the Bootstrap CSS and javascript included.</p>
  </li>
</ul>
<?php
}
 else {
    echo 'Fuck off';    
    }

?>
