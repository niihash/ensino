<?php

namespace Plataforma\Ensino\Database;

use PDO;

class Database
{
	// Variável estática para evitar de instaciar inúmeras vezes a mesma classe
	private static $connection;

	private $debug;
	private $hostname;
	private $user;
	private $password;
	private $database;

	public function __construct()
	{
		$this->debug = false;
		$this->hostname = DB_HOST;
		$this->user = DB_USER;
		$this->password = DB_PASS;
		$this->database = DB_NAME;
	}

	public function getConnection(): PDO | null
	{
		try {
			// Verifica se não existe uma instância dessa classe em uso e cria uma nesse
			if (self::$connection == null) {
				self::$connection = new PDO("mysql:host={$this->hostname};dbname={$this->database};charset=utf8", $this->user, $this->password);
				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				self::$connection->setAttribute(PDO::ATTR_PERSISTENT, true);
			}
			return self::$connection;
		} catch (\PDOException $e) {
			if ($this->debug) {
				echo "<b>Error on getConnection(): <b> {$e->getMessage()} <br>";
			}
			return null;
		}
	}

	public function disconnect(): void
	{
		self::$connection = null;
	}

	public function getLastID(): int
	{
		return $this->getConnection()->lastInsertId();
	}

	public function beginTransaction(): bool
	{
		return $this->getConnection()->beginTransaction();
	}

	public function commit(): bool
	{
		return $this->getConnection()->commit();
	}

	public function rollback(): bool
	{
		return $this->getConnection()->rollBack();
	}

	public function execQueryOneRow($sql, $params = null)
	{
		try {
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->execute($params);
			return $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (\PDOException $e) {
			if ($this->debug) {
				echo "<b>Error on execQueryOneRow():</b> {$e->getMessage()} <br>";
				echo "<br><b>SQL: </b>{$sql}<br>";

				echo "<br><b>Parameters: </b>";
				print_r($params) . "<br>";
			}
			return null;
		}
	}

	public function execQuery($sql, $params = null): array | null
	{
		try {
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->execute($params);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (\PDOException $e) {
			if ($this->debug) {
				echo "<b>Error on execQuery():</b> {$e->getMessage()} <br>";
				echo "<br><b>SQL: </b>{$sql}<br>";

				echo "<br><b>Parameters: </b>";
				print_r($params) . "<br>";
			}
			return null;
		}
	}

	public function execNonQuery($sql, $params = null): bool
	{
		try {
			$stmt = $this->getConnection()->prepare($sql);

			return $stmt->execute($params);
		} catch (\PDOException $e) {
			if ($this->debug) {
				echo "<b>Error on execNonQuery():</b> {$e->getMessage()} <br>";
				echo "<br><b>SQL: </b>{$sql}<br>";

				echo "<br><b>Parameters: </b>";
				print_r($params) . "<br>";
			}
			return false;
		}
	}

	public function numberRows($sql, $params = null): int
	{
		try {
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->execute($params);
			return $stmt->rowCount();
		} catch (\PDOException $e) {
			if ($this->debug) {
				echo "<b>Error on numberRows():</b> {$e->getMessage()} <br>";
				echo "<br><b>SQL: </b>{$sql}<br>";

				echo "<br><b>Parameters: </b>";
				print_r($params) . "<br>";
			}
			return -1;
		}
	}

	public function debugState(): bool
	{
		return $this->debug;
	}
}