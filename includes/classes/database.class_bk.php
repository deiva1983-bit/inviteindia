<?php
//-------------------------------------------------------------------------------------------------------------------
// file name   : database.class.php
// description : Handles database related tasks
// Class Name  : database
//
// copyright(c), Inside Right, 2008-2009, all rights reserved.
//
// author: DotCom Infoway
// last update: 30-01-2009
// -------------------------------------------------------------------------------------------------------------------

class database {

	
	public $mysqli = 0; //  database connection
	protected $recordsSelected = 0;
	protected $recordsUpdated = 0;
	protected $databaseResults = Array();
	
	
	var $connected = false;
	var $queried = false;
	
	var $results = array();
	var $rescount = 1;
	
	var $insertIDs = array();
	
	var $fmtDate = "'Y-m-d'";
	
	var $dbuser, $dbpass, $dbname, $dbhost;
	var $socket;
	
	var $queries;

  // ---------------------------------------------------------------------------------------------------------------
  // function: database ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			assgin db connect varible to class
  // arguments:		    $dbuser, $dbpass, $dbname, $dbhost='localhost'
  // returns/assigns:	none
  // ---------------------------------------------------------------------------------------------------------------


	function database( $dbuser, $dbpass, $dbhost='localhost' ) {
		
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = "invitein_inviteall";
		$this->dbhost = $dbhost;error_reporting(1);
		
	}
  
  // ---------------------------------------------------------------------------------------------------------------
  // function: connect ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			check the connection
  // arguments:         None
  // returns/assigns:	Success: connected true
  // ---------------------------------------------------------------------------------------------------------------

	function connect() {
		//echo "Host:$this->dbhost User:$this->dbuser Pass: $this->dbpass DB: $this->dbname";
		
		$this->socket = mysqli_connect( $this->dbhost, $this->dbuser, $this->dbpass, $this->dbname );
		if (!$this->socket) {
			$this->error( "Error connecting to database server: " . mysqli_connect_error(), true );
		}
		mysqli_set_charset($this->socket, 'utf8');
		if( !$this->socket )
			$this->error( "Error connecting to database server", true );
		
		
		$this->connected = true;
		
	}

  // ---------------------------------------------------------------------------------------------------------------
  // function: closedb ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			close the connection
  // arguments:         None
  // returns/assigns:	Success: connected true
  // ---------------------------------------------------------------------------------------------------------------

	function closedb(){
		if($this->socket)
			
			mysqli_close($this->socket);
			$this->socket = null;
			$this->connected = false;
	}

   // ---------------------------------------------------------------------------------------------------------------
  // function: DBDate ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:		fetch date 
  // arguments:         $d
  // returns/assigns:	Success: date
  // ---------------------------------------------------------------------------------------------------------------

	function DBDate($d)
	{
		// note that we are limited to 1970 to 2038
		return date($this->fmtDate,$d);
	}

  // ---------------------------------------------------------------------------------------------------------------
  // function: error ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			show the error 
  // arguments:         $text, $fatal
  // returns/assigns:	none
  // ---------------------------------------------------------------------------------------------------------------

	function error( $text, $fatal = false ) {
		
		echo "<p><b>PCIS_SQL:</b> $text</p>\n";
		
		if( $fatal )
			exit;
	
	}

  // ---------------------------------------------------------------------------------------------------------------
  // function: lastInsertId ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			get the last intserted id
  // arguments:         None
  // returns/assigns:	Success: insert id
  // ---------------------------------------------------------------------------------------------------------------

	function lastInsertId() 
	{
		  
		return $this->socket->insert_id;
		  
	}

  // ---------------------------------------------------------------------------------------------------------------
  // function: query ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			execute the query
  // arguments:         $sql
  // returns/assigns:	Success: array data
  // ---------------------------------------------------------------------------------------------------------------

	function query( $sql ) {
		
		$this->queries[] = $sql;
		
		if( !$this->connected ) 
			$this->connect();
		
		$result = $this->socket->query( $sql);
		
		if( !$result || $this->socket->errno ) {
			
			$this->error( $sql."Error querying database: ". $this->socket->error);
			return false;
		
		} else {
		
			$nr = $this->rescount;
			$this->results[$nr] = $result;
			$this->insertIDs[$nr] = $this->socket->insert_id;
			
			$this->rescount += 1;
			
			$this->queried = true;
			return( $nr );
		
		}
	
	}

   // ---------------------------------------------------------------------------------------------------------------
  // function: escape  ( gaaaa )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			execute the query
  // arguments:         $sql
  // returns/assigns:	Success: array data
  // ---------------------------------------------------------------------------------------------------------------

	function escape( $val ) {

		if( !$this->connected )
			$this->connect();

        return $this->socket->real_escape_string($val);

	}

