/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

   $(document).ready(function(){
        $("#lwidth,#lhead,#lwid").hide();
        $("#rwidth,#rhead,#rwid").hide();
       
          
        $("#name").keydown(function(){
           var change= $("#name").val().toLowerCase();
           $("#name").val(change);
        })
        $("#page").change(function(){
            event.preventDefault();
            var name=$("#page").val();
            
            console.log("welcome "+window.location.href);
            window.location.href="start?page="+name;
            
        })
         $("#wapps").change(function(){
            event.preventDefault();
            var name=$("#page").val();
            var wapps=$(this).val();
           
            console.log("welcome "+wapps);
            window.location.href="start?page="+name+"&extra="+wapps;
            
        })
          
         
        $("#leftneeded").change(function(){
            
          
          if ($('#leftneeded').is(':checked')){
              console.log("Checked");
                 $("#lwidth,#lhead,#lwid").fadeIn();
      
 
               $("#lwidth").change(function(){
                   var x=$(this).val();
                   lx=x;
                   lx=parseInt(x)*112;
               //    x=(lx-rx);
                   $("#lwid").animate({"width":lx+"px"},"fast");
                   $("#lwid").html("span"+x);
                   console.log(x);
               });
               
          }
          else{
                console.log("Unchecked");
               $("#lwidth,#lhead,#lwid").hide();
          }
        })
       $("#rightneeded").change(function(){
        
         if ($('#rightneeded').is(':checked')){
         
            $("#rwidth,#rhead,#rwid").fadeIn();
               $("#rwidth").change(function(){
                   var x=$(this).val();
                   rx=x;
                   rx=parseInt(4-x)*112;
                   $("#rwid").animate({"width":rx+"px"},"fast");
                   $("#rwid").html("span"+parseInt(4-x));
                   console.log(x);
               });
          }
          else{
              console.log("Unchecked");
               $("#rwidth,#rhead,#rwid").hide();
          }
       }) 
   });
