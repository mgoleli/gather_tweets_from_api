
<!DOCTYPE html>
<html>
<head>
<style>
    form{
        width:30%;
        margin: 0 auto;              
    }
</style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>     
    <title>Giriş</title>
</head>
    <body>
        <form action="" method="post">
            <div class="form-group mt-2">
            <label for="email">Email</label>
            <input  type="text" class="form-control " name="email" placeholder="Email">
            </div>
            <div class="form-group  mt-2">
            <label for="email">Parola</label>
            <input type="text" class="form-control"  name="password" placeholder="Parola">
            </div>
            <button type="submit" name="login" class="btn btn-success mt-2">Oturum Aç</button>
            <a href = "/register" title = "Kayıt Ol" class="btn btn-primary mt-2 ml-2" >Kayıt Ol</a>
        </form>
        
    </body>         
</html>