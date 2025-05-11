<?php declare(strict_types=1);
    class DBHandler {
        // The following attributes are all constants
        // but I have no idea how to handle or declare constants in PHP
        private string $servername;
        private string $username;
        private string $psw;
        private string $dbname;
        private ?PDO $conn;

        /**
         * @throws PDOException if the attempt to init_connect to the database fails
         */
        public function __construct(
            string $servername,
            string $username,
            string $psw,
            string $dbname
        ){
            $this->servername = $servername;
            $this->username = $username;
            $this->psw = $psw;
            $this->dbname = $dbname;

            $this->conn = $this->__setup_db();
        }

        private function __connect_to_db() : ?PDO {
            try {
                $init_conn = new PDO(
                    "mysql:host=$this->servername;dbname=$this->dbname", 
                    $this->username, 
                    $this->psw,
                    array(
                        PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION
                        )    
                    );

                debug("Connected successfully to $this->dbname");
                return $init_conn;
            } catch(PDOException $e) {
                if($e->getCode() == 1049) { // Unknown database exception: means that the database doesn't exist
                    return null;            // therefore I must create it
                } else {
                    throw $e;
                }
            }
        }

        /**
         * @throws PDOException if the attempt to init_connect to the database fails
         */
        private function __create_db() {
            // Setup init_connection;
            $init_conn = new PDO(
                "mysql:host=$this->servername",
                $this->username,
                $this->psw,
                array(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                    )
                );
            $query_createdb = "CREATE DATABASE $this->dbname";
            $init_conn->exec($query_createdb);
            debug("Database: $this->dbname created successfully");
        }

        private function __create_table(PDO $init_conn) {
            $query_createtable = "CREATE TABLE Posts(
                uploadtime timestamp DEFAULT CURRENT_TIMESTAMP,
                author varchar(255),
                bgcolor char(7) NOT NULL,
                brdcolor char(7) NOT NULL,
                fntcolor char(7) NOT NULL,             
                content nvarchar(4000) NOT NULL,
                PRIMARY KEY (author,uploadtime)
            )";
            $init_conn->exec($query_createtable);
            debug("Table created succesfully");
        }
        
        /**
         * @throws PDOException if the attempt to init_connect to the database fails
         */
        private function __setup_db() : PDO {
            $init_conn = $this->__connect_to_db();
            if($init_conn == null){
                $this->__create_db();
                $init_conn = $this->__connect_to_db();
                $this->__create_table($init_conn);
            }
            return $init_conn;
        }

        public function __destruct()
        {
            $this->conn = null;
        }

        public function insert(string $author, string $bgcolor, string $brdcolor, string $fntcolor, string $ctnt) {
            $dbAttributes = "(author, bgcolor, brdcolor, fntcolor, content)";
            $query_insert = sprintf("
                INSERT INTO Posts %s
                VALUES ('%s', '%s', '%s', '%s', '%s')
            ", $dbAttributes,
            $author, $bgcolor, $brdcolor, $fntcolor, $ctnt);

            $this->conn->exec($query_insert);
            debug("New records created successfully");
        }
    }
    

    function debug(string $msg) {
        echo "<script>console.log('$msg');</script>";
    }
?>