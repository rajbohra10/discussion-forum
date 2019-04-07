<?php
   include('session.php');
   include './partials/header.php';
?>

<div id="divformypost" style="display: block;">
<h3 style="padding-left:30px;">My Posts<div id="myusername" style="display: none;"><?php echo $login_session; ?></div></h3> 
<!-- cards -->
 <!-- my post starts here -->

<div id="divforcard">
</div>
</div>
<!-- my post ends here -->
<!-- post to be edited starts here -->
<div id="divforpostedit" style="display: none;">
<form action="" method="POST" id="saveChangesForm">
            <div class="container">
              <hr>
              <label for="title"><b>Title</b></label>
              <input type="text" placeholder="Enter Title" name="title" class="InputFields" required>
              <label for="type" ><b>Type</b></label>    
              <select name="type" id="type" class="InputFields">
                <option value="blog">Blog</option>
                <option value="video">Video</option>
                <option value="photo">Photo</option>
                <option value="discussion">Discussion</option>
                </select>
              <label for="description"><b>Description</b></label>
              <textarea rows="7" placeholder="Enter Description / Link" name="description" class="InputFields" required></textarea>
              <!-- <label for="userpassword"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="userpassword" class="InputFields" required> -->
              <!-- <select name="category" id="category" class="InputFields">
              
                </select>
                <div id="CR"></div>
              <script>
                $.ajax({
                    url : "api/category",
                    type : "get", 
                    dataType: "json",
                    success : function(list){
                        console.log(list);
                        list.forEach(function(obj, index) {
                            var li = "<option value='" + obj.catid + "'>" +obj.catname +  "</option>";
                            $("#category").append(li);
                        });
                    }
                });     
            </script> -->
              
              <hr>  
              <button type="submit" class="CustomBtn" id="saveChangesBtn">Save Changes</button>
              
            </div>
</form>
<div class="container">
<button class="CustomBtn" id="deleteBtn">Delete Post</button>
</div>
</div>
<!-- post to be edited ends here -->

<script>

</script>
      <script>
                var myusername = $("#profileBtn").text();
                $.ajax({
                    url : "api/posts/"+myusername,
                    type : "get", 
                    dataType: "json",
                    success : function(list){
                        console.log(list);
                        list.forEach(function(obj, index) {
                            // var slicedDescription = substr(obj.description,0,30);
                            var newPost = '<div class="ui centered raised link card" style="width:95%;" id="'+obj.postid+'">'+
                            '<div class="content">'+'<div class="header">'+obj.title+'</div>'+'<div class="meta">'+'<span class="category">'+obj.postdate+'</span>'+'</div>'+'<div class="description">'+'<p>'+obj.description.substring(0, 120)+"..."+'</p>'+'</div></div><div class="extra content">'+'<div class="right floated author">'+'<i class="user icon"></i>'+obj.userid+'</div>'+'</div></div>';
                                
                                // var newPost2 = '<h1>'+newPost+'</h1>';
                                var cardid = "#"+obj.postid.toString();
                                console.log(cardid.toString());
                                console.log("hello world");
                                $("#divforcard").append(newPost);
                        });
                        list.forEach(function(obj, index) {
                            $("#"+obj.postid).click(function() {
                                    // alert("hello world "+ obj.title);
                                    $("#divforpostedit").show();
                                    $("#divforcard").hide();
                                    $('input[name=title]').val(obj.title);
                                    $('input[name=type]').val(obj.type);
                                    $('textarea[name=description]').val(obj.description);
                                    $('#saveChangesBtn').click(function(){
                                        $('#saveChangesForm').attr('action', 'api/post/edit/'+obj.postid);
                                    });

                                    $('#deleteBtn').click(function(){
                                        // $('#deleteForm').attr('method', 'DELETE');
                                        // $('#deleteForm').attr('action', 'api/post/delete/'+obj.postid);
                                        $.ajax({
                                        type: "DELETE",
                                        url: 'api/post/delete/'+obj.postid,
                                        success: function(msg){
                                            // alert("Data Deleted: " + msg);
                                            window.location.href = "home.php";
                                            // location.window.href = "home.php"
                                        }
                                    });
                                        
                                    });
                                    // $('input[name=category]').val(obj.catid);
                                });
                     
                        });
                    }
                });
                $("#profileBtn").click(()=>{
                    var myusername = $("#myusername").text();
                    window.location="api/user/"+myusername;
                });
        </script>   
   </body>
   
</html>