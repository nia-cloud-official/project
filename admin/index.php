<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <style>
       .container { 
        padding:10px;
        display:flex;
        flex-direction: column;
       }
       .spacer { 
        height:10px;
       }
       .card { 
        display: flex;
        gap: 10px;
        padding:50px;
       }
       * {
        padding:20px;
       }
       .user-list { padding:10px; height:500px;font-family:poppins; border:solid 1px black;}
    </style>
    <center>
        <div class="user-list">

        </div>
      <div class="container" >
    <div class="card">
      Add User Now
    </div>
    <div class="spacer"></div>
    <div class="card">
      Delete a User
    </div>
    <div class="spacer"></div>
    <div class="card">
      Add a Courses
    </div>
    </div>  
    </center>
    
</body>
</html>