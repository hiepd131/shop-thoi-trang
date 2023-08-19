<?php
class User{
  public static function create($UserName, $Pass, $FullName) {
    global $pdo;
    
    $sql = "INSERT INTO user(UserName, Pass, FullName) VALUES (:UserName, :Pass, :FullName)";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':UserName', $UserName);
    $stmt->bindParam(':Pass', $Pass);
    $stmt->bindParam(':FullName', $FullName);

    return $stmt->execute();
  }

  public static function find($UserName) {
    global $pdo;
    
    $sql = "SELECT * FROM user WHERE UserName = :UserName";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':UserName', $UserName);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function update($UserName,$Pass,$FullName,$Email,$Phone,$Address, $avatar) {
    global $pdo;
    
    $sql = "UPDATE user SET Pass = :Pass, FullName = :FullName, Email = :Email, Phone = :Phone, Address = :Address, Avatar = :Avatar where UserName = :UserName";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':UserName', $UserName);
    $stmt->bindParam(':Pass', $Pass);
    $stmt->bindParam(':FullName', $FullName);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Phone', $Phone);
    $stmt->bindParam(':Address', $Address);
    $stmt->bindParam(':Avatar', $avatar);

    return $stmt->execute();
  }
}
