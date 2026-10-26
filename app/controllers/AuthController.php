<?php
declare(strict_types=1);

class AuthController
{
    public function __construct(private User $user)
    {
    }

    public function handle(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? 'login';

            if ($action === 'logout') {
                $_SESSION = [];
                session_destroy();
                $this->redirect();
            }

            $username = trim((string) ($_POST['username'] ?? ''));
            $password = (string) ($_POST['password'] ?? '');
            $authenticatedUser = $this->user->authenticate($username, $password);

            if ($authenticatedUser === null) {
                http_response_code(401);
                $error = 'Username atau password salah.';
                require __DIR__ . '/../views/login.php';
                return;
            }

            session_regenerate_id(true);
            $_SESSION['user'] = $authenticatedUser;
            $this->redirect();
        }

        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            require __DIR__ . '/../views/dashboard.php';
            return;
        }

        $error = null;
        require __DIR__ . '/../views/login.php';
    }

    private function redirect(): never
    {
        header('Location: index.php');
        exit;
    }
}
