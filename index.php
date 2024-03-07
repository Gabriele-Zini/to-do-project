<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>to-do</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />


</head>

<body>
    <div id="app">
        <div class="container mt-5">

            <div class="mx-auto d-flex flex-column align-items-center justify-content-center  col-12 col-md-3">

                <form action="server.php" method="POST">
                    <label for="newTodo">Inserisci un nuovo todo</label>
                    <div class="d-flex gap-3 align-items-center justify-content-center mt-4">
                        <input id="newTodo" name="newTodo" type="text" placeholder="scrivi un nuovo todo" class="form-control" />
                        <button type="submit" class="btn btn-success"> send</button>
                    </div>
                </form>
              <!--   <form action='server.php' method='POST'>
                    <input type='hidden' id='deleteId' name='deleteId' value='<?php $row['id'];?>'>
                    <button type='submit' class='btn btn-danger me-3'>X</button>
                </form> -->
               <!--  <form action='server.php' method='POST'>
                    <input type='hidden' id='toggleId' name='toggleId' value='<?php $row['done'];?>'>
                    <button type='submit' class='btn btn-success'>done</button>
                </form> -->


            </div>

            <ul class="list-group mt-5 align-items-center">
                <?php include 'get_data.php'; ?>

            </ul>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>