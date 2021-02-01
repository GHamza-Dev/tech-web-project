<?php

class Db{
    
   # Constructor 
   function __construct(){}
   
   # Connection
   function connect(){
    $conn=new PDO('mysql:host=localhost;dbname=web_project_est','root','');
    return $conn; 
    }  

   # Get challenges
   function getChallenges($id = false){
        $con = $this->connect();

        if(!$id) $res = $con->prepare("SELECT * FROM challenge");
        else $res = $con->prepare("SELECT * FROM challenge WHERE id_chall = ?");

        $res->execute([$id]);
        $list=[];    

        while($ligne=$res->fetch()){
            $list[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
        }

        $res->closeCursor();  
        return $list;    
    }

    # Get Solutions
    function getsolution(){
        $con=$this->connect();
        $res=$con->prepare("SELECT Dev.first_name,Dev.last_name,Solution.github_link, Solution.demo_link,Solution.feedback,challenge.level,challenge.challenge_title, challenge.langs_and_techs , Dev.score , Dev.image FROM Solution JOIN challenge ON Solution.id_chall= challenge.id_chall JOIN Dev ON Dev.id_Dev= Solution.id_dev ");
        $res->execute();
        $lst=[];
        while($ligne=$res->fetch()){
          $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7],$ligne[8],$ligne[9]];
        }
        $res->closeCursor();  
        return $lst;
    }

    # Add challenge
    function addChallenge($type_chall,$text_langa,$zipfile,$discription_chall,$title_chall,$desktoppreview,$mobile_preview){
        $con=$this->connect();
        $res=$con->prepare("INSERT INTO challenge  VALUES(NULL,?,?,?,?,?,?,?)") ;
        $res->execute([$type_chall,$text_langa,$zipfile,$discription_chall,$title_chall,$desktoppreview,$mobile_preview]);
        $res->closeCursor();
    }

    # Get last id
    function getlastid(){
        $con=$this->connect();
        $res=$con->prepare("SELECT id_chall FROM  challenge  ORDER BY id_chall DESC LIMIT 1") ;
        $res->execute();
        return $res->fetch();
        $res->closeCursor();
    }

    # Get Devs1
    function getDevAdmin($lastName=null){
        $con=$this->connect();
        
        $lst=[];

        if($lastName==null){
          $res=$con->prepare("SELECT `first_name`,`last_name`,`country`,Dev.`github_link`, `score`,`email` , `image`,COUNT(Solution.id_Dev) as nbrsolution FROM Solution INNER JOIN Dev on Solution.id_Dev= Dev.id_Dev  GROUP by Solution.id_Dev  ");
          $res->execute();
          
         while($ligne=$res->fetch()){
           $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
          }
        }else{
          $res=$con->prepare("SELECT `first_name`,`last_name`,`country`,Dev.`github_link`, `score`,`email` , `image`,COUNT(Solution.id_Dev) as nbrsolution FROM Solution INNER JOIN Dev on Solution.id_Dev= Dev.id_Dev WHERE last_name=? GROUP by Solution.id_Dev ");
          $res->execute(["$lastName"]);
          
          while($ligne=$res->fetch()){
             $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
         }
        } 
        return $lst;
    }
    # Get devs2
    function getDevs(){
      $con=$this->connect();
      $res=$con->prepare("SELECT * fROM Dev");
      $res->execute();
      $lst=[];
      while($ligne=$res->fetch()){
        $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
       }
       return $lst;
    }
   
    // Statistics
    # get nbr of challenges
    function getNbrChallenge(){
        $con=$this->connect();
        $res=$con->prepare("SELECT COUNT(id_chall) as nunberChallenge FROM challenge");
        $res->execute();
        return $res->fetch();
      }
    
    # --
    
      function getNbrSolution(){
        $con=$this->connect();
        $res=$con->prepare("SELECT COUNT(`demo_link`) as numbersolution FROM Solution");
        $res->execute();
        return $res->fetch();
      }
    
    # --
    
      function getNbrDev(){
        $con=$this->connect();
        $res=$con->prepare("SELECT COUNT(`id_Dev`) as numbersDev FROM Dev");
        $res->execute();
        return $res->fetch();
      }

     # add devaloper
     function registerDev($f_name,$l_mame,$github_link,$score,$country,$image,$password,$email)
      {
       $con=$this->connect();
       $res=$con->prepare("INSERT into Dev values(NULL,?,?,?,?,?,?,?,?)");
       $res->execute([$f_name,$l_mame,$github_link,$score,$country,$image,$password,$email]);
       $res->closeCursor();
        }
      
      # login dev
      function logdev($username,$password){
        $con=$this->connect();
        $reponse=$con->prepare("select * from Dev where first_name= ? and password = ?");
        $reponse->execute([$username,$password]);
        if ($ligne=$reponse->fetch()) return $ligne;
        return false;       
      }

      # dev profile

      function profileDev($id){
        $con=$this->connect();
        $res=$con->prepare("SELECT * FROM Dev WHERE `id_Dev`=?");
        $res->execute([$id]);
        $lst=[];
          while($ligne=$res->fetch()){
          $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7],$ligne[8]];
          }
          return $lst;
       }

       # Numbre of solutions
       function nbrSolutionDevx($idev){
          $con=$this->connect();
          $res=$con->prepare("SELECT COUNT(Solution.id_Dev) FROM Solution WHERE Solution.id_Dev=?");
          $res->execute([$idev]);
          return $res->fetch();         
        }

        # new download
        function insertDownload($idchall,$iddev){
          $con=$this->connect();
          $res=$con->prepare("INSERT INTO `downloads` (`id_chall`, `id_Dev`) VALUES (?, ?)");
          $res->execute([$idchall,$iddev]);
          //$res->closeCursor();           
        }

        # Downloaded challenges
        function downloadedChallenges($id){
          $con=$this->connect();
          $res=$con->prepare("SELECT challenge.id_chall,challenge.challenge_title,challenge.langs_and_techs,challenge.level FROM challenge JOIN downloads on    downloads.id_chall = challenge.id_chall WHERE downloads.id_Dev= ?");
          $res->execute([$id]);
      
          $lst=[];
          while($ligne=$res->fetch()){
            $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3]];
          }
          return $lst;
          $res->closeCursor();
       }

       # add solution
       function addSolution($id_chall,$id_dev,$github_link,$Demo,$text,$langs){
          $conn=$this->connect();
          $res=$conn->prepare("INSERT into Solution values(?,?,?,?,?,0,?)");
          $res->execute([$id_chall,$id_dev,$github_link,$Demo,$text,$langs]);
          $res->closeCursor();
        }
       
        # delete download 
        function deleteDownload($id_chall,$id_dev){
          $conn=$this->connect();
          $res=$conn->prepare("DELETE FROM downloads where id_chall= ? and id_Dev= ?");
          $res->execute([$id_chall,$id_dev]);
          $res->closeCursor();
        }
}

   // $db = new Db();
    
    
   //$db->insertDownload(4,2);

?>    