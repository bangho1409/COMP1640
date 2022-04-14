<?php

include ('dbconnect.php');

class ideaCRUD{

  private $msg = "";

  		public function getMsg()
  		{
  			return $this->msg;
      }

  public function ReadIdea()
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

      				$query = "SELECT * from idea";
      				$result = mysqli_query($conn,$query);
      					while ($row = mysqli_fetch_row($result))
      					{
      						array_push($data, array("id_idea"=>$row[0], "title"=>$row[1], "content"=>$row[2], "created_date"=>$row[3], "last_modified_date"=>$row[4]));
      					}
      					mysqli_close($conn);

      			}
      			Catch (Exception $e)
      			{
      				$this->msg = $e->getMessage();
      			}

      			return $data;
      		}


  public function CreateIdea ($id_idea, $title, $content, $created_date, $last_modified_date)
        {
  			    $succcess = -1;
              try {
                 global $connect;
                     $conn = mysqli_connect('localhost', 'root', '', 'webenterprise2');
                         if ( $conn === false ){
                                $this->msg="Unable to connect MySQL Sever.";
                                     return $success;
  				}
  					$query = "INSERT INTO idea (id_idea,title,content,created_date,last_modified_date) VALUES ('{$id_idea}','{$title}','{$content}','{$created_date}','{$last_modified_date}')";
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
