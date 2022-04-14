<?php

include ('dbconnect.php');

class categoryCRUD{

  private $msg = "";

  		public function getMsg()
  		{
  			return $this->msg;
      }

  public function ReadCategory()
      		{
      			$data = array();
      			try
      			   {
      				       global $connect;
      				           $conn = mysqli_connect('localhost', 'root', '', 'webenterprise2');
      				               if( $conn === false)
      				                   {
      					                      $this->msg = "Unable to connect MySQL server.";
      					                           return $data;
      				                                 }

      				$query = "SELECT * from category";
      				$result = mysqli_query($conn,$query);
      					while ($row = mysqli_fetch_row($result))
      					{
      						array_push($data, array("id_category"=>$row[0], "name"=>$row[1], "tag"=>$row[2], "description"=>$row[3]));
      					}
      					mysqli_close($conn);

      			}
      			Catch (Exception $e)
      			{
      				$this->msg = $e->getMessage();
      			}

      			return $data;
      		}


  public function CreateCategory ($id_category, $name, $tag, $description)
        {
  			    $succcess = -1;
              try {
                 global $connect;
                     $conn = mysqli_connect('localhost', 'root', '', 'webenterprise2');
                         if ( $conn === false ){
                                $this->msg="Unable to connect MySQL Sever.";
                                     return $success;
  				}
  					$query = "INSERT INTO category (id_category, name, tag, description) VALUES ('{$id_category}','{$name}','{$tag}','{$description}')";
  					$res = mysqli_query($conn,$query);
            $row  = $res->num_rows;
  					$succcess = $row[0];
  					mysqli_close($conn);

  			}Catch(Exception $e) {
  				$this -> msg =$e->getMessage();
  				$succcess= -1;
  			}
  		}
    }

?>
