<html>
 <head>
  <title>mission2-5</title>
  <meta charset="utf-8">
 </head>
<body>
  <?php
  $namae=$_POST['namae'];
  $comment=$_POST['comment'];
  $delete=$_POST['sakujo'];
  $editing=$_POST['hensyu'];
  $editingsecond=$_POST['editing-second'];
  $pass=$_POST['pass'];
  $deletepass=$_POST['deletepass'];
  $editingpass=$_POST['editingpass'];


$filename='mission_2-5.txt';

if(!empty($editing) && !empty($editingpass))
{$fileline=file('mission_2-5.txt');
  foreach($fileline as $filelines)
  {$jazz=explode("<>",$filelines);
        if ($jazz[0]==$editing && $jazz[4]==$editingpass) {
                          $new_name=$jazz[1];
                          $new_comment=$jazz[2];
                          $hidden=$jazz[0];
          }
          ;}
    ;}




  if (!empty($namae) && !empty($comment) && !empty($pass))
  {
    if (!empty($editingsecond)){

        $lines = file($filename);
    	$fp = fopen($filename,'w');
    		foreach($lines as $line){

    			$data = explode("<>",$line);
    			  if($data[0] == $editingsecond){
              $inputvalue=$editingsecond .'<>'.$namae.'<>'.$comment .'<>'.date('y年m月d日 h:i:s') .'<>'.$pass.'<>'."\n";
    			    fwrite($fp,$inputvalue);
            }else{
              fwrite($fp,$line);
                  }
        }fclose($fp);
    }else{
            if(file_exists($filename)){
              $lines=file($filename);$number=count($lines)+1;}else{$number=1;
              }
           $inputvalue=$number .'<>'.$namae .'<>'.$comment .'<>'.date('y年m月d日 h:i:s') .'<>'.$pass .'<>'."\n";
           $fp=fopen($filename,'a');
           fwrite($fp,"{$inputvalue}");
          fclose($fp);
     }
    }




  if (!empty($delete)&&!empty($deletepass))
   {$i=1;
    $filename='mission_2-5.txt';
    $hairetu=file("mission_2-5.txt");
    $fp=fopen($filename,'w');

    foreach ($hairetu as $value) {
      $new_value=explode("<>",$value);
      if ($new_value[0]==$delete) {if ($deletepass!=$new_value[4]) {
                                  fwrite($fp,$value);}

      }else {$all = $i.'<>'.$new_value[1].'<>'.$new_value[2].'<>'.$new_value[3].'<>'.$new_value[4].'<>'.$new_value[5];
              fwrite($fp, $all);
              $i = $i + 1;}

    }fclose($fp);
    // code...
  }




?>
  <form method="post" action="mission_2-5.php">
    名前：<input type="text" name="namae" value="<?php echo $new_name;?>"><br>
    コメント：<input type="text" name="comment" value="<?php echo $new_comment;?>"><br>
    パスワード：<input type="text" name="pass">
              <input type="hidden" name="editing-second" value="<?php echo $hidden;?>">
   <input type="submit" name="btn" value="送信"><br>
  <br>削除：<input type="text" name="sakujo"><br>
  パスワード:<input type ="text" name="deletepass"><input type="submit" value="削除"　name="delete"><br>
  <br>編集：<input type="text" name="hensyu"><br>
  パスワード:<input type="text" name="editingpass"><input type="submit" value="編集"  name="editing">
  </form>




<?php
$file=file('mission_2-5.txt');
foreach($file as $line){
$new_lines=explode("<>",$line);
echo $new_lines[0].$new_lines[1] .$new_lines[2] .$new_lines[3] .$new_lines[4] ."<br>";}

?>

</body>


</html>
