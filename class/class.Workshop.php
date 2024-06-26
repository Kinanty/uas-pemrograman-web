<?php
    class Workshop extends Connection{
        private $id_workshop = '';
        private $kategori = '';
        private $nama_workshop = '';
        private $deskripsi = '';
        private $tanggal_pelaksanaan = '';
        private $waktu = '';
        private $tempat_pelaksanaan = '';
        private $provinsi = '';
        
        public $hasil = false;
        public $message = '';

        public function __get($atribute){
            if(property_exists($this, $atribute)){
                return $this->$atribute;
            }
        }
        public function __set($atribut, $value){
            if(property_exists($this, $atribut)){
                $this->$atribut = $value;
            }
        }

        public function AddWorkshop(){
            $sql = "INSERT INTO workshop (id_workshop, kategori, nama_workshop, deskripsi, tanggal_pelaksanaan, waktu, tempat_pelaksanaan, provinsi) VALUES ('$this->id_workshop', '$this->kategori', '$this->nama_workshop', '$this->deskripsi', '$this->tanggal_pelaksanaan', '$this->waktu', '$this->tempat_pelaksanaan', '$this->provinsi')";

            $this->hasil = mysqli_query($this->connection, $sql);
            if($this->hasil){
                $this->message = 'Workshop berhasil ditambahkan!';
            }else{
                $this->message = 'Workshop gagal ditambahkan!';
            }
        }
        public function UpdateWorkshop(){
            $sql = "UPDATE workshop SET kategori = '$this->kategori', nama_workshop = '$this->nama_workshop', deskripsi = '$this->deskripsi', tanggal_pelaksanaan = '$this->tanggal_pelaksanaan', waktu = '$this->waktu', tempat_pelaksanaan = '$this->tempat_pelaksanaan', provinsi = '$this->provinsi' WHERE id_workshop = '$this->id_workshop'";

            $this->hasil = mysqli_query($this->connection, $sql);
            if($this->hasil){
                $this->message = 'Workshop berhasil diubah!';
            }else{
                $this->message = 'Workshop gagal diubah!';
            }
        }
        public function DeleteWorkshop(){
            $sql = "DELETE FROM workshop WHERE id_kategori = '$this->id_kategori'";
            $this->hasil = mysqli_query ($this->connection, $sql);

            if($this->hasil){
                $this->message = 'Workshop berhasil dihapus!';
            }else{
                $this->message = 'Workshop gagal dihapus!';
            }
        }
        public function SelectAllWorkshop(){
            $sql = "SELECT * FROM workshop";
            $result = mysqli_query($this->connection, $sql);
            $arrResult = Array();
            $count = 0;

            if(mysqli_num_rows($result) > 0){
                while ($data = mysqli_fetch_array($result)){
                    $objWorkshop = new Workshop();
                    $objWorkshop->id_workshop=$data['id_workshop'];
                    $objWorkshop->kategori=$data['kategori'];
                    $objWorkshop->nama_workshop=$data['nama_workshop'];
                    $objWorkshop->deskripsi=$data['deskripsi'];
                    $objWorkshop->tanggal_pelaksanaan=$data['tanggal_pelaksanaan'];
                    $objWorkshop->waktu=$data['waktu'];
                    $objWorkshop->tempat_pelaksanaan=$data['tempat_pelaksanaan'];
                    $objWorkshop->provinsi=$data['provinsi'];
                    $arrResult[$count] = $objWorkshop;
                    $count++;
                }
            }
            return $arrResult;
        }
        public function SelectOneWorkshop(){
            $sql = "SELECT * FROM workshop WHERE id_workshop = '$this->id_workshop'";
            $resultOne = mysqli_query($this->connection, $sql);

            if(mysqli_num_rows($resultOne) == 1){
                $this->hasil = true;
                $data = mysqli_fetch_assoc($resultOne);
                $this->id_workshop = $data['id_workshop'];
                $this->kategori = $data['kategori'];
                $this->nama_workshop = $data['nama_workshop'];
                $this->deskripsi = $data['deskripsi'];
                $this->tanggal_pelaksanaan = $data['tanggal_pelaksanaan'];
                $this->waktu = $data['waktu'];
                $this->tempat_pelaksanaan = $data['tempat_pelaksanaan'];
                $this->provinsi = $data['provinsi'];

            }
        }
    }
?>