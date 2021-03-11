 <?php include 'baglan.php';
extract($_POST);
date_default_timezone_set('Europe/Istanbul');
// giriş işlemi
if (isset($giris)) {
  $admin_kadi = htmlspecialchars(trim($admin_kadi));
  $admin_sifre = htmlspecialchars(trim($admin_sifre));
    if (!$admin_kadi || !$admin_sifre) {
      header("Location: login.php?giris=bos");
       }else {
              $query = $db->prepare("SELECT * FROM admin WHERE admin_kadi=? AND admin_sifre=?");
              $query->execute(array($admin_kadi,$admin_sifre));
              $admin_giris = $query->fetch(PDO::FETCH_ASSOC);
                if ($admin_giris) {
                  $ip_adresi = $db->prepare("UPDATE admin SET ip_addr=:ip_addr WHERE admin_kadi=:admin_kadi and admin_sifre=:admin_sifre");
                  $ip_adresi_guncelle = $ip_adresi->execute(array(
                  "ip_addr"=>$_SERVER['REMOTE_ADDR'],
                  "admin_kadi"=>$admin_kadi,
                  "admin_sifre"=>$admin_sifre
                  ));
                      $_SESSION["login"] = true;
                      $_SESSION['son_giris_tarih'] = date("Y-m-d H:i:s");
                      $_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
                      $_SESSION["admin_id"] = $admin_giris["admin_id"];
                      header("Location: index.php");
                      }else {
                      header("Location: login.php?giris=no");
                    }
                  }
                }
//hesap ekleme
    if (isset($form_ekle)) {
    if (!$hesap_adi || !$miktar) {
        header("Location: hesap-ekle.php?sonuc=bos");
    }else{
        $ayarlar = $db->prepare("INSERT INTO hesap_form SET hesap_adi=? , hesap_turu=? , miktar=? , birim=? ");
        $insert = $ayarlar->execute(array($hesap_adi,$hesap_turu,$miktar,$birim));
        if ($insert) {
            header("Location: hesap-ekle.php?sonuc=yes");
        }else{
              header("Location: hesap-ekle.php?sonuc=no");
        }
    }
}
// market harcaması ekleme

if (isset($market_ekle)) {
    if (!$harcama_adi || !$harcama_miktar) {
        header("Location: kategori.php?sonuc=bos");
    }
    else{

        $ayarlar = $db->prepare("INSERT INTO harcama SET harcama_adi=? , harcama_miktar=? ,harcama_birim=? , harcama_tarih=? , harcama_adres=?"); 
        $insert = $ayarlar->execute(array($harcama_adi,$harcama_miktar,$harcama_birim,$harcama_tarih,$harcama_adres));
        if ($insert) {

          $son_harcama_fiyat = $db->prepare("SELECT harcama_miktar FROM harcama WHERE harcama_birim=? ORDER BY harcama_id DESC LIMIT 1");
          $son_harcama_fiyat->execute(array($harcama_birim));

          $son_harcama_cek = $son_harcama_fiyat->fetch(PDO::FETCH_ASSOC);


  

// market kategorisi fiyat güncelleme

        if($harcama_birim=="₺"){
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_tl = kategori_tl+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }else if ($harcama_birim=="$") {
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_dolar = kategori_dolar+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }else{
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_euro = kategori_euro+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }

            header("Location: kategori.php?sonuc=yes");
        }else{
              header("Location: kategori.php?sonuc=no");
        }
    }
}

// akaryakıt harcaması ekleme

