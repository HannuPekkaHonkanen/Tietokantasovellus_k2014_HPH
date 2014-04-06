<?php

class Kayttaja {

    private $kayttajaID;
    private $kayttajatunnus;
    private $salasana;
    private $sahkoposti;

//    public function __construct($kayttajaID, $kayttajatunnus, $salasana, $sahkoposti) {
//        $this->kayttajaID = $kayttajaID;
//        $this->kayttajatunnus = $kayttajatunnus;
//        $this->salasana = $salasana;
//        $this->sahkoposti = $sahkoposti;
//    }

    public function __construct() {
        
    }

    /* Tähän gettereitä ja settereitä */

    public function setKayttajaID($kayttajaID) {
        $this->kayttajaID = $kayttajaID;
    }

    public function setKayttajatunnus($kayttajatunnus) {
        $this->kayttajatunnus = $kayttajatunnus;
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
    }

    public function setSahkoposti($sahkoposti) {
        $this->sahkoposti = $sahkoposti;
    }

    public function getKayttajaID() {
        return $this->kayttajaID;
    }

    public function getKayttajatunnus() {
        return $this->kayttajatunnus;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    public function getSahkoposti() {
        return $this->sahkoposti;
    }

    public static function getKayttajat() {
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM Kayttaja ORDER BY kayttajatunnus";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
//            $kayttaja = new Kayttaja($tulos->kayttajaid, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajaID($tulos->kayttajaid);
            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setSahkoposti($tulos->sahkoposti);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
            //Se vastaa melko suoraan ArrayList:in add-metodia.
            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

    public static function getKayttajatSivulla($sivu, $montako) {
//        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM Kayttaja ORDER BY kayttajatunnus";
//        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM Kayttaja ORDER BY kayttajatunnus LIMIT 6 OFFSET 2";
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti FROM Kayttaja ORDER BY kayttajatunnus LIMIT ? OFFSET ?";
        $kysely = getTietokantayhteys()->prepare($sql);
//        $kysely->execute();
        $kysely->execute(array($montako, ($sivu - 1) * $montako));
//        $xx=6;
//        $yy=2;
//        $kysely->execute(array($xx, $yy));

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
//            $kayttaja = new Kayttaja($tulos->kayttajaid, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajaID($tulos->kayttajaid);
            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setSahkoposti($tulos->sahkoposti);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
            //Se vastaa melko suoraan ArrayList:in add-metodia.
            $tulokset[] = $kayttaja;
        }
        return $tulokset;
    }

    /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */

    public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {
        $sql = "SELECT kayttajaID, kayttajatunnus, salasana, sahkoposti from Kayttaja where kayttajatunnus = ? AND salasana = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja, $salasana));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
//            $kayttaja = new Kayttaja($tulos->kayttajaid, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajaID($tulos->kayttajaid);
            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setSahkoposti($tulos->sahkoposti);
            return $kayttaja;
        }
    }

    public static function etsiKayttajaIDlla($id) {
        $sql = "SELECT kayttajaid, kayttajatunnus, salasana, sahkoposti from Kayttaja where kayttajaid = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            echo "null";
            return null;
        } else {
//            $kayttaja = new Kayttaja($tulos->kayttajaid, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajaID($tulos->kayttajaid);
            $kayttaja->setKayttajatunnus($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setSahkoposti($tulos->sahkoposti);
            return $kayttaja;
        }
    }

    public static function lukumaara() {
        $sql = "SELECT count(*) FROM Kayttaja";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        return $kysely->fetchColumn();
    }

