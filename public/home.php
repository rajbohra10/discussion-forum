<?php
include 'session.php';
include './partials/header.php';
//    $request->getParam('postid');
?>
<div id="allpost">
<h3 style="padding-left:30px;">Welcome <span id="myusername"><?php echo $login_session; ?></span>!</h3>
<!-- cards start -->
<div id="divforcard">
</div>
</div>
<!-- cards end -->
<div id="onepost" style="display: none;">
<div class="ui card centered" style="width:95%;">
  <div class="content">
    <div class="header" id="ptitle">Cute Dog</div>
    <div class="meta" id="pdate">2 days ago</div>
    <div class="meta" id="pusername">2 days ago</div>
    <div class="description" id="pdescription">
      <p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>
      <p>Many people also have their own barometers for what makes a cute dog.</p>
    </div>
  </div>
  <div class="extra content">
    <span id="upvotes">Upvotes</span>
    <i class="arrow alternate circle up outline large link icon" id="upvotesIcon"></i>
    <span id="downvotes">downvotes</span>
    <i class="arrow alternate circle down outline large link icon" id="downvotesIcon"></i>
    </div>
    
<div class="extra content" >
<div id="allComments" class="ui comments">
<h3 class="ui dividing header">Comments</h3>
  <div class="comment"></div>
</div>
  <form class="ui reply form">
    <div class="field">
      <textarea id="cdescription"></textarea>
    </div>
    <div id="addCommentBtn" class="ui primary submit labeled icon button">
      <i class="icon edit"></i> Add Comment
    </div>
  </form>
</div>
</div>
  

</div>

<script>

