<!DOCTYPE html>
<html>
    <head>
        <style>
            form{
                width: 30%;
                margin: 0 auto;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Kayıt</title>
    </head>
    <body>
        <form action="" method="post">
        <div class="form-group mt-2">
                <label for="username">Kullanıcı Adı</label>
                <input type="text" name="username" class="form-control mt-2" placeholder="Kullanıcı Adı">
                <?php
                        if (array_key_exists('username', $data)) {
                            echo "<small class='form-text text-muted'>".$data['username']."</small>";
                        }
                ?>
            </div>
            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control mt-2" aria-describedby="emailHelp" placeholder="E-mail">
                <?php
                        if (array_key_exists('email', $data)) {
                            echo "<small class='form-text text-muted'>".$data['email']."</small>";
                        }
                ?>
            </div>
            <div class="form-group mt-2">
                <label for="password">Parola</label>
                <input type="password" class="form-control mt-2" name="password" placeholder="Password">
                <?php
                        if (array_key_exists('password', $data)) {
                            echo "<small class='form-text text-muted'>".$data['password']."</small>";
                        }
                ?>
            </div>
            <button type="submit" name="register" class="btn btn-primary mt-3">Kayıt Ol</button>
        </form>
    </body>
</html>