    public function lisaaKantaan() {
        echo 'lk-sfdasdasdasdg';
//echo $this->kayttajatunnus;
//        $sql = "INSERT INTO Kayttaja (kayttajaID, kayttajatunnus, salasana, sahkoposti) VALUES (?,?,?,?)";
        $sql = "INSERT INTO Kayttaja (kayttajatunnus, salasana, sahkoposti) VALUES (?,?,?) RETURNING kayttajaid";
        $kysely = getTietokantayhteys()->prepare($sql);
//        $kysely->execute(array($this->getKayttajaID(),$this->getKayttajatunnus(), $this->getSalasana(), $this->getSahkoposti()));
        $ok = $kysely->execute(array($this->getKayttajatunnus(), $this->getSalasana(), $this->getSahkoposti()));
//        $kysely->execute(array($this->getKayttajatunnus(), $this->getSalasana(), $this->getSahkoposti()));


        echo'ok=';
        echo $ok;
//        echo '  fetchColumn()';
//        echo $kysely->fetchColumn();
        //        $kysely->execute(array(19887,'h2s', 'hh2', 'hhh2'));
//        $sql = "INSERT INTO INSERT INTO Kayttaja (kayttajaID,kayttajatunnus, salasana, sahkoposti) VALUES (1987,'h2', 'hh2', 'hhh2')";
////        $sql = "INSERT INTO INSERT INTO Kayttaja (kayttajaID,kayttajatunnus, salasana, sahkoposti) VALUES (?,?,?,?)";
//////        $sql = "INSERT INTO INSERT INTO Kayttaja (kayttajatunnus, salasana, sahkoposti) VALUES('h','hh','hhh') RETURNING kayttajaID";
//        $kysely = getTietokantayhteys()->prepare($sql);
////
//////        $ok = $kysely->execute(array($this->getKayttajatunnus(), $this->getSalasana(), $this->getSahkoposti()));
//////        $ok = $kysely->execute(array("h", "hh", "hhh"));
//        $kysely->execute();
////        $kysely->execute(array(1987,"h2", "hh2", "hhh2"));
//////        if ($ok) {
//////            //Haetaan RETURNING-määreen palauttama id.
//////            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
        $this->kayttajaID = $kysely->fetchColumn();
//////        }
//////        return $ok;
        echo ' id=';
        echo $this->getKayttajaID();
    }

    public static function lisaaKantaan2() {
        echo 'lk2-sfdasdasdasdg';

        $sql = "INSERT INTO Kayttaja (kayttajaID, kayttajatunnus, salasana, sahkoposti) VALUES ('1103', 'Hannu1003', 'hannu123', 'hannu@hannu')";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

//        $sql = "INSERT INTO INSERT INTO Kayttaja (kayttajatunnus, salasana, sahkoposti) VALUES(?,?,?) RETURNING id";
////        $sql = "INSERT INTO INSERT INTO Kayttaja (kayttajatunnus, salasana, sahkoposti) VALUES('h','hh','hhh') RETURNING id";
//        $kysely = getTietokantayhteys()->prepare($sql);
//
////        $ok = $kysely->execute(array($this->getKayttajatunnus(), $this->getSalasana(), $this->getSahkoposti()));
//        $ok = $kysely->execute(array("h","hh","hhh"));
//        if ($ok) {
//            //Haetaan RETURNING-määreen palauttama id.
//            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
//            $this->kayttajaID = $kysely->fetchColumn();
//        }
//        return $ok;
    }

    public function lisaaKantaan3() {
        echo 'lk3-sfdasdasdasdg';

//        $sql = "INSERT INTO Kayttaja (kayttajaID, kayttajatunnus, salasana, sahkoposti) VALUES ('999', 'Hannu999', 'hannu123', 'hannu@hannu')";
////        $kysely = getTietokantayhteys()->prepare($sql);
////        $kysely->execute();
//        echo 'lk3-sfdasdasdasdg';
//
//        $sql = "INSERT INTO Kayttaja (kayttajaID, kayttajatunnus, salasana, sahkoposti) VALUES ($this->getKayttajaID(), $this->getKayttajatunnus(), $this->getSalasana(), $this->getSahkoposti())";
        $sql = "INSERT INTO Kayttaja (kayttajaID, kayttajatunnus, salasana, sahkoposti) VALUES (?,?,?,?)";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array(11912, 'h19112', 'hh', 'hhh'));

////
        echo 'lk32-sfdasdasdasdg';
//        $kysely->execute($this->getKayttajaID(), $this->getKayttajatunnus(), $this->getSalasana(), $this->getSahkoposti());
////        $ok = $kysely->execute(array("h","hh","hhh"));
////        if ($ok) {
////            //Haetaan RETURNING-määreen palauttama id.
////            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
////            $this->kayttajaID = $kysely->fetchColumn();
////        }
////        return $ok;
    }

    public function muokkaa() {
        $sql = "UPDATE Kayttaja SET kayttajatunnus =?, salasana=?, sahkoposti=? WHERE kayttajaid=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getKayttajatunnus(), $this->getSalasana(), $this->getSahkoposti(), $this->getKayttajaID()));
        echo 'testing face info ';
        echo 'MUOKATUN KÄYTTÄJÄN TUNNUS=';
        echo $this->getKayttajatunnus();
    }

    public function poista() {
        echo 'testing face info ';
        echo 'POISTETETTAVAN KÄYTTÄJÄN TUNNUS=';
        echo $this->getKayttajatunnus();
        $sql = "DELETE FROM Kayttaja WHERE kayttajaid=?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getKayttajaID()));
    }

}