<!-- <?php 

require_once __DIR__ . "/autoload.php";

use App\Models\Users\AdminUser;
use App\Models\Users\RegularUser;
use App\Services\AuthService;
use App\Security\Encryption;


$auth = new AuthService();
$encryption = new Encryption();

$firstAdmin = new AdminUser(
    $encryption,
    "Foo",
    "foo@email.com",
    "cjeA5minword",
    "1" 
); 

$firstUser = new RegularUser(
    $encryption,
    "Barn",
    "Barn@email.com",
    "firstname20000101",
    "1"
);

$attemptFirstAdmin = $auth->Authentication(
    $firstAdmin,
    "foo@email.com",
    "cjeA5minword"
);


$attemptFirstUser = $auth->Authentication(
    $firstUser,
    "Barn@email.com",
    "irstname20000101"
);

echo json_encode([
    "attemptFirstAdmin" => $attemptFirstAdmin,
    "logoutFirstAdmin" => $auth->logout($firstAdmin),
    "attemptFirstUser" => $attemptFirstUser,
    "logoutFirstUser" => $auth->logout($firstUser)
]);

?>
 -->
