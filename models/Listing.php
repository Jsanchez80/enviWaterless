<?php

require_once __DIR__ . '/Model.php';

class Listing extends Model {

    protected static $table = 'listing';

    // Model contains "INSERT INTO" for the insertion of data into the database. Don't try and mess with it on your own.

    // finds and returns instance of user based on email or username
    public static function findByItem($item_id)
    {

    	self::dbConnect();

    	$query = 'SELECT * FROM ' . self::$table . ' WHERE id = :item_id';

    	$stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':item_id', $item_id, PDO::PARAM_STR);
        $stmt->execute();

        //Store the resultset in a variable named $result
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents

        $instance = null;

        if ( $results )
        {

            $instance = new static;
            $instance->attributes = $results;
        }

        return $instance;
    }

    public static function featuredItems()
{
     // Get connection to the database
  self::dbConnect();
    //Create select statement using prepared statements
  $query = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT 3';
  $stmt = self::$dbc->prepare($query);
  $stmt->execute();
    //Store the resultset in a variable named $result
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // The following code will set the attributes on the calling object based on the result variable's contents
  $instance = null;
  if ( $result )
  {
    $instance = new static;
    $instance->attributes = $result;
  }
  return $instance;
}


    //Need to speak with Cam on why he put this here.
    public function user()
    {
        return User::find($this->user_id);
    }

    public function findItemsByUser($user_id)
    {
        //do query to find all items with the user_id
     }


  /////////////////////////////////////////

    public static function findAllWithUserId($id)
     {
     	self::dbConnect();
           //Create select statement using prepared statements
     	$query = 'SELECT * FROM ' . static::$table . ' WHERE user_id = :id ORDER BY id DESC LIMIT 3';
     	$stmt = self::$dbc->prepare($query);
     	$stmt->bindValue(':id', intval($id), PDO::PARAM_INT);
      ///once userlogin is done change $id to $this->$id
     	$stmt->execute();
           //Store the resultset in a variable named $result
     	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           // The following code will set the attributes on the calling object based on the result variable's contents
     	$instance = null;
     	if ( $result )
     	{
     		$instance = new static;
     		$instance->attributes = $result;
     	}
     	return $instance;
     }


}

?>