  // ---------------------------------------------------------------------------------------------------------------
  // function: getArray ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			get the array of data from query result
  // arguments:         $rID
  // returns/assigns:	Success: array of data
  // ---------------------------------------------------------------------------------------------------------------
	
  function getArray( $rID ) {
		
		if( !$this->queried ) {
			$this->error( "Database hasn't been queried yet" );
			return false;
		}
		$ret = array();
		while( $thing = mysqli_fetch_assoc( $this->results[ $rID ] ) )
			$ret[] = $thing;
			
		return $ret;
		
	}

  // ---------------------------------------------------------------------------------------------------------------
  // function: getOne ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			fetch one data from query result
  // arguments:         $rID
  // returns/assigns:	Success: array data
  // ---------------------------------------------------------------------------------------------------------------

	function getOne( $rID ) {
		
		if( !$this->queried ) {
			$this->error( "Database hasn't been queried yet" );
			return false;
		}

		$thing = mysqli_fetch_assoc( $this->results[ $rID ] );
		
		return $thing;
		
	}

  // ---------------------------------------------------------------------------------------------------------------
  // function: getArrayFromSQL ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			get the array of data from table
  // arguments:         $sql
  // returns/assigns:	Success: arra data
  // ---------------------------------------------------------------------------------------------------------------

	function getArrayFromSQL( $sql ) {
		if($resID = $this->query( $sql ))
			return $this->getArray( $resID );
		else
			return array();
	
	}

   // ---------------------------------------------------------------------------------------------------------------
  // function: getOneFromSQL ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			get the one row data from table
  // arguments:         $sql
  // returns/assigns:	Success: array of data
  // ---------------------------------------------------------------------------------------------------------------

	function getOneFromSQL( $sql ) {

		if( $resID = $this->query( $sql ) )
					return $this->getOne( $resID );
		else
			return false;
		
	}
	
  // ---------------------------------------------------------------------------------------------------------------
  // function: querySelect ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			fetch the array of data from table
  // arguments:         $query
  // returns/assigns:	Success: array of data
  // ---------------------------------------------------------------------------------------------------------------
	
	function querySelect($query) {
		
		if (strlen(trim($query)) < 0 ) {
			trigger_error("Database encountered empty query string in querySelect function",E_USER_ERROR);
			return false;
		}
 
		if( !$this->connected ) 
			$this->connect();
 		if ($result = mysqli_query($this->socket, $query) ) {
			$this->recordsSelected = mysqli_num_rows($result);
			$this->databaseResults = $this->getData($result);
			
		}
		 
		
		return $this->databaseResults;
	}

  // ---------------------------------------------------------------------------------------------------------------
  // function: queryExecute ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			execute the query
  // arguments:         $query
  // returns/assigns:	Success: query result
  // ---------------------------------------------------------------------------------------------------------------

	function queryExecute($query) {
		
		if (strlen(trim($query)) < 0 ) {
			trigger_error("Database encountered empty query string in queryExecute function",E_ERROR);
		}
		if( !$this->connected ) 
			$this->connect();
		
		if(mysqli_query($this->socket, $query) === true) {
			//$this->recordsUpdated = $this->socket->affected_rows;
			return mysqli_insert_id($this->socket);			
		}
		else
		{
		return false;
		}
	}

	function queryExecuteUpdate($query) {
		
		if (strlen(trim($query)) < 0 ) {
			trigger_error("Database encountered empty query string in queryExecute function",E_ERROR);
		}
		if( !$this->connected ) 
			$this->connect();
		
		if(mysqli_query($this->socket, $query) === true) {
			//$this->recordsUpdated = $this->socket->affected_rows;
			return true;			
		}
		else
		{
		return false;
		}
	}
 



 // ---------------------------------------------------------------------------------------------------------------
  // function: querySelect ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			fetch the array of data from table
  // arguments:         $query
  // returns/assigns:	Success: array of data
  // ---------------------------------------------------------------------------------------------------------------
	
	function querySelectAffectedrows($query) {
		
		if (strlen(trim($query)) < 0 ) {
			trigger_error("Database encountered empty query string in querySelect function",E_USER_ERROR);
			return false;
		}
 
		if( !$this->connected ) 
			$this->connect();
 		if ($result = mysqli_query($this->socket, $query) ) {
			$this->recordsSelected = mysqli_num_rows($result);
		
		}
		 
		
		return $this->recordsSelected;
	}
	
	
  // ---------------------------------------------------------------------------------------------------------------
  // function: getData ( -- arguments -- )
  // ---------------------------------------------------------------------------------------------------------------
  // purpose:			fetch the array of data from query result
  // arguments:         $result
  // returns/assigns:	Success: array of data
  // ---------------------------------------------------------------------------------------------------------------
	
	function getData($result) {
		$data = array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			foreach ($row as $key => $value) {
				$data[$i][$key] = stripslashes($value);		
			}
			$i++;
		}
		return $data;
	}

}
?>
