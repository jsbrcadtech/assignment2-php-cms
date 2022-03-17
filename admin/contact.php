<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM contact
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Contact method has been deleted' );
  
  header( 'Location: contact.php' );
  die();
  
}

$query = 'SELECT *
  FROM contact';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Contacts</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Email</th>
    <th align="left">Phone Number</th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['email']; ?></td>
      <td align="center"><?php echo $record['phone']; ?></td>
      <td align="center"><a href="contact_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="contact.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this contact?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="contact_add.php"><i class="fas fa-plus-square"></i> Add contact</a></p>


<?php

include( 'includes/footer.php' );

?>