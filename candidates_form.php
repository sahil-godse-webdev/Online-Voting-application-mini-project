<html>
    <head>
        <title>Add candidates here...</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>

    <body class="text-dark p-3">
        <div class="row container-fluid">
            <div class="bg-white col-xs-3 p-3 border border-warning rounded">
                <h3>Registration form</h3>
                <p>New candidates can register here.</p>
                <form method="post" action="registered_candidates.php">
                    <div class="form-group">
                        <label>Name of candidate</label>
                        <input type="text" name="cname" class="form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Age of candidate</label>
                        <input type="number" name="cage" class="form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Party to which candidate belongs to</label><br>
                        <select class="form-control-sm" name="cparty">
                            <option selected>List of political parties in the United Kingdom</option>
                            <option>Conservative and Unionist Party</option>
                            <option>Labour Party. Co-operative Party</option>
                            <option>Liberal Democrats</option>
                            <option>Scottish National Party</option>
                            <option>Democratic Unionist Party</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Attach your image</label>
                        <input class="form-control-file-sm" name="cimage" type="file" name="pic">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1"><small><a target="_blank" href="Website%20Standard%20Terms%20and%20Conditions%20-%202XTViU9wvstxcH593MXXce.pdf">Configure Terms and condition</a></small></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register as Candidate">
                    </div>
                </form>
            </div>
            <div class="col-xs-6"><img src="symbols/bg.jpeg" width="550px" height="450px"></div>
            <div class="col-xs-9 bg-info p-3">
                Presenting all candidates who has already registered.
                <?php
                    $con= mysqli_connect('localhost','root','','voting')or die('unabel to connect');
                    $q= 'select * from candidate';
                    $result= mysqli_query($con,$q);
                    while($res= mysqli_fetch_array($result))
                    {
                ?>
                    
                    <div class="card m-3" style="width: 200px; height: 350px; float: left;">
                        <img class="card-img-top" width="8%" height="50%" src="symbols/<?php echo $res['cimage'];?>" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $res['cname'];?></h5>
                          <p class="card-text"><?php echo $res['cparty'].'<br>'.$res['cage'];?></p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                
                <?php
                    }    
                ?>
            </div>
        </div>
    </body>
</html>