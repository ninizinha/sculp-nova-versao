## Adicionando o Back-End
Aqui foi feita a classe de conexão com o back end: 
```php
class Database {
    private $connection;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
```
OBS: necessita do composer para variaveis de ambiente!
---
Query de consulta no banco de dados.
```php
$results = [];
if (isset($_GET['query'])) {
  $query = $_GET['query'];
  $stmt = $conn->prepare("SELECT descricao FROM produtos WHERE descricao LIKE ?");
  $stmt->execute(['%' . $query . '%']);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
```
E por último a div com as informações: 
```php
 <div id="results">
    <?php if (isset($results)): ?>
      <?php foreach ($results as $result): ?>
        <p><?php echo htmlspecialchars($result['descricao'], ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
```
