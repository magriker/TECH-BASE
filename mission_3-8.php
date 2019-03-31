<?php
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
$sql="CREATE TABLE IF NOT EXISTS tbtest"
."("
."id INT,"
."name char(32),"
."comment TEXT"
.");";
$stmt=$pdo->query($sql);
$sql='SHOW TABLES';
$result=$pdo->query($sql);
foreach ($result as $row) {
  echo $row[0];
  echo '<br>';
}
echo "<hr>";
$sql='SHOW CREATE TABLE tbtest';
$result=$pdo->query($sql);
foreach ($result as $row) {echo $row[1];
  // code...
}
echo "<hr>";
$sql=$pdo->prepare("INSERT INTO tbtest (id,name,comment) VALUES ('1',:name,:comment)");
$sql->bindParam(':name',$name,PDO::PARAM_STR);
$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
$name='rute66';
$comment='jazz';

$sql->execute();
$sql='SELECT * FROM tbtest';
$stmt=$pdo->query($sql);
$results=$stmt->fetchAll();
foreach($results as $row){
  echo $row['id'].',';
  echo $row['name'].',';
  echo $row['comment'].'<br>';
}

$id=1;
$name="rock";
$comment="funk";
$sql='update tbtest set name=:name,comment=:comment where id=:id';
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':name',$name,PDO::PARAM_STR);
$stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();

$id=2;
$sql='delete from tbtest where id=:id';
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();
?>
