<!--to include all the headers and footers into our home page, we're gona use the php include() function-->
<!--this is the DRY approach (Don't Repeat Yourself), so that we don't have to rewrite the same code for other pages that
we are gonna create such as when you want to read the table created (to read the table, we need to create a new page for it).
All we have to do is call the header.php and the footer.php so that we'll have the same layouts for all the page we'll create.
-->
<?php include "templates/header.php"; require "../vendor\autoload.php";?>
    
    <ul>
      <li>
        <a href="create.php"><strong>Create</strong></a> - add a user
      </li>
      <li>
        <a href="read.php"><strong>Read</strong></a> - Display the table
      </li>
      <li>
        <a href="search_Copy.php">Search</strong></a> - Find a student
      </li>
      <li>
        <a href="update.php">Update</strong></a> - Update user details 
      </li>
      <li>
        <a href="delete.php">Delete</a> - Delete a user
      </li>
    </ul>
<?php include "templates/footer.php";?>
