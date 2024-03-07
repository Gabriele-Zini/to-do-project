<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to-do-projects</title>
       <!-- Bootstrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>
<body>
<div class="container d-flex justify-content-center mt-5">
        <div class="col-12 col-md-8 col-lg-5">
            <div class="card">
                <form action="./server/create_user.php" method="POST" class="d-flex w-75 flex-column p-3 mx-auto align-items-center justify-content-center">
                    <div class="mb-3 w-75">
                        <label class="form-label" for="username">username</label>
                        <input class="form-control" type="text" id="username" name="username">

                    </div>
                    <div class="w-75 mb-3">
                        <label class="form-label" for="password">password</label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>


                   <!--  <div class="w-75">
                        <label class="form-label" for="confirm_password"> confirm password</label>
                        <input class="form-control" type="password" id="" name="">
                    </div> -->

                    <div class="d-flex justify-content-start align-items-center mt-4 gap-4"> 
                        <button class="btn btn-primary" type="submit">send</button>
                        <a href="login.php">already registered?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>