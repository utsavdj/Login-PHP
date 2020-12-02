# Login App using PHP
The pages of this app can be opened as url/login_create.php to create a user, url/login_update.php to update user, url/login_delete.php to delete user and url/login_read.php to view a list of users.

This app uses MySQL and its SQL file is in the SQL folder. The db.php file should include the required database settings. The password is encrypted in SHA-512 with salt only when a user is created but, thr password has not been hashed when it is updated so, please encrypt the password if using this project.
