<?php
	namespace Models;
	use \PDO;
	class Kategoria extends Model {
		//model zwraca tablicę wszystkich kategorii
		public function getAll(){
            $data = array();
            if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $kategorie = array();
                    $stmt = $this->pdo->query('SELECT Kategoria.IdKategoria, NazwaKategorii, COUNT(NazwaTowaru) AS ilosc FROM Kategoria
	LEFT JOIN Towar
    ON Towar.IdKategoria= Kategoria.IdKategoria
GROUP BY NazwaKategorii');
                    $kategorie = $stmt->fetchAll();
                    $stmt->closeCursor();
                    if($kategorie && !empty($kategorie))
                        $data['kategorie'] = $kategorie;
                    else
                        $data['kategorie'] = array();
                }
                catch(\PDOException $e)
                {
                    $data['error'] = 'Błąd odczytu danych z bazy!'. $e->getMessage();
                }
            return $data;
		}

		public function getOne($id){
            $data = array();
            if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $kategorie = array();
                    $stmt = $this->pdo->prepare('SELECT Kategoria.IdKategoria, NazwaKategorii, IdTowar, NazwaTowaru, StanMagazynowyDysponowany, StawkaVat,KodTowaru,Nazwa, Freeze,Cena FROM Kategoria Inner JOIN Towar ON Towar.IdKategoria= Kategoria.IdKategoria inner join JednostkaMiary ON Towar.IdJednostkaMiary=JednostkaMiary.IdJednostkaMiary WHERE Kategoria.IdKategoria=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$result = $stmt->execute();
                    $kategorie = $stmt->fetchAll();
                    $stmt->closeCursor();
										if($kategorie && !empty($kategorie))
                        $data['kategorie'] = $kategorie;
                    else
                        $data['kategorie'] = array();

										$katnazwa = array();
                    $stmt = $this->pdo->prepare('SELECT NazwaKategorii FROM Kategoria WHERE IdKategoria=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$result = $stmt->execute();
                    $katnazwa = $stmt->fetchAll();
                    $stmt->closeCursor();
                    if($katnazwa && !empty($katnazwa))
                        $data['katnazwa'] = $katnazwa;
                    else
                        $data['katnazwa'] = array();

                }
                catch(\PDOException $e)
                {
                    $data['error'] = 'Błąd odczytu danych z bazy!'. $e->getMessage();
                }
            return $data;
		}
		//model usuwa wybraną kategorię
		public function delete($id){
            $data = array();
            if($id === NULL)
                $data['error'] = 'Nieokreślone id!';
            else if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $stmt = $this->pdo->prepare('DELETE FROM `Kategoria` WHERE `IdKategoria`=:id');
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                    $result = $stmt->execute();
                    $rows = $stmt->rowCount();
                    $stmt->closeCursor();
                    if(!$result && $rows <= 0)
                    $data['error'] = "Nie znaleziono kategorii o id = $id!";
                }
                catch(\PDOException $e)
                {
                     $data['error'] = 'Błąd odczytu danych z bazy!';
                }
            return $data;
		}
		//model dodaje wybraną kategorię
		public function insert($name) {
            $data = array();
            if($name === NULL || $name === "")
                $data['error'] = 'Nieokreślona nazwa!';
            else if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $stmt = $this->pdo->prepare('INSERT INTO `Kategoria` (`NazwaKategorii`) VALUES (:name)');
                    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->closeCursor();
                }
                catch(\PDOException $e)
                {
                     $data['error'] = 'Błąd zapisu danych do bazy!';
                }
            return $data;
		}

		public function edit($id, $name) {
            $data = array();
            if($name === NULL || $name === "")
                $data['error'] = 'Nieokreślona nazwa!';
            else if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $stmt = $this->pdo->prepare('UPDATE `Kategoria`
SET `NazwaKategorii`=:name
WHERE `IdKategoria`=:id');
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
										$stmt->bindValue(':name', $name, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->closeCursor();
                }
                catch(\PDOException $e)
                {
                     $data['error'] = 'Błąd zapisu danych do bazy!';
                }
            return $data;
		}
	}
?>
