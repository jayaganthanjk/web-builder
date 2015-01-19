/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
  
    $("#page").change(function(){
        event.preventDefault();
        var name=$("#page").val();   
        console.log("welcome "+name);
        window.location.href="script?page="+name;
        $(this).val(name);
            
    })
 
    $("#save").click(function(){
        var con=$("#css").val();
        var pag=$("#path").val();
        var fname=$("#name").val()+".php";
        $.post("wapps/write.php",{content:con,path:pag,name:fname},function(data){
            console.log(data);
            alert("Updated");
        })
        $("#css").scrollTop=$("#css").clientHeight;
    })
})