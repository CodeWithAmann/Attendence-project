<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
body
{
    background-color: rgb(19, 3, 84);
    
}
.take-photo {
    position: relative;
    height: 200px;
    width: 300px;
    border: 3px solid #157ce4;
    overflow: hidden;
    margin: 0 auto;
}

#cameraFeed {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#photoPreview {
    display: none;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.take-photo button {
    justify-content: center;
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
}
.container
{
    background-color: rgba(8, 104, 115, 0.761);
    color: rgba(255, 255, 255, 0.695);
}
h2{
    text-align: center;
    color: white;
    text-align: center;
    background-color: rgba(3, 3, 98, 0.859); /* Change background color to blue */
    padding: 10px; /* Add padding for better appearance */
    margin-top: 10px; /* Add margin to separate from other elements */
    border-radius: 4%;
    
}

#submitbtn{
background-color: rgb(18, 17, 17);
    margin-bottom: 20px;
    border-top: 20px;
    margin-top: 10px;
}
#resetbtn
{
    background-color: black;
    margin-bottom: 10px;
    margin-left: 100px;
}
.move
{
    text-align: center;
    margin-right: 90px;
}
    </style>

    <title>SCE Entry Form</title>
</head>
<body>

<div class="container">

<br>
<h2>SCE Entry Form</h2>
<form id="entryForm" method="POST" action="reRegister.php" >


    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="mnumber">Mobile NO</label>
            <input type="number" class="form-control" id="mnumber" name="mnumber" placeholder="Enter Mobile No."required>
        </div>
    </div>
    <div class="form-group">
        <label for="purpose">Purpose Of Visiting</label>
        <textarea class="form-control" id="purpose" name="purpose" rows="3" required></textarea>
    </div>
   
    <div class="move">
          <input id="resetbtn" type="reset" class="btn btn-primary" value="Reset Form">
          <input id="submitbtn" type="submit" class="btn btn-primary" value="Submit Form">
    <!-- <button id="submitbtn" type="submit" class="btn btn-primary">Submit</button> -->
    </div>
   

</form>

</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>
</html>