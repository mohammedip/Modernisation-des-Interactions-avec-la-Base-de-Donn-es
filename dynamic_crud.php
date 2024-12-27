<?php

class Database {
    private $pdo;

    public function __construct(
        $server = 'localhost',
        $user = 'root',
        $password = '',
        $dbName = 'ultimate_team2'
    ) {
        $dsn = "mysql:host=$server;dbname=$dbName;charset=utf8mb4";
        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function insert($table, $data) {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(array_values($data));
    }

    public function update($table, $data, $where, $params = []) {
        $setClause = implode(',', array_map(fn($key) => "$key = ?", array_keys($data)));

        $sql = "UPDATE $table SET $setClause WHERE $where";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(array_merge(array_values($data), $params));
    }

    public function delete($table, $where, $params = []) {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($params);
    }

    public function select($table, $columns = "*", $where = null, $params = []) {
        $sql = "SELECT $columns FROM $table";
        if ($where) {
            $sql .= " WHERE $where";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function close() {
        $this->pdo = null;
    }
}

$db = new Database();

// add player
$playerData = [
    'nom' => 'reida',
    'id_img' => 64,
    'nationality_id' => 1,
    'club_id' => 21,
    'posiition' => 'ST',
    'rating' => 91,
    'pace' => 80,
    'shooting' => 90,
    'pasing' => 85,
    'dribbling' => 88,
    'defending' => 40,
    'physical' => 76
];
// $db->insert('players', $playerData);

// update player

// $updateData = [
//     'rating' => 92,
//     'pace' => 82
// ];
// $db->update('players', $updateData, 'player_id = ?', [9]);

// delete player

// $db->delete('players', 'player_id = ?', [9]);

// aficher player

$players = $db->select('players', '*');
foreach ($players as $player) {
    print_r($player);
    echo'<br>';
}

// aficher player avec un club specifique

// $clubPlayers = $db->select('players', 'nom, rating,pace', 'player_id = ?', [7]);
// foreach ($clubPlayers as $player) {
//     echo"This is the selected player that you asked for boss : <br>";
//     echo "Nom: {$player['nom']}<br> Rating: {$player['rating']} <br> Pace: {$player['pace']} <br>";
// }

// Fermer la connexion
$db->close();

?>
