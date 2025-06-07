<?php
class DataBase{
    const DB_DEBUG = false;
    public $pdo;
    public function __construct($dataBaseUser, $dataBaseName){
        $this->pdo = null;
        include 'password.php';
        $DataBasePassword = '';

        switch (substr($dataBaseUser, strpos($dataBaseUser, "_") + 1)){
            case 'reader':
                $DataBasePassword = $dbReader;
                break;
            case 'writer':
                $DataBasePassword = $dbWriter;
                break;
        }

        $query = NULL;
        $dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $dataBaseName;

        if(self::DB_DEBUG){
            print '<p>' . $dataBaseUser . '</p>';
            print '<p>' . $DataBasePassword . '</p>';
            print '<p>' . '</p>';
        }

        try{
            $this->pdo = new PDO($dsn, $dataBaseUser, $DataBasePassword);

            if(!$this->pdo){
                if(self::DB_DEBUG) {
                    print PHP_EOL . '<!-- Not Connected -->' . PHP_EOL;
                }
                $this->pdo = 0;
            } else {
                if (self::DB_DEBUG){
                    print PHP_EOL . '<!-- Connected -->' . PHP_EOL;
                }
            }
        } catch(PDOException $e){
            $error_message = $e->getMessage();
            if (self:: DB_DEBUG){
                print '<!-- Error connecting : ' . $error_message . '-->' . PHP_EOL;
            }
        }

        return $this->pdo;
    }

    public function displaySQL($query, $data) {
        $sqlText = $query;
        foreach ($data as $value) {
            $pos = strpos($sqlText, '?');
            if ($pos) {
                $sqlText = substr_replace($sqlText, '"' . $value . '"', $pos, strlen('?'));
            }
        }
        return $sqlText;
    }

    public function delete($query, $values = '') {
        $success = false;

        $statement = $this->pdo->prepare($query);

        if (is_array($values)) {
            $success = $statement->execute($values);
        }

        $statement->closeCursor();

        return $success;
    }


    public function select($query, $values = ''){

    $statement = $this->pdo->prepare($query);

    if(is_array($values)){

      $statement->execute($values);

    } else {
      $statement->execute();

    }
    $recordSet = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement->closeCursor();
    return $recordSet;
  }

    public function lastInsert() {
        $query = 'SELECT LAST_INSERT_ID()';

        $statement = $this->pdo->prepare($query);

        $statement->execute();

        $recordSet = $statement->fetchAll();

        $statement->closeCursor();

        if ($recordSet)
            return $recordSet[0]['LAST_INSERT_ID()'];

        return -1;
    }

    public function insert($query, $values = ''){
        $success = False;
        $statement = $this->pdo->prepare($query);

        if(is_array($values)){
            $success = $statement->execute($values);

        } else {
            $success = $statement->execute();

        }
        return $success;
    }
}
?>
