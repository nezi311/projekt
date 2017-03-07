<?php
	namespace Models;
	use \PDO;
	class Grafik extends Model
  {
		//model zwraca tablicę wszystkich kategorii
		public function getAll()
    {
            $data = array();
            if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $autorzy = array();
                    $stmt = $this->pdo->query("SELECT elementharmonogramu.id, pracownicy.imie,pracownicy.nazwisko, dzien, tytul, dostepnyod, dostepnydo, rozpoczeciepracy, zakonczeniepracy, czaspracy, obecny FROM elementharmonogramu
INNER JOIN pracownicy ON elementharmonogramu.idpracownik=pracownicy.id
ORDER BY  elementharmonogramu.dzien ASC,elementharmonogramu.rozpoczeciepracy");
                    $grafik = $stmt->fetchAll();
                    $stmt->closeCursor();
                    if($grafik && !empty($grafik))
                        $data['grafik'] = $grafik;
                    else
                        $data['grafik'] = array();
                }
                catch(\PDOException $e)
                {
                    $data['error'] = 'Błąd odczytu danych z bazy! ';
                }
            return $data;
		}
		//model zwraca wybraną kategorię
		public function getOne($id)
    {
            $data = array();
            if($id === NULL)
                $data['error'] = 'Nieokreślone id!';
            else if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $stmt = $this->pdo->prepare('SELECT * FROM elementharmonogramu
                                               INNER JOIN harmonogram ON elementharmonogramu.idmiesiac=harmonogram.id
                                               INNER JOIN pracownicy ON elementharmonogramu.idpracownik=pracownicy.id
                                               WHERE `id`=:id');
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                    $result = $stmt->execute();
                    $grafik = $stmt->fetchAll();
                    $stmt->closeCursor();
                    //czy istnieje kategoria o padanym id
                    if($result && $grafik && !empty($grafik)){
                        $data['grafik'] = $grafik[0];
                    }
                    else
                    {
                        //$data['category'] = array();
                        $data['error'] = "Brak autora o id=$id!";
                    }

                }
                catch(\PDOException $e)
                {
                     $data['error'] = 'Błąd odczytu danych z bazy!';
                }
            return $data;
		}
		//model usuwa wybraną kategorię
		public function delete($id)
    {
            $data = array();
            if($id === NULL)
                $data['error'] = 'Nieokreślone id!';
            else if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $stmt = $this->pdo->prepare('DELETE FROM `elementharmonogramu` WHERE `id`=:id');
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                    $result = $stmt->execute();
                    $rows = $stmt->rowCount();
                    $stmt->closeCursor();
                    if(!$result && $rows <= 0)
                    $data['error'] = "Nie znaleziono autora o id = $id!";
                }
                catch(\PDOException $e)
                {
                     $data['error'] = 'Błąd odczytu danych z bazy!';
                }
            return $data;
		}
		//model dodaje wybraną kategorię

		public function insert($idPracownik,$dzien,$tytul,$dostepnyod,$dostepnydo)
    {
            $data = array();
            if($idPracownik === NULL || $idPracownik === "")
                    $data['error'] =$data['error'].'<br> Nieokreślony pracownik!';
                    if($dzien === NULL || $dzien === "")
                            $data['error'] =$data['error'].'<br> Nieokreślony dzień!';
                            if($tytul === NULL || $tytul === "")
                                    $data['error'] =$data['error'].'<br> Nieokreślony tytuł!';
                                    if($dostepnyod === NULL || $dostepnyod === "")
                                            $data['error'] =$data['error'].'<br> Nieokreślony początek pracy!';
                                            if($dostepnydo === NULL || $dostepnydo === "")
                                                    $data['error'] =$data['error'].'<br> Nieokreślony koniec pracy!';
						else if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {

                    $stmt = $this->pdo->prepare('INSERT INTO `elementharmonogramu` (`idpracownik`,`dzien`,`tytul`,`dostepnyod`,`dostepnydo`) VALUES (:idpracownik,:dzien,:tytul,:dostepnyod,:dostepnydo)');
                    $stmt->bindValue(':idpracownik', $idPracownik, PDO::PARAM_INT);
										$stmt->bindValue(':dzien', $dzien, PDO::PARAM_STR);
										$stmt->bindValue(':tytul', $tytul, PDO::PARAM_STR);
										$stmt->bindValue(':dostepnyod', $dostepnyod, PDO::PARAM_STR);
										$stmt->bindValue(':dostepnydo', $dostepnydo, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->closeCursor();
                }
                catch(\PDOException $e)
                {
                     $data['error'] =$data['error'].'<br> Błąd zapisu danych do bazy!';
                }
            return $data;
		}
	}
?>
