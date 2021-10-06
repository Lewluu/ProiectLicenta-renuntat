$(document).ready(function(){

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
            document.getElementById("comm-section-test").innerHTML=this.responseText;
    };
    xmlhttp.open("POST","CommentSection.php",true);
    xmlhttp.send();

    $("#btn0").click(function(){
        $.ajax({
            type: 'POST',
            url: 'InsertComment.php',
            data: {
                name: "anonymous_user",
                content: $("#input-test").val()
            },
            /*success:function(data){
                alert("Success trying to add comment into database!");
            },*/
            error:function(data){
                alert("Error trying to pass jquery value to PHP!");
            }
        });
        $("#input-test").val(null);
        // var xmlhttp=new XMLHttpRequest();
        // xmlhttp.onreadystatechange=function(){
        // if(this.readyState==4 && this.status==200)
        //     document.getElementById("comm-section-test").innerHTML=this.responseText;
        // };
        xmlhttp.open("POST","CommentSection.php",true);
        xmlhttp.send();
    });
});

