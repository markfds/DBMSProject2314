<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata= $_SESSION['userdata'];
    $groupsdata=$_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0)
    {
        $status='<b style="color:red">Not Voted</b>';
    }
    else{
        $status='<b style="color:green">Voted</b>';
    }
?>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="main-section">

        <div id="header-section">
        <a href="../"><button class="btnback">Back</button></a>
        <h1>Online Voting System</h1>
        <a href="logout.php"><button class="btnlogout">Logout</button></a>
         </div>

            <hr>
            <div class="userdata">
            <div id="Profile">
                <div class="img-class">
                <img src="../uploads/<?php echo $userdata['photo'] ?>" height="200" width="200">
                </div>
                <div class="user-info">
                <b>Name:</b><?php echo $userdata['name'] ?><br><br>
                <b>Mobile:</b><?php echo $userdata['mobile'] ?><br><br>
                <b>Address:</b><?php echo $userdata['address'] ?><br><br>
                <b>Status:</b><?php echo  $status ?>
                <a href="deleteAccount.php"><button class="btndelete">Delete Account</button></a>
                </div>
               
            </div>

            <div id="Group" class="Group">
                <?php
                    if($_SESSION['groupsdata'])
                    
                    {
                        for($i=0;$i<count( $groupsdata);$i++)
                        { 
                        ?>
                        <div>
                        <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height=100 width=100>
                        <b>Party Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
                        <form action="../api/vote.php" method="post">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                        <?php 
                        if($_SESSION['userdata']['status']==0)
                        {
                            ?>
                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                            <?php
                        }
                        else{
                            ?>
                            <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                            <?php
                         }
                        ?>
                        </form>
                        </div>
                        <hr>
                        <?php 
                        }
                    }
                    else{

                    }
                ?>
                </div>
                
                </div>
           
        </div>
        
    </body>
</html>