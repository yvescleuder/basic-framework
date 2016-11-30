<?php

namespace App\Models;

abstract class Model
{
	/**
	 * Name of Database
	 * @var string
	 */
	private $database_name = 'sistema_de_post';
	/**
	 * IP of MySQL Server
	 * @var string
	 */
	private $server = '127.0.0.1';
	/**
	 * User of Database
	 * @var string
	 */
	private $username = 'root';
	/**
	 * Password of Database
	 * @var string
	 */
	private $password = '';
	/**
	 * Database encoding
	 * @var string
	 */
	private $charset = 'UTF8';
	/**
	 * Port of MySQL Server
	 * @var string
	 */
	private $port = '3306';
	/**
	 * Prefix of Database
	 * @var string
	 */
	private $prefix = '';
	/**
	 * Option PDO of Database
	 * @var array
	 */
	private $option = [
		\PDO::ATTR_CASE => \PDO::CASE_NATURAL,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	];
	private $database;

    /**
     * Model constructor.
     */
    public function __construct()
	{
		try {
			$this->database = new \medoo([
				'database_type' => 'mysql',
				'database_name' => $this->database_name,
				'server' => $this->server,
				'username' => $this->username,
				'password' => $this->password,
				'charset' => $this->charset,
				'port' => $this->port,
				'prefix' => $this->prefix,
				'option' => $this->option
			]);
		} catch(\Exception $e) {
			echo $e->getMessage();
			die;
		}
	}

	/**
	 * Method to access the database
	 * @return \medoo
	 */
	public function database() : \medoo
	{
		return $this->database;
	}
}