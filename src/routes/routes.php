<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
//require '../../vendor/autoload.php';
use Slim\Views\PhpRenderer;
$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./templates");

$app->get('/api/category', function(Request $request, Response $response){
    $sql = "SELECT * FROM categorymaster";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $data = json_encode($customers);
        return $response->withJson($customers);

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

$app->get('/api/category/{id}', function(Request $request, Response $response){
    $catid = $request->getAttribute('id');
    $sql = "SELECT catname FROM categorymaster WHERE catid='$catid'";
    // $sql = "SELECT postdetails.*, categorymaster.catname, userdetails.username, commentson.* FROM postdetails, categorymaster, userdetails, commentson WHERE postdetails.catid = categorymaster.catid AND postdetails.userid = userdetails.userid AND postdetails.postid=comments.on";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $data = json_encode($customers);
        return $response->withJson($customers);

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
$app->get('/api/users', function(Request $request, Response $response){
    $sql = "SELECT * FROM userdetails";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        // echo $customers[0];
        echo json_encode($customers);
        // return $response->withRedirect('../signup.php');
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

//GET POSTS
$app->get('/api/posts', function(Request $request, Response $response){
    // $sql = "SELECT * FROM postdetails ORDER BY postid DESC";
    $sql = "SELECT postdetails.*, categorymaster.catname, userdetails.username FROM postdetails, categorymaster, userdetails WHERE postdetails.catid = categorymaster.catid AND postdetails.userid = userdetails.userid ORDER BY postid DESC";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $post = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        // echo $customers[0];
        $data = json_encode($post);
        return $response->withJson($post);
        // return $response->withRedirect('../signup.php');
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single Post
$app->get('/api/post/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM postdetails WHERE postid = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $post = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        return $response->withJson($post);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

$app->post('/api/post/edit/{id}', function(Request $request, Response $response){
    $postid = $request->getAttribute('id');
    $title = $request->getParam('title');
    $type = $request->getParam('type');
    $description = $request->getParam('description');

    $sql = "UPDATE postdetails SET
				title 	= :title,
				type 	= :type,
                description		= :description
			WHERE postid = '$postid'";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description',  $description);
        $stmt->bindParam(':type',      $type);


        $stmt->execute();
        return $response->withRedirect('../../../edit.php');
        // echo '{"notice": {"text": "Customer Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

$app->get('/api/posts/{username}', function(Request $request, Response $response){
    $username = $request->getAttribute('username');

    $sql = "SELECT * FROM postdetails WHERE userid = (SELECT userid FROM userdetails where username='$username')";
    // $sql = "SELECT * FROM `postdetails` WHERE userid=2";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        // $post = $stmt->fetch(PDO::FETCH_OBJ);
        $post = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $response->withJson($post);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


$app->get('/api/user/{username}', function(Request $request, Response $response){
    $username = $request->getAttribute('username');

    $sql = "SELECT * FROM userdetails WHERE username = '$username'";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $data = json_encode($user);
        return $response->withJson($user);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

$app->post('/api/user/add', function(Request $request, Response $response){
    $fullname = $request->getParam('fullname');
    $userpassword = $request->getParam('userpassword');
    $email = $request->getParam('email');
    $dob = $request->getParam('dob');
    $username = $request->getParam('username');
    echo $fullname;
    // {
    //     "fullname":"Harsh Agicha",
    //     "userpassword":"harshagicha",
    //     "email":"harshagicha@gmail.com",
    //     "dob":"1998-12-07",
    //     "username":"harshagicha"
    // }
    $sql = "INSERT INTO userdetails (dob, userpassword, username, fullname, email) VALUES
    (:dob, :userpassword, :username, :fullname,:email)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':username',  $username);
        $stmt->bindParam(':email',      $email);
        $stmt->bindParam(':dob',    $dob);
        $stmt->bindParam(':userpassword',       $userpassword);

        $stmt->execute();
        session_start();
        $_SESSION['myusername'] = $username;
        // echo '{"notice": {"text": "Customer Added"}';
        return $response->withRedirect('../../home.php');

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");
    return $response;
});


$app->post('/api/login', function(Request $request, Response $response){
    $userpassword = $request->getParam('userpassword');
    $username = $request->getParam('username');
    // username='$username' AND 
    $sql = "SELECT * FROM userdetails WHERE username='$username' AND userpassword='$userpassword'";

    try{
        // Get DB Object
        session_start();
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $nRows = (int)$stmt->fetchColumn(); 
        $count = $stmt->rowCount();
        $db = null;
        if($count == 1) {
            $_SESSION['myusername'] = $username;
         }else {
            $error = "Your Login Name or Password is invalid";
         }
        echo json_encode($user);
        return $response->withRedirect('../home.php');
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
    
});

$app->post('/api/post/add', function(Request $request, Response $response){

    session_start();
    $title = $request->getParam('title');
    $description = $request->getParam('description');
    $type = $request->getParam('type');
    $category = $request->getParam('category');
    $username = $_SESSION['myusername'];
    $date = new DateTime();
    $postdate = $date->format('Y-m-d');
    echo $postdate;
    $upvotes = 0;
    $downvotes = 0;
    // echo '{"notice": {"text": '.$category.'}';
    $sql = "SELECT userid FROM userdetails where username='$username'";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $userid = json_encode($user[0]);
        $userid = json_decode($userid, true);
        $userid =  $userid["userid"];

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

    $sql = "INSERT INTO postdetails (type, title, postdate, description, downvotes, upvotes, userid, catid) VALUES
    (:type, :title, :postdate, :description,:downvotes, :upvotes, :userid, :catid)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':title',  $title);
        $stmt->bindParam(':postdate',      $postdate);
        $stmt->bindParam(':description',    $description);
        $stmt->bindParam(':downvotes',       $downvotes);
        $stmt->bindParam(':upvotes',       $upvotes);
        $stmt->bindParam(':userid',       $userid);
        $stmt->bindParam(':catid',      $category);

        $stmt->execute();
        // echo "the new userid" . $userid;    
        // echo '{"notice": {"text": "Customer Added"}';
        return $response->withRedirect('../../home.php');

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

$app->get('/api/upvote/{id}/{value}', function (Request $request, Response $response) {
    $postid = $request->getAttribute('id');
    $upvotes = $request->getAttribute('value');
    $sql = "UPDATE postdetails SET
				upvotes 	= :upvotes
			WHERE postid = '$postid'";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':upvotes', $upvotes);

        $stmt->execute();
        // return $response->withRedirect('../../../edit.php');
        // echo '{"notice": {"text": "Customer Updated"}';
        return $response->withJson('{}');
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

$app->get('/api/upvote/comment/{id}/{value}', function (Request $request, Response $response) {
    $postid = $request->getAttribute('id');
    $cupvotes = $request->getAttribute('value');
    $sql = "UPDATE commentson SET
				cupvotes 	= :cupvotes
			WHERE commentid = '$postid'";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':cupvotes', $cupvotes);

        $stmt->execute();
        // return $response->withRedirect('../../../edit.php');
        // echo '{"notice": {"text": "Customer Updated"}';
        return $response->withJson('{}');
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

$app->get('/api/downvote/{id}/{value}', function (Request $request, Response $response) {
    $postid = $request->getAttribute('id');
    $downvotes = $request->getAttribute('value');
    $sql = "UPDATE postdetails SET
				downvotes 	= :downvotes
			WHERE postid = '$postid'";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':downvotes', $downvotes);

        $stmt->execute();
        // return $response->withRedirect('../../../edit.php');
        // echo '{"notice": {"text": "Customer Updated"}';
        return $response->withJson('{}');
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->get('/api/downvote/comment/{id}/{value}', function (Request $request, Response $response) {
    $postid = $request->getAttribute('id');
    $cdownvotes = $request->getAttribute('value');
    $sql = "UPDATE commentson SET
				cdownvotes 	= :cdownvotes
			WHERE commentid = '$postid'";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':cdownvotes', $cdownvotes);

        $stmt->execute();
        // return $response->withRedirect('../../../edit.php');
        // echo '{"notice": {"text": "Customer Updated"}';
        return $response->withJson('{}');
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->get('/', function(Request $request, Response $response){
    return $response->withRedirect('./home.php');
});

$app->post('/api/comment/{id}', function(Request $request, Response $response){
    
    session_start();
    $postid = $request->getAttribute('id');
    $cdescription = $request->getParam('cdescription');
    $username = $_SESSION['myusername'];
    // $username = $request->getParam('username');
    $date = new DateTime();
    $commentdate = $date->format('Y-m-d');
    echo $commentdate;
    $cupvotes = 0;
    $cdownvotes = 0;
    // echo '{"notice": {"text": '.$category.'}';
    $sql = "SELECT userid FROM userdetails where username='$username'";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $userid = json_encode($user[0]);
        $userid = json_decode($userid, true);
        $userid =  $userid["userid"];

    } catch(PDOException $e){
        $hello =  '{"error": {"text": '.$e->getMessage().'}';
        return $response->withJson($hello);
    }

    $sql = "INSERT INTO commentson (commentdate, cdescription, cupvotes, cdownvotes, postid, userid) VALUES
    (:commentdate, :cdescription, :cupvotes,:cdownvotes, :postid, :userid)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':commentdate', $commentdate);
        $stmt->bindParam(':cdescription',  $cdescription);
        $stmt->bindParam(':cupvotes',      $cupvotes);
        $stmt->bindParam(':cdownvotes',    $cdownvotes);
        $stmt->bindParam(':postid',       $postid);
        $stmt->bindParam(':userid',       $userid);

        $stmt->execute();
        // echo "the new userid" . $userid;    
        // echo '{"notice": {"text": "Customer Added"}';
        // return $response->withRedirect('../../home.php');
        return $response->withJson('{}');

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

$app->get('/api/comments/{id}', function (Request $request, Response $response) {
    $postid = $request->getAttribute('id');

    // $sql = "SELECT * FROM commentson WHERE postid='$postid'";
    $sql = "SELECT commentson.*, userdetails.username FROM commentson, userdetails  WHERE postid='$postid' AND commentson.userid = userdetails.userid";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $data = json_encode($customers);
        return $response->withJson($customers);

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
    
});


$app->delete('/api/post/delete/{id}', function(Request $request, Response $response){
    $postid = $request->getAttribute('id');

    $sql = "DELETE FROM postdetails WHERE postid = $postid";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Post Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
    $sql = "DELETE FROM commentson WHERE postid = $postid";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Post Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});