<?php
	class Connection
	{
		/**
		* Authetication method
		*
		* @var string
		*/
		private $authentication;
		
		/**
		* Connection id
		*
		* @var Resource
		*/
		private $connectionId;
		
		/**
		* Creates a connection instance.
		*
		* @param  string             $authentication OPTIONAL parameter that could be Windows Authentication or SQL Server Authentication
		*/
		public function __construct($authentication = "Windows Authentication")
		{
			$this->authentication = $authentication;
		}
		
		/**
		* Destroys a connection instance.
		*
		*/
		function __destruct()
		{
			if (function_exists("mssql_close"))
				@mssql_close($this->connectionId);
			else if (function_exists("mssql_close"))
				@sqlsrv_close($this->connectionId);
		}
		
		/**
		* Returns a database object based on the host, user, password, and database
		*
		* @param  string             $server the server's IP address or alias, e.g 'localhost\SQLEXPRESS'
		* @param  string             $user the MSSQL SERVER username
		* @param  string             $password the MSSQL SERVER password
		* @param  string             $database the MSSQL SERVER database/schema
		* @return Resource
		*/
		public function getDatabaseConnection($server, $user, $password, $database)
		{
			if (function_exists("mssql_connect"))
			{
				if (strtoupper(trim($this->authentication)) == "WINDOWS AUTHENTICATION")
					$this->connectionId = mssql_connect($server) or die($this->displayErrorPath());
				else
					$this->connectionId = mssql_connect($server, $user, $password) or die($this->displayErrorPath());
				
				mssql_select_db("[" .$database ."]", $this->connectionId) or die($this->displayErrorPath());
				
				return $this->connectionId;
			}
			
			if (function_exists("sqlsrv_connect"))
			{
				if (strtoupper(trim($this->authentication)) == "WINDOWS AUTHENTICATION")
				{
					$connectionCredentials = array("Database" => $database);
					$this->connectionId = sqlsrv_connect($server, $connectionCredentials) or die($this->displayErrorPath());
				}
				else
				{
					$connectionCredentials = array("UID" => $user, "PWD" => $password, "Database" => $database);
					$this->connectionId = sqlsrv_connect($server, $connectionCredentials) or die($this->displayErrorPath());
				}
				
				return $this->connectionId;
			}
			
			return;
		}
		
		/**
		* Redirects the program to an error page.
		*
		*/
	 	private function displayErrorPath($errorcode)
		{
			header("Location: error.php");
		}
	} /*end of class Connection*/