if (isset($akaryakit_ekle)) {
    if (!$harcama_adi || !$harcama_miktar) {
        header("Location: kategori.php?sonuc=bos");
    }
    else{

        $ayarlar = $db->prepare("INSERT INTO harcama SET harcama_adi=? , harcama_miktar=? ,harcama_birim=? , harcama_tarih=? , harcama_adres=?"); 
        $insert = $ayarlar->execute(array($harcama_adi,$harcama_miktar,$harcama_birim,$harcama_tarih,$harcama_adres));
        if ($insert) {

          $son_harcama_fiyat = $db->prepare("SELECT harcama_miktar FROM harcama WHERE harcama_birim=? ORDER BY harcama_id DESC LIMIT 1");
          $son_harcama_fiyat->execute(array($harcama_birim));

          $son_harcama_cek = $son_harcama_fiyat->fetch(PDO::FETCH_ASSOC);

// akaryakıt kategorisi fiyat güncelleme

        if($harcama_birim=="tl"){
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_tl = kategori_tl+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }else if ($harcama_birim=="dolar") {
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_dolar = kategori_dolar+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }else{
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_euro = kategori_euro+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }

            header("Location: kategori.php?sonuc=yes");
        }else{
              header("Location: kategori.php?sonuc=no");
        }
    }
}
// sağlık harcaması ekleme
if (isset($saglik_ekle)) {
    if (!$harcama_adi || !$harcama_miktar) {
        header("Location: kategori.php?sonuc=bos");
    }
    else{

        $ayarlar = $db->prepare("INSERT INTO harcama SET harcama_adi=? , harcama_miktar=? ,harcama_birim=? , harcama_tarih=? , harcama_adres=?"); 
        $insert = $ayarlar->execute(array($harcama_adi,$harcama_miktar,$harcama_birim,$harcama_tarih,$harcama_adres));
        if ($insert) {

          $son_harcama_fiyat = $db->prepare("SELECT harcama_miktar FROM harcama WHERE harcama_birim=? ORDER BY harcama_id DESC LIMIT 1");
          $son_harcama_fiyat->execute(array($harcama_birim));

          $son_harcama_cek = $son_harcama_fiyat->fetch(PDO::FETCH_ASSOC);


  

// sağlık kategorisi fiyat güncelleme

        if($harcama_birim=="tl"){
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_tl = kategori_tl+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }else if ($harcama_birim=="dolar") {
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_dolar = kategori_dolar+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }else{
          $kategori_fiyat_guncelle = $db->prepare("UPDATE kategori set kategori_euro = kategori_euro+? where kategori_adi=?");
          $kategori_fiyat_guncelle->execute(array($son_harcama_cek['harcama_miktar'],$kategori_adi));
        }

            header("Location: kategori.php?sonuc=yes");
        }else{
              header("Location: kategori.php?sonuc=no");
        }
    }
}

//nakit düzenleme

if (isset($nakit_duzenle)) {
        $hesap_id = $_GET["hesap_id"]; 
        $nakit = $db->prepare("UPDATE hesap_form SET hesap_adi=?, miktar=?, birim=? WHERE hesap_id=?");
        $update = $nakit->execute(array($hesap_adi,$miktar,$birim,$hesap_id));

        if ($update){
            header("Location: nakit.php?update=yes");
        }else{
            header("Location: nakit.php?update=no");
        }
        }    


// nakit silme
  
    $nakitsil_id = $_GET["nakitsil_id"];
      if (isset($nakitsil_id)) {
        $nakit = $db->prepare("DELETE FROM hesap_form WHERE hesap_id=?");
        $delete = $nakit->execute(array($nakitsil_id));
        if ($delete) {
            header("Location: nakit.php?sonuc=yes");
        }else{
              header("Location: nakit.php?sonuc=no");
        }
    }

    //kart düzenleme

if (isset($kart_duzenle)) {
        $hesap_id = $_GET["hesap_id"]; 
        $kart = $db->prepare("UPDATE hesap_form SET hesap_adi=?, miktar=?, birim=? WHERE hesap_id=?");
        $update = $kart->execute(array($hesap_adi,$miktar,$birim,$hesap_id));

        if ($update){
            header("Location: kart.php?update=yes");
        }else{
            header("Location: kart.php?update=no");
        }
        }    


// kart silme
  
    $kartsil_id = $_GET["kartsil_id"];
      if (isset($kartsil_id)) {
        $kart = $db->prepare("DELETE FROM hesap_form WHERE hesap_id=?");
        $delete = $kart->execute(array($kartsil_id));
        if ($delete) {
            header("Location: kart.php?sonuc=yes");
        }else{
              header("Location: kart.php?sonuc=no");
        }
    }

//admin güncelleme
    if (isset($admin_guncelle)) {
        $admin_id = $_GET["admin_id"]; 
        $admin = $db->prepare("UPDATE admin SET admin_kadi=?, admin_sifre=? WHERE admin_id=?");
        $update = $admin->execute(array($admin_kadi,$admin_sifre,$admin_id));

        if ($update){
            header("Location: kadi-islem.php?update=yes");
        }else{
            header("Location: kadi-islem.php?update=no");
        }
        }    


// admin silme
  
    $kadisil_id = $_GET["kadisil_id"];
      if (isset($kadisil_id)) {
        $kadi = $db->prepare("DELETE FROM admin WHERE admin_id=?");
        $delete = $kadi->execute(array($kadisil_id));
        if ($delete) {
            header("Location: kadi-islem.php?sonuc=yes");
        }else{
              header("Location: kadi-islem.php?sonuc=no");
        }
    }
   


// nakit-transfer
if (isset($transfer)) 
{
        
        
               
                    if ($insert) {
                        header("Location: nakit.php?sonuc=yes");
                    }else{
                        header("Location: nakit-transfer.php?sonuc=no");
                    }
                }
            

?>