<?php
class PhieuDangKy{
  public static function getAll() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM phieudangkythuctap');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //tao phieu dang ky
  public static function create($hoten, $masinhvien, $chuyennganh, $congty,$cv) {
    global $pdo;
    
    $sql = "INSERT INTO phieudangkythuctap (HoTen, MaSinhVien, ChuyenNganh, CongTy, Cv) VALUES (:hoten, :masinhvien, :chuyennganh, :congty, :cv)";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':masinhvien', $masinhvien);
    $stmt->bindParam(':chuyennganh', $chuyennganh);
    $stmt->bindParam(':congty', $congty);
    $stmt->bindParam(':cv', $cv);

    return $stmt->execute();
  }
  public static function delete($maphieu) {
    global $pdo;
    
    $sql = "DELETE FROM phieudangkythuctap WHERE MaSoPhieu = :maphieu";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':maphieu', $maphieu);

    return $stmt->execute();
  }

  public static function update($hoten, $masinhvien, $chuyennganh, $congty, $maphieu) {
    global $pdo;
    
    $sql = "UPDATE phieudangkythuctap SET HoTen =:hoten, MaSinhVien =:masinhvien, ChuyenNganh =:chuyennganh, CongTy=:congty WHERE MaSoPhieu= :maphieu";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':masinhvien', $masinhvien);
    $stmt->bindParam(':chuyennganh', $chuyennganh);
    $stmt->bindParam(':congty', $congty);
    $stmt->bindParam(':maphieu', $maphieu);

    return $stmt->execute();
  }

  public static function find($masophieu) {
    global $pdo;
    
    $sql = "SELECT * FROM phieudangkythuctap WHERE MaSoPhieu = :masophieu";
    $stmt = $pdo->prepare($sql);
   

    $stmt->bindParam(':masophieu', $masophieu);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
