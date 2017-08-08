<?
class MySQL
{
	private $host = "127.0.0.1";
	private $user = "root";
	private $password = "";
	private $database = "farmasis";

	private $connection;

	public $query;
	public $result;
	public $array_result;

	public function __construct()
	{
		$this->connect();
	}

	public function __destruct()
	{
		if($this->connection)
		{
			$this->disconnect();
		}
	}

	private function connect()
	{
		$this->connection = @mysqli_connect($this->host, $this->user, $this->password, $this->database);

		if(!$this->connection)
		{
			die("Erro ao estabeceler conexão com o banco de dados.");
		}
	}

	private function disconnect()
	{
		if($this->connection)
		{
			$disconnect = @mysqli_close($this->connection);

			if(!$disconnect)
			{
				die("Erro ao encerrar conexão com o banco de dados.");
			}
		}
	}

	public function exec_query($query)
	{
		if($this->connection)
		{
			$this->query = $query;
			$this->result = mysqli_query($this->connection, $this->query);

			if($this->result)
			{
				return true;
			}
			else
			{
				die("<b>Erro na execução MySQL:</b> ".$query);
			}
		}
	}

	public function select_query($query)
	{
		if($this->connection)
		{
			$this->query = $query;
			$this->result = mysqli_query($this->connection, $this->query);

			if($this->result)
			{
				$this->array_result = array();
				while($data = mysqli_fetch_assoc($this->result))
				{
					$this->array_result[] = $data;
				}

				return $this->array_result;
			}
			else
			{
				die("<b>Erro na consulta MySQL:</b> ".$query);
			}
		}
	}
}
?>
