<?php

class Resepti {

    private $reseptiID;
    private $nimi;
    private $kuvaus;
    private $raakaaineluokitus;
    private $kayttotilanneluokitus;
    private $annosmaara;
    private $kuva;
    private $kayttajaID;
    private $virheet = array();

    public function __construct() {
        
    }

    public function setReseptiID($reseptiID) {
        $this->reseptiID = $reseptiID;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function setKuvaus($kuvaus) {
        $this->kuvaus = $kuvaus;
    }

    public function setRaakaaineluokitus($raakaaineluokitus) {
        $this->raakaaineluokitus = $raakaaineluokitus;
    }

    public function setKayttotilanneluokitus($kayttotilanneluokitus) {
        $this->kayttotilanneluokitus = $kayttotilanneluokitus;
    }

    public function setAnnosmaara($annosmaara) {
        $this->annosmaara = $annosmaara;
    }

    public function setKuva($kuva) {
        $this->kuva = $kuva;
    }

    public function setKayttajaID($kayttajaID) {
        $this->kayttajaID = $kayttajaID;
    }

    public function setVirheet($virheet) {
        $this->virheet = $virheet;
    }

    public function getReseptiID() {
        return $this->reseptiID;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getKuvaus() {
        return $this->kuvaus;
    }

    public function getRaakaaineluokitus() {
        return $this->raakaaineluokitus;
    }

    public function getKayttotilanneluokitus() {
        return $this->kayttotilanneluokitus;
    }

    public function getAnnosmaara() {
        return $this->annosmaara;
    }

    public function getKuva() {
        return $this->kuva;
    }

    public function getKayttajaID() {
        return $this->kayttajaID;
    }

    public function getVirheet() {
        return $this->virheet;
    }

    public function onkoKelvollinen() {

        if (trim($this->nimi) == "") {
            $this->virheet["nimi"] = "Nimi ei saa olla tyhjä.";
        } else {
            unset($this->virheet["nimi"]);
        }

        if (!is_numeric($this->annosmaara)) {
            $this->virheet["annosmaara"] = "Annosmäärän tulee olla numero.";
        } elseif ($this->annosmaara <= 0) {
            $this->virheet["annosmaara"] = "Annosmäärän tulee olla positiivinen.";
        } elseif (!preg_match('/^\d+$/', $this->annosmaara)) {
            $this->virheet["annosmaara"] = "Annosmäärän tulee olla kokonaisluku.";
        } else {
            unset($this->virheet["annosmaara"]);
        }

        return empty($this->virheet);
    }

    public static function getReseptitSivulla($sivu, $montako) {
//        reseptin kenttää kuvaus ei listassa tarvita
        $sql = "SELECT reseptiid, nimi, raakaaineluokitus, kayttotilanneluokitus, annosmaara, kayttajaid FROM resepti ORDER BY nimi LIMIT ? OFFSET ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($montako, ($sivu - 1) * $montako));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $resepti = new Resepti();
            $resepti->setReseptiID($tulos->reseptiid);
            $resepti->setNimi($tulos->nimi);
            $resepti->setRaakaaineluokitus($tulos->raakaaineluokitus);
            $resepti->setKayttotilanneluokitus($tulos->kayttotilanneluokitus);
            $resepti->setAnnosmaara($tulos->annosmaara);
            $resepti->setKayttajaID($tulos->kayttajaid);

            $tulokset[] = $resepti;
        }
        return $tulokset;
    }

    public static function haeVaiheet() {
        return Valmistusvaihe::haeVaiheetReseptiIDlla($this->getReseptiID());
    }

    public static function etsiReseptiIDlla($id) {
        $sql = "SELECT reseptiid, nimi, kuvaus, raakaaineluokitus, kayttotilanneluokitus, annosmaara, kuva, kayttajaid FROM resepti where reseptiid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array((int) $id));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            echo "VIRHE. PAINA SELAIMEN BACK-PAINIKETTA.";
            return null;
        } else {
            $resepti = new Resepti();
            $resepti->setReseptiID($tulos->reseptiid);
            $resepti->setNimi($tulos->nimi);
            $resepti->setKuvaus($tulos->kuvaus);
            $resepti->setRaakaaineluokitus($tulos->raakaaineluokitus);
            $resepti->setKayttotilanneluokitus($tulos->kayttotilanneluokitus);
            $resepti->setAnnosmaara($tulos->annosmaara);
            $resepti->setKuva($tulos->kuva);
            $resepti->setKayttajaID($tulos->kayttajaid);
            return $resepti;
        }
    }

    public static function lukumaara() {
        $sql = "SELECT count(*) FROM resepti";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        return $kysely->fetchColumn();
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO resepti (nimi, kuvaus, raakaaineluokitus ,kayttotilanneluokitus, annosmaara, kuva, kayttajaid) VALUES (?,?,?,?,?,?,?) RETURNING reseptiid";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array(htmlspecialchars($this->getNimi()), htmlspecialchars($this->getKuvaus()), htmlspecialchars($this->getRaakaaineluokitus()), htmlspecialchars($this->getKayttotilanneluokitus()), htmlspecialchars($this->getAnnosmaara()), htmlspecialchars($this->getKuva()), htmlspecialchars($this->getKayttajaID())));
        $this->reseptiID = $kysely->fetchColumn();
    }

}

?>
