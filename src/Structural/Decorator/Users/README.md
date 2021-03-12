This backstory for this example is that the system started with simple users. Over time there was a need to add managers and admins into the mix. Someday in the future we may want to add authors or power users.


* `Account.php` - the base contract (abstract class)
* `User.php` - the initial implementation
* `Manager.php` and `Admin.php` are the decorators