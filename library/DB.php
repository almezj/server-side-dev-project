<?php

/*
** @author: Josef Zemlicka
*/

class DBException extends Exception
{
}
class DB
{
	private $db = false;
	private $host;
	private $port;
	private $user;
	private $password;
	private $database;
	private $socket;

	public function __construct($host, $port, $user, $password, $database, $socket = false)
	{
		$this->host = $host;
		$this->port = $port;
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->socket = $socket;
	}

	public function __destruct()
	{
		if ($this->db && is_object($this->db)) {
			mysqli_close($this->db);
		}
	}

	public function check()
	{
		if (!(isset($this->db) && is_object($this->db))) {
			$this->connect();
		}
	}

	public function connect()
	{
		if ($this->db && is_object($this->db)) {
			$this->close();
		}
		if (!$this->db = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->port, $this->socket)) {
			throw new DBException("Could not connect to DB Host: " . mysqli_connect_error());
		}
		$this->query("SET NAMES 'utf8'");
		return true;
	}

	public function close()
	{
		if ($this->db) {
			mysqli_close($this->db);
			$this->db = false;
		}
		return true;
	}

	public function error()
	{
		return @mysqli_error($this->db);
	}

	public function prepare($statement)
	{
		$this->check();
		if (!$ret = @mysqli_prepare($this->db, $statement)) {
			throw new DBException("Error in Prepare statement on db {$this->database}, MySql Error: " . mysqli_error($this->db) . "<br>Statement: $statement<br>");
		}
		return $ret;
	}

	public function execute($res)
	{
		if (!$ret = @mysqli_stmt_execute($res)) {
			throw new DBException("Error in Execute statement on db {$this->database}, MySql Error: " . mysqli_error($this->db));
		}
		return $ret;
	}

	public function query($query)
	{
		$this->check();
		if (!$ret = @mysqli_query($this->db, $query)) {
			throw new DBException("Error in Query on db {$this->database}, MySql Error: " . mysqli_error($this->db) . "<br>Query: $query<br>");
		}
		return $ret;
	}

	public function fetch_row($res)
	{
		return @mysqli_fetch_row($res);
	}

	public function fetch_array($res, $result_type = MYSQLI_BOTH)
	{
		return @mysqli_fetch_array($res, $result_type);
	}

	public function num_rows($res)
	{
		return @mysqli_num_rows($res);
	}
	public function fetch_object($res)
	{
		return @mysqli_fetch_object($res);
	}

	public function affected_rows()
	{
		return @mysqli_affected_rows($this->db);
	}

	public function name($res)
	{
		return @mysqli_name($res);
	}

	public function tablename($res, $row)
	{
		return @mysqli_tablename($res, $row);
	}

	public function has_table($table)
	{
		$this->check();
		return @mysqli_query("desc $table", $this->db);
	}

	public function info()
	{
		return mysqli_info($this->db);
	}
}

?>