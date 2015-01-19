/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    var clr=$("#color").val();
    $("#value").val("#000000");
    $("#test").css({"width":"100px","height":"100px","background":clr});
    $("#page").change(function(){
        event.preventDefault();
        var name=$("#page").val();   
        console.log("welcome "+name);
        window.location.href="style?page="+name;
        $(this).val(name);
            
    })
    $("#show").click(function(){
        $("#aid").toggle("slow");
    })
   
   $("#width").change(function(){
       $("#test").css({"width":$(this).val()+"px"});
   }) 
   $("#height").change(function(){
       $("#test").css({"height":$(this).val()+"px"});
   }) 
    $("#color").change(function(){
        col=$(this).val();
        $("#value").val(col);
        $("#test").css({"background":$(this).val()});
        
    })
    $("#value").keydown(function(){
        $("#color").val($(this).val());
        $("#test").css({"background":$(this).val()});
    })
  
    $("#save").click(function(){
        var con=$("#css").val();
        var pag=$("#path").val();
        var fname=$("#name").val()+".css";
        $.post("wapps/write.php",{content:con,path:pag,name:fname},function(data){
            console.log(data);
            alert("Updated");
        })
        $("#css").scrollTop=$("#css").clientHeight;
    })
})