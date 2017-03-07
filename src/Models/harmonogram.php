<?php
	namespace Models;
	use \PDO;
	class Harmonogram extends Model
	{
    public function getAll()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $autorzy = array();
              $stmt = $this->pdo->query("SELECT * FROM harmonogram");
              $harmonogram = $stmt->fetchAll();
              $stmt->closeCursor();
              if($harmonogram && !empty($harmonogram))
                  $data['harmonogram'] = $harmonogram;
              else
                  $data['harmonogram'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

  }
?>
