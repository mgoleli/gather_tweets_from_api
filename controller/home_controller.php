<?php 

class homeController {

    public function __construct(){
        session_start();
        require 'db/db_connect.php';
        global $conn;
        $conn = new Connection;
    }

    public function index($page=null){
        if(isset($_SESSION['userid'])){
            
            global $conn;
            $userid=$_SESSION['userid'];
            if(empty($page)){$page=1;}
            $limit=10;
            $start=($page-1)*$limit;
            $sql = "Select * from twits where userid='$userid' limit ". $start .", ".$limit." ";
            $twitData = $conn->myQueryAll($sql);
            
            $sqlTotal = "Select * from twits where userid='$userid'";
            $twitTotal = count($conn->myQueryAll($sqlTotal));
            $twitTotalPage=ceil($twitTotal/$limit);

            $data['twitdata']=$twitData;
            $data['pages']=$twitTotalPage;
            $data['twitTotal']=$twitTotal;
            self::viewPage('twits_list',$data);

        }else{
            header('refresh: 0; URL= /login');
        }
        
    }

    public function register(){
        global $conn;
        $messages = [];

        if(isset($_POST['register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $passwordPost = $_POST["password"];
            $password  = password_hash($passwordPost, PASSWORD_DEFAULT);
            $emailList = "Select * from users where email = '".$email."' ";
            $resultEmailList = $conn->myQuery($emailList);
            if($resultEmailList) $messages['email'] = "Email Kayitli";
            if(!$email) $messages['email'] =    "E-mail boş olamaz";
            if(!$username) $messages['username'] = "Kullanıcı Adı boş olamaz";
            if(!$passwordPost) $messages['password'] = "Parola boş olamaz";
            if(empty($messages)){
                $sql =  ("INSERT INTO users(username,email,password) values('$username','$email','$password')");
                //print_r("INSERT INTO users(username,email,password) values('$username','$email','$password')"); exit;
                $conn->myQuery($sql);
                header('refresh: 0; URL= /login');
                 
            }
        }
        self::viewPage('register',$messages);

    }

    public function login(){
        global $conn;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']))
        {
            $email = $_POST['email'];
            $password = $_POST["password"];
            $sql = "select password from users where email = '".$email."' ";
            
            $row = $conn->myQuery($sql);

            if (is_array($row))
            {
                if (password_verify($password, $row['password']))
                    {
                                        
                    $sql = "select username,userid from users where email = '".$email."' ";
                    $row = $conn->myQuery($sql);
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['username'] = $row['username'];
                    //print_r($row['username']); exit;
                    self::getTwit($row);
                    header('refresh: 0; URL= /');
                }
                else {
                    echo 'Email veya parola hatalı!';
                }   
            }
        }
    }else{
        self::viewPage('login');
    }

    }

    public function viewPage($page,$data=null){
        require 'views/'.$page.'.php';
    }
    public function getTwit($row){
        global $conn;
        $url = "https://6212c33cf43692c9c6f21f89.mockapi.io/tweets";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);   
        $array = json_decode($result, true);
        $keys = array_column($array, 'createdAt');
        array_multisort($keys, SORT_DESC, $array);
        $counter=1;
        $success=false;
        foreach($array as $key => $value) {
            if($counter < 20 ){
                if(in_array($row['username'],$value)){
                    self::twitControl($value);
                }
            }else{ break; }
            $counter++;
    }
        return $success;
    }

    public function twitControl($twit){
        global $conn;
        $twitId = $twit['id'];
        $userid=$_SESSION['userid'];
        $sql = "Select * from twits where twit_id = '".$twitId."' and userid='$userid' ";
        $twitData = $conn->myQuery($sql);
        if(empty($twitData)) {
            self::addTweet($twit);
        }else {
            self::updateTwet($twit);
        }
    }

    public function addTweet($twit){
        if(isset($_POST['content'])){
            global $conn;
            $userid=$_SESSION['userid'];
            $username=$_SESSION['username'];
            $twitContent = $_POST['content'];
            if(empty($twit['id'])){
                $postData = [
                    'username' => $username,
                    'content' => $twitContent
                ];
                
                $postData=json_encode($postData);
                $url = "https://6212c33cf43692c9c6f21f89.mockapi.io/tweets";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                $result=curl_exec($ch);
                curl_close($ch);
                $result=json_decode($result,true);
                $twit_id=$result['id'];
    
            }else{
                $twit_id=$twit['id'];
            }
            
            $sql = ("INSERT INTO twits(twit_id,twit,userid) values('$twit_id', '$twitContent', '$userid') ");
            //print_r("INSERT INTO twits(twit_id,twit,userid) values('$twit_id', '$twitContent', '$userid')"); exit;
            $conn->myQuery($sql);
            header('refresh: 0; URL= /');
        }
        self::viewPage('add');
    }

    public function updateTwet($twit_id){
        global $conn;
        $sql = "select * from twits where twit_id = '".$twit_id."' ";
        $row = $conn->myQuery($sql);
        if(isset($_POST['content'])){
            global $conn;
            $userid=$_SESSION['userid'];
            $twit_id= $twit_id;
            $twitContent = $_POST['content'];
            $status = $_POST['status'];

            
            $postData = [
                'id' => $twit_id,
                'content' => $twitContent,
                'published' => $status
            ];
            
            $postData=json_encode($postData);
            $url = "https://6212c33cf43692c9c6f21f89.mockapi.io/tweets/".$twit_id;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            $result=curl_exec($ch);
            curl_close($ch);
            $sql = ("UPDATE twits set twit='".$twitContent."', status='".$status."' where twit_id='$twit_id' and userid='$userid'");
            $conn->myQuery($sql);
            header('refresh: 0; URL= /');
        }
        self::viewPage('update',$row);
    }
    

    public function deleteTwit($twit_id){
        global $conn;
        $userid=$_SESSION['userid'];
        $postData = [
            'id' => $twit_id
        ];
        
        $postData=json_encode($postData);
        $url = "https://6212c33cf43692c9c6f21f89.mockapi.io/tweets/".$twit_id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $result=curl_exec($ch);
        $sql = ("DELETE from twits where twit_id='$twit_id' and userid='$userid'");
        $conn->myQuery($sql);
        curl_close($ch);
        header('refresh: 0; URL= /');
    }

    public function logout(){
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        //echo "oturum kapatildi";
        session_destroy();
        header('refresh: 0; URL= /login');
    }

}
?>
