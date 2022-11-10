<?php 

class Database 
{
    // private means it can't be access outside
    private $con;

    // Constructor class is a special constructor which will be cdeclared once you make a new instance
    function __construct()
    {
      //when call we declared a variable that automatically connects to the database
      $this->con = $this->connect();
    }

 //--------------------------------  Connect to the Database Function --------------------------------    

    // a function which conencts to the databse ; the once we called at the the constructor 
    private function connect()
    {
        // a string variable for the database host and the database name;
        $string = DBHOST . DBNAME;

        //try is way to catch some error
        try{
            //we first try to make a connection 
            $connection = new PDO($string ,DBUSER,DBPASS,);
            
            //returns the connected varaible to the database 
            return $connection;

        }catch(Exception $e)
        {
            //In case there is an error this will be executed  
            //this gets the error message
            echo $e->getMessage();

            //then we end the process
            die;
        }
        
        return false;
     
    }
    
 //-------------------------------- End Connect to the Database Function  --------------------------------



 //--------------------------------  Database Write Function --------------------------------

    // a function that writes to the databse
    public function write($query, $data_array = []) 
    {
         //establish connection
         $con = $this->connect();
         
         //this prepares the SQL query 
         $statement = $con->prepare($query);
 
         
         //storing the statement execution to a container
         $check = $statement->execute($data_array);

        //  if the statement execution is successful it will return true otherwise false
         if($check)
         {
            return true;
         }

         return false;
  
    } 

 //--------------------------------  Database  Function --------------------------------    

    // a function that reads from the databse
    public function read($query, $data_array = []) 
    {
         //establish connection
         $con = $this->connect();
         
         //this prepares the SQL query 
         $statement = $con->prepare($query);

         //loop that will collect all the value
        //  foreach($data_array as $key => $value);
        //  {
        //     $statement->bindparam(':'.$key,$value);
        //  }
         
         //stroing the statement execution to a container
         $check = $statement->execute($data_array);

        //  if the statement execution is successful it will return true otherwise false
         if($check)
         {
            //fetches the data from the database 
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            //checks if the result is has items in it 
            if(is_array($result) && count($result ) > 0){
                return $result;
            }
            return false;
         }

         return false;
     
    } 


        // a function that reads from the databse to get the user id 
        public function get_user($id) 
        {
             //establish connection
             $con = $this->connect();
             $arr['id']= $id;
             $query = "Select * from users where id = :id limit 1";
             //this prepares the SQL query 
             $statement = $con->prepare($query);
    
 
             $check = $statement->execute($arr);
    
            //  if the statement execution is successful it will return true otherwise false
             if($check)
             {
                //fetches the data from the database 
                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                //checks if the result is has items in it 
                if(is_array($result) && count($result ) > 0){
                    return $result[0];
                }
                return false;
             }
    
             return false;
         
        } 
    

    //this is a function tat will generate an id
    public function generate_id($max ){

       
        $rand = "";
       
        $rand_count = rand(1,$max);

        for ($i=0; $i < $rand_count; $i++)
        {
            // this append the value to our rand container variable
            $r = rand(0,9);
            $rand .= $r;
        }

        return $rand;
}

    
    
    
}

?>