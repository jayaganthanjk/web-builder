 $(document).ready(function(){
   
        var idu=0;
        var loaded=0;
        
        $("#create").click(function(){
        
            var name=$("#fm_name").val();
            var field=$("#field").val();
          
           
            var html="<style> span{display:none} </style>"+$("#final_form").html();
            $(this).val("Creating...");
            $.post("modal/form_creator.php",{fm_name:name,entirehtml:html,load:loaded},function(data,success){
                if(data!=""){
                    $("#create").val(data);
                console.log(data);
               
                }
            })
            var fname="",atype="",alen="",ainc="",akey="";
            for(i=1;i<=idu;i++){
             fieldval=$("#final_form span[data-id="+i+"]").attr("data-field");
             type=$("#final_form span[data-id="+i+"]").attr("data-dbtype");
             len=$("#final_form span[data-id="+i+"]").attr("data-len");
             inc=$("#final_form span[data-id="+i+"]").attr("data-auto");
             key=$("#final_form span[data-id="+i+"]").attr("data-key");
             if(fieldval!=undefined){
             fname+=fieldval+",";
             atype+=type+",";
             alen+=len+",";
             ainc+=inc+",";
             akey+=key+",";
            }
            }
            console.log(fname+"\n"+atype+"\n"+alen+"\n"+ainc+"\n"+akey+"\n");
            $.post("custom_form/run/",{fm_name:name,field:fname,type:atype,length:alen,inc:ainc,key:akey})
          //  $("#final_form").html(" ");
        })
        $("#type").change(function(){
            var val=$(this).val();
            if(val.match("check")||val.match("radio")){
                $("#gettext").focus();
            }
            if(val.match("submit")||val.match("button")){
                $("#getval").focus();
            }
        })
        $("#auto").click(function(){
           if ($('#auto').is(':checked'))
             {
                 $("#db_key").val("PRIMARY KEY");
                 $("#db_key").attr("disabled",true);
               
             }
             else{
                  $("#db_key").val("undefined");
                 $("#db_key").attr("disabled",false);
                 
             }
        })
        
    
        $("#add").click(function(){
            if(idu!=0){
            var temp=0;    
            fieldval=0;
            i=1;
            while(fieldval!=undefined){
             temp=fieldval;   
             fieldval=$("#final_form #remove[data="+i+"]").attr("data");
             i++;
             console.log(fieldval);
            }
            idu=temp;
            //idu++;
           console.log(idu);
           //loaded=0;
            }
            var label=$("#label").val();
            var type=$("#type").val();
            var value=$("#getval").val();
            var name=$("#getname").val();
            var place=$("#getholder").val();
            var id=$("#getid").val();
            var classname=$("#getclass").val();
            var text=$("#gettext").val();
            var attr=$("#getattr").val();
            var db_type=$("#db_type").val();
            var db_key=$("#db_key").val();
            var db_length=$("#length").val();
            var field=$("#field").val();
            if ($('#auto').is(':checked'))
            {
            var autoval ="AUTO_INCREMENT"
            $("#auto").attr("disabled",true);
            $("#auto").attr("checked",false);
            $("#db_key").attr("disabled",false);
            $("#db_key").val("undefined");
            }
            if(label.length>0)
                label=""+label+"";

            if(value.length>0)
                value="value="+value;
       
       
            if(name.length>0)
                name="name="+name;
       
            if(classname.length>0)
                classname="class="+classname;
       
            if(id.length>0)
                id="id="+id;
       
            if(place.length>0)
                place="placeholder="+place;
            idu++;
            //$("#final_form table").append("<td>");
            if(!type.match("none"))
           $("#final_form table").append("<tr draggable=true ondragstart=drag(event)  id="+idu+"  data-id="+idu+"><td><label data-id="+idu+" >"+label+"</label> </td>"+"<td><input type="+type+" "+value+" "+name+" "+ place+" "+id+" "+classname+" "+attr+" data-val="+ idu +"></td><td><label data-id="+idu+">"+text+"</label></td><td><span id=remove data="+idu+">&nbsp;&nbsp;x</span></td></tr>");
           else
           $("#final_form table").append("<tr draggable=true ondragstart=drag(event) id="+idu+"  data-id="+idu+"><td><span id=remove data="+idu+">"+field+"&nbsp;x</span></td></tr>")    
           $("#final_form").append("<span id=sql style=display: data-field="+field+" data-id="+idu+" data-dbtype="+db_type+" data-auto="+autoval+" data-len="+db_length+" data-key='"+db_key+"'></span>");
           
            if(type.match("text")){
                $("#final_form").append("");
     
            }
            $(".god").fadeIn(200);
            $("span").click(function(){
                var getid=$(this).attr('data');
                $("input[data-val="+getid+"]").remove();
                $("label[data-id="+getid+"]").remove();
                $("span[data-id="+getid+"]").remove();
                $("tr[data-id="+getid+"]").remove();
                $(this).remove();
                console.log($("#final_form").html().length);
                if($("#final_form").html().length<=19){
                    $(".god").fadeOut(200);
                }
  
            })
            return false;
        })
        function start(){
            $("#final_form").html("welcome");
            console.log("span added");
            
        }
        $("#load").click(function(){
            var file=$("#loader").val();
            idu++;
            loaded=1;
            console.log(file);
             $.post("wapps/form_editable/html_"+file+".php",{},function(data,status){
                 
                 $("#final_form").html(data);
                  $("span").click(function(){
                 console.log("Inside");
                var getid=$(this).attr('data');
                $("input[data-val="+getid+"]").remove();
                $("label[data-id="+getid+"]").remove();
                $("span[data-id="+getid+"]").remove();
                $("tr[data-id="+getid+"]").remove();
                $(this).remove();
                console.log($("#final_form").html().length);
                if($("#final_form").html().length<=19){
                    $(".god").fadeOut(200);
                }
  
            })
            
            
                   });
                   
            start();
                   
            
            
        })
  
    })
    
    function allowDrop(ev)
{
   
//this.style.display="none";
ev.preventDefault();
}

function drag(ev)
{
ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
ev.preventDefault();
var data=ev.dataTransfer.getData("Text");
document.getElementById("main").appendChild(document.getElementById(data));
console.log("dragging inside "+data);
}