</script>
      <script>
                var selectedPostid = "";
                $.ajax({
                    url : "api/posts",
                    type : "get",
                    dataType: "json",
                    success : function(list){
                        console.log(list);
                        list.forEach(function(obj, index) {
                            // var slicedDescription = substr(obj.description,0,30);
                            var newPost = '<div class="ui centered raised link card" style="width:95%;" id="'+obj.postid+'">'+
                            '<div class="content">'+'<div class="header">'+obj.title+'</div>'+'<div class="meta">'+'<span class="category">'+obj.postdate+' / '+obj.type+' / '+obj.catname+'</span>'+'</div>'+'<div class="description">'+'<p>'+obj.description.substring(0, 120)+"..."+'</p>'+'</div></div><div class="extra content">'+'<div class="left floated author">'+obj.downvotes+'<i class="arrow alternate circle down outline large icon"></i>'+'<div class="left floated author">'+obj.upvotes+'<i class="arrow alternate circle up outline large icon"></i></div>'+'</div>'+'<div class="right floated author">'+obj.username+' '+'<i class="user icon"></i>'+'</div>'+'</div></div>';

                                // var newPost2 = '<h1>'+newPost+'</h1>';
                                var cardid = "#"+obj.postid.toString();
                                console.log(cardid.toString());
                                console.log("hello world");
                                $("#divforcard").append(newPost);
                        });
                        list.forEach(function(obj, index) {
                            $("#"+obj.postid).click(function() {
                                // window.location="api/post/"+obj.postid;
                                selectedPostid = obj.postid;
                                var upvoteToggle = false;
                                var downvoteToggle = false;
                                
                                $("#allpost").hide();
                                $("#onepost").show();
                                $("#ptitle").text(obj.title);
                                $("#pdescription").text(obj.description);
                                $("#pdate").text(obj.postdate+" / "+obj.type+" / "+obj.catname);
                                $("#upvotes").text(obj.upvotes);
                                $("#downvotes").text(obj.downvotes);
                                $("#pusername").text("Published by: "+obj.username);
                                $("#upvotesIcon").click(()=>{
                                    if(downvoteToggle){
                                        var down = $("#downvotes").text();
                                        down = Number(down)-1;
                                        $.ajax({
                                            url : "api/downvote/"+obj.postid+"/"+down,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#downvotes").text(down.toString());
                                                $("#downvotesIcon").removeClass("blue");
                                                downvoteToggle = false;
                                            }});
                                        
                                    }
                                    if(upvoteToggle){
                                        var down = $("#upvotes").text();
                                        down = Number(down)-1;
                                        $.ajax({
                                            url : "api/upvote/"+obj.postid+"/"+down,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#upvotes").text(down.toString());
                                                $("#upvotesIcon").removeClass("blue");
                                        upvoteToggle = false;
                                            }});
                                        
                                    }else{
                                        var up = $("#upvotes").text();
                                        up = Number(up)+1;
                                        $.ajax({
                                            url : "api/upvote/"+obj.postid+"/"+up,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#upvotes").text(up.toString());
                                                $("#upvotesIcon").addClass("blue");
                                        upvoteToggle = true;
                                            }});
                                        
                                    }
                                    
                                });

                                $("#downvotesIcon").click(()=>{
                                    if(upvoteToggle){
                                        var down = $("#upvotes").text();
                                        down = Number(down)-1;
                                        $.ajax({
                                            url : "api/upvote/"+obj.postid+"/"+down,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#upvotes").text(down);
                                                $("#upvotesIcon").removeClass("blue");
                                        upvoteToggle = false;
                                            }});
                                        
                                    }
                                    if(downvoteToggle){
                                        var down = $("#downvotes").text();
                                        down = Number(down)-1;
                                        $.ajax({
                                            url : "api/downvote/"+obj.postid+"/"+down,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#downvotes").text(down);
                                                $("#downvotesIcon").removeClass("blue");
                                                downvoteToggle = false;
                                            }});
                                
                                    }else{
                                        var up = $("#downvotes").text();
                                        up = Number(up)+1;
                                        $.ajax({
                                            url : "api/downvote/"+obj.postid+"/"+up,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#downvotes").text(up);
                                                $("#downvotesIcon").addClass("blue");
                                                downvoteToggle = true;
                                            }});
                                    }
                                    
                                });
                                ajaxCall1();
                                // $("#ptype").text(obj.type);
                                });

                        });
                    }
                });
                // $("#profileBtn").click(()=>{
                //     var myusername = $("#myusername").text();
                //     window.location="api/user/"+myusername;
                // });
                function ajaxCall1(){
                $.ajax({
                    url : "api/comments/"+selectedPostid,
                    type : "get",
                    dataType: "json",
                    success : function(list){
                        list.forEach((obj, index)=>{
                            var cupvoteToggle = false;
                            var cdownvoteToggle = false;
                            var newComment = '<div class="comment"><div class="content"><a class="author">'+obj.username+'</a><div class="metadata"><div class="date">'+'/'+obj.commentdate+'</div></div>'+
                                        '<div class="text">'+obj.cdescription+'</div><div class="actions"><a class="reply">'+'<span id="cupvotes'+obj.commentid+'">'+obj.cupvotes+'</span>'+'<i id="cupvotesIcon'+obj.commentid+'" class="arrow alternate circle up outline large icon"></i>'+'</a><a class="reply">'+'<span id="cdownvotes'+obj.commentid+'">'+obj.cdownvotes+'</span>'+'<i id="cdownvotesIcon'+obj.commentid+'" class="arrow alternate circle down outline large icon"></i></div></div></div>';
                            var selectedCommentId = obj.commentid;
                            $("#allComments").append(newComment);   
                            $("#cupvotesIcon"+selectedCommentId).click(()=>{
                                // alert("hello comment");
                                if(cdownvoteToggle){
                                        var down = $("#cdownvotes"+selectedCommentId).text();
                                        down = Number(down)-1;
                                        $.ajax({
                                            url : "api/downvote/comment/"+obj.commentid+"/"+down,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#cdownvotes"+selectedCommentId).text(down.toString());
                                                $("#cdownvotesIcon"+selectedCommentId).removeClass("blue");
                                                cdownvoteToggle = false;
                                            }});
                                        
                                    }
                                    if(cupvoteToggle){
                                        var down = $("#cupvotes"+selectedCommentId).text();
                                        down = Number(down)-1;
                                        $.ajax({
                                            url : "api/upvote/comment/"+obj.commentid+"/"+down,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#cupvotes"+selectedCommentId).text(down.toString());
                                                $("#cupvotesIcon"+selectedCommentId).removeClass("blue");
                                        cupvoteToggle = false;
                                            }});
                                        
                                    }else{
                                        var up = $("#cupvotes"+selectedCommentId).text();
                                        up = Number(up)+1;
                                        $.ajax({
                                            url : "api/upvote/comment/"+obj.commentid+"/"+up,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#cupvotes"+selectedCommentId).text(up.toString());
                                                $("#cupvotesIcon"+selectedCommentId).addClass("blue");
                                        cupvoteToggle = true;
                                            }});
                                        
                                    }
                                    
                            });  
                            $("#cdownvotesIcon"+selectedCommentId).click(()=>{
                                // alert("hello comment");
                                if(cupvoteToggle){
                                        var down = $("#cupvotes"+selectedCommentId).text();
                                        down = Number(down)-1;
                                        $.ajax({
                                            url : "api/upvote/comment/"+obj.commentid+"/"+down,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#cupvotes"+selectedCommentId).text(down);
                                                $("#cupvotesIcon"+selectedCommentId).removeClass("blue");
                                        cupvoteToggle = false;
                                            }});
                                        
                                    }
                                    if(cdownvoteToggle){
                                        var down = $("#cdownvotes"+selectedCommentId).text();
                                        down = Number(down)-1;
                                        $.ajax({
                                            url : "api/downvote/comment/"+obj.commentid+"/"+down,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#cdownvotes"+selectedCommentId).text(down);
                                                $("#cdownvotesIcon"+selectedCommentId).removeClass("blue");
                                                cdownvoteToggle = false;
                                            }});
                                
                                    }else{
                                        var up = $("#cdownvotes"+selectedCommentId).text();
                                        up = Number(up)+1;
                                        $.ajax({
                                            url : "api/downvote/comment/"+obj.commentid+"/"+up,
                                            type : "get",
                                            dataType: "json",
                                            success : function(list){
                                                $("#cdownvotes"+selectedCommentId).text(up);
                                                $("#cdownvotesIcon"+selectedCommentId).addClass("blue");
                                                cdownvoteToggle = true;
                                            }});
                                    }
                            });  
                        });
                        
                    }
                });
                }
                $("#addCommentBtn").click(()=>{
                    var cdescription = $("#cdescription").val();
                    var arr = {"cdescription": cdescription};
                    console.log(arr);
                    $.ajax({
                    url: 'api/comment/'+selectedPostid,
                    type: 'POST',
                    data: JSON.stringify(arr),
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    success: function(msg) {
                        $("#allComments").remove();
                        ajaxCall1();
                    }
                });
                function ajaxCall2(){
                $.ajax({
                    success: function(){
                        
                    }
                });
                }
                });
        </script>
   </body>

</html>