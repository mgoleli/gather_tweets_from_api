<!DOCTYPE html>
<html>
    <head><title>Twit Güncelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
</head>
<body>
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $data['twit_id']; ?>" />
    <div class="form-group m-2">
    <label>Tweetini Güncelle</label>
    <input  type="text" class="form-control mt-2" name="content" placeholder="Content" value="<?php echo $data['twit']; ?>">
    </div>
    <div class="form-group m-2">
        <label>Yayınlansın mı</label>
         <select class="form-select" name="status">
             <option value="1">Yayınla</option>
             <option value="0">Yayınlama</option>
         </select>
    </div>
    <button type="submit" name="submit" class="btn btn-success m-2">Tweet Güncelle</button>
</form>
</body>
</html>