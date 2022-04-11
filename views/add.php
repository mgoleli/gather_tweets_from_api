
<!DOCTYPE html>
<html>
    <head><title>Twit Ekle</title>
<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
</head>
<body>

<form  action="/tweets/add" method="post">
    <div class="form-group m-2">
    <label>Tweetini Yaz</label>
    <input  type="text" class="form-control" name="content" placeholder="İçerik">
    </div>
    <button type="submit" name="submit" class="btn btn-success m-2">Tweet Ekle</button>
</form>
</body>
</html>