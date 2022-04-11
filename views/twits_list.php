<?php  //echo "<pre>";  print_r($data); exit;
 ?>
<!DOCTYPE html>
<html>
    <head><title>Twit Listeleme</title>
    <style>
        .text-left .btn-danger {
            float: right;
            margin: 1%;
        }
    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
</head>
<body>
    <div class="text-left">
    <a href="/tweets/add" class="btn btn-success m-3">Tweet Ekle</a>
    <a href="/logout" class="btn btn-danger text-right">Çıkış Yap</a>
    </div>
    <?php foreach($data['twitdata'] as $key => $value) { ?>
    <ul class="list-group">
    <li class="list-group-item" style="color:gray;">
    <?php echo $value['twit'].' | <a href="tweets/edit/'.$value['twit_id'].'">Güncelle</a> <a href="tweets/delete/'.$value['twit_id'].'">Sil</a> <br>';?>
    </li>
<?php } ?>
</ul>
<div>
<?php for($page=1; $page<=$data['pages']; $page++) { ?>
   <a href="/<?php echo $page; ?>"><?php echo $page; ?></a>
<?php } ?>
</div>
</body>
</html>