<?php
class Product{
  public static function getAll() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM sanpham');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function getByType($Type) {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM sanpham WHERE LoaiSp ='.$Type);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //tao phieu dang ky
  public static function create($TenSp, $MauSp, $SizeSp, $SoLuongSp, $GiaTienSp,$HinhAnhSp,$MoTaSp,$LoaiSp) {
    global $pdo;
    
    $sql = "INSERT INTO sanpham (TenSp, MauSp, SizeSp, SoLuongSp, GiaTienSp, HinhAnhSp, MoTaSp, LoaiSp) VALUES (:TenSp, :MauSp, :SizeSp, :SoLuongSp, :GiaTienSp, :HinhAnhSp, :MoTaSp, :LoaiSp)";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':TenSp', $TenSp);
    $stmt->bindParam(':MauSp', $MauSp);
    $stmt->bindParam(':SizeSp', $SizeSp);
    $stmt->bindParam(':SoLuongSp', $SoLuongSp);
    $stmt->bindParam(':HinhAnhSp', $HinhAnhSp);
    $stmt->bindParam(':GiaTienSp', $GiaTienSp,);
    $stmt->bindParam(':MoTaSp', $MoTaSp,);
    $stmt->bindParam(':LoaiSp', $LoaiSp,);

    return $stmt->execute();
  }
  public static function delete($Id,$MauSp,$SizeSp) {
    global $pdo;
    
    $sql = "DELETE FROM sanpham WHERE Id = :Id AND MauSp = :MauSp AND SizeSp = :SizeSp";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':Id', $Id);
    $stmt->bindParam(':MauSp', $MauSp);
    $stmt->bindParam(':SizeSp', $SizeSp);
    return $stmt->execute();
  }

  public static function update($TenSp, $MauSp, $SizeSp, $SoLuongSp, $GiaTienSp, $HinhAnhSp,$MoTaSp,$LoaiSp, $Id) {
    global $pdo;
    
    $sql = "UPDATE sanpham SET TenSp =:TenSp, SoLuongSp=:SoLuongSp, GiaTienSp=:GiaTienSp, HinhAnhSp=:HinhAnhSp, MoTaSp=:MoTaSp ,LoaiSp=:LoaiSp WHERE Id = :Id AND MauSp = :MauSp AND SizeSp = :SizeSp";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':TenSp', $TenSp);
    $stmt->bindParam(':MauSp', $MauSp);
    $stmt->bindParam(':SizeSp', $SizeSp);
    $stmt->bindParam(':SoLuongSp', $SoLuongSp);
    $stmt->bindParam(':GiaTienSp', $GiaTienSp);
    $stmt->bindParam(':HinhAnhSp', $HinhAnhSp);
    $stmt->bindParam(':MoTaSp', $MoTaSp,);
    $stmt->bindParam(':LoaiSp', $LoaiSp,);
    $stmt->bindParam(':Id', $Id);

    return $stmt->execute();
  }

  public static function find($TenSp) {
    global $pdo;
    
    $sql = "SELECT * FROM sanpham WHERE TenSp LIKE :TenSp";
    $stmt = $pdo->prepare($sql);
   
    $TenSp = '%' . $TenSp . '%'; // Adding wildcard characters to search for partial match
    $stmt->bindParam(':TenSp', $TenSp);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


  public static function findProduct($Id, $MauSp, $SizeSp) {
    global $pdo;
    
    $sql = "SELECT * FROM sanpham WHERE Id = :Id AND MauSp = :MauSp AND SizeSp = :SizeSp";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':Id', $Id);
    $stmt->bindParam(':MauSp', $MauSp);
    $stmt->bindParam(':SizeSp', $SizeSp);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}