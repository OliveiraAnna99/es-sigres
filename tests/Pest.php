
function createUserForTesting($permission = null)
{
    $user = User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ]);

    if ($permission) {
        $user->givePermissionTo($permission);
    }

    return $user;
}