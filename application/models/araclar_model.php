<?php
class araclar_model extends CI_model {
    //herkese açık değişken
    public $tablo_adi = "";

    public function __construct()
    {
        //bu metoda diğer metotlar erişebilecek.
        parent::__construct();
        $this -> tablo_adi = "tbl_araclar";
    }

    public function tumAraclariListele()
    {
        return $this->db->get($this->tablo_adi)->result();
    }

    public function aracBilgileriGetir($id)
    {
        return $this->db->where('arac_id',$id)->get($this->tablo_adi)->row();
    }

    public function aracEkle($arac=array())
    {
        return $this->db->insert($this->tablo_adi,$arac);
        //return ile true veya false bilgisi gönderilmektedir
    }

    //silme işlemi
    public function aracSil($id)
    {
        return $this->db->where('arac_id',$id)->delete($this->tablo_adi);
    }

    //güncelleme işlemi
    public function aracGuncelle($arac=array())
    {
        return $this->db->where('arac_id',$arac['arac_id'])->update($this->tablo_adi,$arac);
    }

    //resim yükleme süreci
    public function UpdateImage($id)
    {
        //update işlemi
        $data = array('resim_var_mi'=>'E');
        $this->db->set($data);
        $this->db->where('arac_id',$id);
        return $this->db->update($this->tablo_adi);
    }

}
?>