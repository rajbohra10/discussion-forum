<?php
    include('session.php');
    include './partials/header.php';
?>

<form action="api/post/add" method="POST">
            <div class="container">
  
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
              <select name="category" id="category" class="InputFields">
              
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
            </script>
              
              <!-- <hr>   -->
              <button type="submit" class="CustomBtn">Post</button>
            </div>
</form>
</body>
</html>