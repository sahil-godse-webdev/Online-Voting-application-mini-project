<html>
    <head>
        <title>Vote for one</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    <body>
        <div class="row m-3">
            <div class="col-6 bg-light">
                <form method="POST" action="voteregister.php">
                    <div class="form-group">
                        <label>Name of candidate</label>
                        <select class="form-control" name="cid">
                            <option>Select one candidate</option>
                            <?php
                                $con= mysqli_connect('localhost','root','','voting');
                                $q='select * from candidate';
                                $res= mysqli_query($con,$q);
                                while($r= mysqli_fetch_array($res)){
                            ?>
                                <option value="<?php echo $r['cid'];?>"><?php echo $r['cname'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name of voter:</label>
                        <input type="text" name="vname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Aadhar Number</label>
                        <input type="text" name="vaadhar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mobile number</label>
                        <input type="text" name="vphone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Vote" class="btn btn-primary">
                    </div>
                </form>
                <h5>
                    <?php
                        if(isset($_REQUEST['activity'])){
                            if($_REQUEST['activity']=='voted'){
                                echo "Your  vote has been registerd successfully!";
                            }
                        }
                    ?>
                </h5>
            </div>
            <div class="col-6 bg-dark text-light">
                <?php
                    $qry= "select cid from voters";
                    $result= mysqli_query($con,$qry)or die($con);
                    $arr=[];
                    
                    while($check=mysqli_fetch_array($result)){
                        //print_r($check);
                        array_push($arr,$check);
                    }
                        //print_r($arr);
                    for($i=0;$i<count($arr);$i++){
                        $id=$arr[$i]['cid'];
                        $query="select count(*) as vcount, c.* from voters as v inner join candidate as c on v.cid = c.cid where v.cid = $id";
                        $abc= mysqli_query($con,$query);
                        while($checkout= mysqli_fetch_array($abc)){
                ?>
                              <div class="card text-center bg-dark">
                                <div class="card-body">
                                  <h5 class="card-title text-light"><?php echo $checkout['cname']?></h5>
                                  <p class="card-text text-light"><img width="15%" height="30%" src="symbols/<?php echo $checkout['cimage'];?>"><br>Belongs to <?php echo $checkout['cparty']?></p>
                                  <p class="card-text"><small class="text-muted">Votes : <?php echo $checkout['vcount']?></small></p>
                                </div>
                              </div>
                <?php
                        }
                    }
                    
                ?>
            </div> 
        </div>
    </body>
</html>