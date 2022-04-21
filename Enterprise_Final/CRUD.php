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
      						array_push($data, array("id_idea"=>$row[0], "title"=>$row[1], "content"=>$row[2], "created_date"=>$row[3], "last_modified_date"=>$row[4] ,"username"=>$row[5],"view"=>$row[7]));
      					}
      					mysqli_close($conn);

      			}
      			Catch (Exception $e)
      			{
      				$this->msg = $e->getMessage();
      			}

      			return $data;
      		}


  public function CreateIdea ($id_idea, $title, $content, $created_date, $last_modified_date, $username, $id_category)
        {
  			    $succcess = -1;
              try {
                 global $connect;
                     $conn = mysqli_connect('localhost', 'root', '', 'webenterprise2');
                         if ( $conn === false ){
                                $this->msg="Unable to connect MySQL Sever.";
                                     return $success;
  				}

              $query = "INSERT INTO idea (id_idea,title,content,created_date,last_modified_date,username,id_category) VALUES ('{$id_idea}','{$title}','{$content}',NOW(),NOW(),'{$username}','{$id_category}')";
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
        						array_push($data, array("id_category"=>$row[0], "name"=>$row[1], "tag"=>$row[2], "description"=>$row[3], "close_date"=>$row[4]));
        					}
        					mysqli_close($conn);

        			}
        			Catch (Exception $e)
        			{
        				$this->msg = $e->getMessage();
        			}

        			return $data;
        		}


    public function CreateCategory ($id_category, $name, $tag, $description, $close_date)
          {
    			    $succcess = -1;
                try {
                   global $connect;
                       $conn = mysqli_connect('localhost', 'root', '', 'webenterprise2');
                           if ( $conn === false ){
                                  $this->msg="Unable to connect MySQL Sever.";
                                       return $success;
    				}
    					$query = "INSERT INTO category (id_category, name, tag, description, close_date) VALUES ('{$id_category}','{$name}','{$tag}','{$description}','{$close_date}')";
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

      class commentCRUD{

        private $msg = "";

        		public function getMsg()
        		{
        			return $this->msg;
            }

        public function ReadComment()
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
                    $idi = $_GET['id_idea'];
            				$query = "SELECT * from comment WHERE id_idea= '$idi'";
            				$result = mysqli_query($conn,$query);
            					while ($row = mysqli_fetch_row($result))
            					{
            						array_push($data, array("id_comment"=>$row[0], "content"=>$row[1], "created_date"=>$row[2], "last_modified_date"=>$row[3],"username"=>$row[4], "id_idea"=>$row[5]));
            					}
            					mysqli_close($conn);

            			}
            			Catch (Exception $e)
            			{
            				$this->msg = $e->getMessage();
            			}

            			return $data;
            		}


        public function CreateComment ($id_comment, $content, $created_date, $last_modified_date, $id_idea)
              {
        			    $succcess = -1;
                    try {
                       global $connect;
                           $conn = mysqli_connect('localhost', 'root', '', 'webenterprise2');
                               if ( $conn === false ){
                                      $this->msg="Unable to connect MySQL Sever.";
                                           return $success;
        				}


        					$query = "INSERT INTO comment (id_comment,content,created_date,last_modified_date,id_idea) VALUES ('{$id_comment}','{$content}',NOW(), NOW(), '{$id_idea}')";
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
