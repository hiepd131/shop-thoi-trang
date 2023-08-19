<?php
class Bill
{
  public static function getAll()
  {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM bill');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function countBill($UserName)
  {
    global $pdo;

    $stmt = $pdo->query('SELECT COUNT(*) FROM bill WHERE Id_User = "' . $UserName . '" AND TGian BETWEEN NOW() - INTERVAL 30 MINUTE AND NOW()');
    return $stmt->fetchColumn();
  }
  public static function countBills($UserName)
  {
    global $pdo;

    $stmt = $pdo->query('SELECT COUNT(*) FROM bill WHERE Id_User = "' . $UserName . '"');
    return $stmt->fetchColumn();
  }
 public static function countPrice($UserName)
{
    global $pdo;

    $stmt = $pdo->query("SELECT SUM(Total) AS Total FROM (SELECT DISTINCT Id, Total FROM bill WHERE Id_User = '" . $UserName . "') AS T");
    return $stmt->fetchColumn();
}


  public static function getByUser($UserName)
  {
    global $pdo;

    $stmt = $pdo->query('SELECT * FROM bill WHERE Id_User = "' . $UserName . '" AND TGian BETWEEN NOW() - INTERVAL 30 MINUTE AND NOW()');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  //tao phieu dang ky
  public static function create($Id_User, $Id_Product, $Product_M, $Product_S, $Qty, $Payment, $Total, $Notes)
  {
    global $pdo;

    $sql = "INSERT INTO bill (Id_User, Id_Product, Product_M, Product_S, Qty, Payment, Total, Notes) VALUES (:Id_User, :Id_Product, :Product_M, :Product_S, :Qty, :Payment, :Total, :Notes)";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':Id_User', $Id_User);
    $stmt->bindParam(':Id_Product', $Id_Product);
    $stmt->bindParam(':Product_M', $Product_M);
    $stmt->bindParam(':Product_S', $Product_S);
    $stmt->bindParam(':Payment', $Payment);
    $stmt->bindParam(':Qty', $Qty,);
    $stmt->bindParam(':Total', $Total,);
    $stmt->bindParam(':Notes', $Notes,);

    return $stmt->execute();
  }
  public static function delete($Id)
  {
    global $pdo;

    $sql = "DELETE FROM bill WHERE Id = :Id";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':Id', $Id);

    return $stmt->execute();
  }

  public static function update($Id_User, $Id_Product, $Product_M, $Product_S, $Qty, $Payment, $Id)
  {
    global $pdo;

    $sql = "UPDATE bill SET Id_User =:Id_User, Id_Product =:Id_Product, Product_M =:Product_M, Product_S=:Product_S, Qty=:Qty, Payment=:Payment, Total=:Total WHERE Id= :Id";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':Id_User', $Id_User);
    $stmt->bindParam(':Id_Product', $Id_Product);
    $stmt->bindParam(':Product_M', $Product_M);
    $stmt->bindParam(':Product_S', $Product_S);
    $stmt->bindParam(':Qty', $Qty);
    $stmt->bindParam(':Payment', $Payment);
    $stmt->bindParam(':Total', $Qty,);
    $stmt->bindParam(':Id', $Id);

    return $stmt->execute();
  }

  public static function find($Id)
  {
    global $pdo;

    $sql = "SELECT * FROM bill WHERE Id = :Id";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':Id', $Id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function findProduct($Id, $Id_Product, $Product_M)
  {
    global $pdo;

    $sql = "SELECT * FROM bill WHERE Id = :Id AND Id_Product = :Id_Product AND Product_M = :Product_M";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':Id', $Id);
    $stmt->bindParam(':Id_Product', $Id_Product);
    $stmt->bindParam(':Product_M', $Product_M);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
