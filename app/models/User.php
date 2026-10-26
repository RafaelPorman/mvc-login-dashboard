<?php
declare(strict_types=1);

class User
{
    private const USERNAME = 'admin';
    private const PASSWORD_HASH = '$2y$10$57khQgdFMus1WYraxQ82pesboRE04981xqZyBSoO96sNu2PgvQBR.';

    public function authenticate(string $username, string $password): ?array
    {
        if ($username !== self::USERNAME || !password_verify($password, self::PASSWORD_HASH)) {
            return null;
        }

        return [
            'username' => self::USERNAME,
            'name' => 'Administrator',
        ];
    }
}
