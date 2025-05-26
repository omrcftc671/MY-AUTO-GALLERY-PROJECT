<?php
    class adminVehicle extends CI_Controller {
        public function index()
        {
            $this->load->model('araclar_model');
            $viewData = new stdClass();
            $viewData->araclar=$this->araclar_model->tumAraclariListele();
            $this->load->view('adminVehicle_index_view',$viewData);
        }

        public function detay($id)
        {
            $this->load->model("araclar_model");
            $view_verileri["arac"]=$this->araclar_model->aracBilgileriGetir($id);
            $this->load->view("adminVehicle_detay_view",$view_verileri);
        }

        public function ekle()
        {  
            $veri["uyari"]=null;
            $this->load->view('adminVehicle_ekle_view',$veri);            
        }

        public function eklePost()
        {
            $this->load->model("araclar_model");
            $arac_bilgisi = array(
                "marka" => $this->input->post("marka_"),
                "model" => $this->input->post("model_"),
                "model_yili" => $this->input->post("model_yili_"),
                "vites" => $this-> input->post("vites_"),
                "yakit" => $this-> input->post("yakit_"),
                "gunluk_fiyat" => $this->input->post("gunluk_fiyat_")
            );

            $result = $this->araclar_model->aracEkle($arac_bilgisi);

            if($result) {
                $veri["uyari"]="Tebrikler, veriler eklendi";
            } else {
                $veri["uyari"]="İşlem esnasında bir hata oluştu";
            }

            $this->load->view("adminVehicle_ekle_view",$veri);
        }

        public function sil($id)
        {
            $this->load->model('araclar_model');
            $result = $this->araclar_model->aracSil($id);
            if($result) {
                //true ise
                redirect(base_url('adminVehicle'));
            }
            else
            {
                //hata varsa
                redirect(base_url('error_page/404'));
            }
        }

        public function guncelle($id)
        {
            $this->load->model('araclar_model');
            $detay['arac']=$this->araclar_model->aracBilgileriGetir($id);
            $detay['uyari']=null;
            $this->load->view('adminVehicle_guncelle_view',$detay);
        }

        public function guncellePost()
        {
            $this->load->model('araclar_model');
            $arac=array(
                'arac_id'=> $this->input->post('arac_id_'),
                'marka'  => $this->input->post('marka_'),
                'model'  => $this->input->post('model_'),
                'model_yili'=>$this->input->post('model_yili_'),
                'vites'  => $this->input->post('vites_'),
                'yakit'  => $this->input->post('yakit_'),
                'gunluk_fiyat'=>$this->input->post('gunluk_fiyat_')
            );
            $result=$this->araclar_model->aracGuncelle($arac);
            if ($result)
            {
                $detay['uyari']="işlem başarılı";
            }
            else
            {
                $detay['uyari']="işlem başarısız";
            }
            $detay['arac']=$this->araclar_model->aracBilgileriGetir($this->input->post('arac_id_'));
            $this->load->view('adminVehicle_guncelle_view',$detay);
        }

        public function UploadImage($id,$res_var_mi)
        {
            $veri['uyari']=null;
            $veri['arac_id']=$id;
            $veri['res_var_mi']=$res_var_mi;
            $this->load->view('AdminVehicle_UploadImage_view',$veri);
        }

        public function UploadImagePost()
        {
            $this->load->model('araclar_model');

            //burada formdaki hidden alan olan arac_id bilgisi alınıyor
            $arac_id = $this->input->post('arac_id_');
            $file=$arac_id.'.jpg';

            //formdaki hidden olan res_var_mi bilgisi alınıyor
            $res_var_mi = $this->input->post('res_var_mi_');
            if($res_var_mi=='E') {
                //dosya siliniyor
                unlink('arac_resimleri/'.$file);
            }

            //dosya özellik uygunluğu kontrol ediliyor
            $config['upload_path']='./arac_resimleri/';
            $config['allowed_types']='jpg|png';
            $config['max_size']=2048;   //2mb
            $config['max_width']=2000;
            $config['max_height']=1600;
            $config['file_name']=$file;

            //dosya yükleme işlemi Codeigniter kütüphanesi
            //tarafından yapılmaktadır
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('resim'))
            {
                $veri['uyari']=$this->upload->display_errors();
            }
            else
            {
                $result=$this->araclar_model->UpdateImage($arac_id);
                $veri['uyari']='dosya yükleme işlemi başarılı';
                $veri['arac_id']=$arac_id;
                $veri['res_var_mi']=$res_var_mi;
            }
            $this->load->view('adminVehicle_UploadImage_view',$veri);
        }
    }
?>