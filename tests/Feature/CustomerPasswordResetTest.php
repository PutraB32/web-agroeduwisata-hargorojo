<?php

use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;

beforeEach(function () {
    $compiledPath = storage_path('framework/testing/views');

    if (! is_dir($compiledPath)) {
        mkdir($compiledPath, 0777, true);
    }

    foreach (glob($compiledPath.DIRECTORY_SEPARATOR.'*') ?: [] as $compiledFile) {
        if (is_file($compiledFile)) {
            @unlink($compiledFile);
        }
    }

    config(['view.compiled' => $compiledPath]);
});

it('menampilkan link lupa password di halaman login customer', function () {
    $loginView = file_get_contents(resource_path('views/customer/login.blade.php'));

    expect($loginView)
        ->toContain('Lupa password?')
        ->toContain("route('customer.password.request')");
});

it('customer bisa membuka halaman lupa password', function () {
    $forgotPasswordView = file_get_contents(resource_path('views/customer/forgot-password.blade.php'));

    expect($forgotPasswordView)
        ->toContain('Lupa Password')
        ->toContain('Email Customer')
        ->toContain("route('customer.password.email')");
});

it('mengirim link reset password customer ke route reset customer', function () {
    Notification::fake();

    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'customer.reset@example.com',
    ]);

    $this->post(route('customer.password.email'), [
        'email' => $customer->email,
    ])->assertSessionHas('status');

    Notification::assertSentTo(
        $customer,
        ResetPasswordNotification::class,
        fn (ResetPasswordNotification $notification) => $notification->resetRouteName === 'customer.password.reset'
    );
});

it('tidak mengirim link reset customer untuk akun admin', function () {
    Notification::fake();

    $admin = User::factory()->create([
        'role' => 'admin',
        'email' => 'admin.reset@example.com',
    ]);

    $this->post(route('customer.password.email'), [
        'email' => $admin->email,
    ])->assertSessionHas('status');

    Notification::assertNothingSent();
});

it('customer bisa mengganti password dari token reset', function () {
    $customer = User::factory()->create([
        'role' => 'customer',
        'email' => 'customer.update@example.com',
        'password' => Hash::make('Password1'),
    ]);

    $token = Password::createToken($customer);

    $this->post(route('customer.password.update'), [
        'token' => $token,
        'email' => $customer->email,
        'password' => 'Password2',
        'password_confirmation' => 'Password2',
    ])
        ->assertRedirect(route('customer.login'))
        ->assertSessionHas('status');

    expect(Hash::check('Password2', $customer->fresh()->password))->toBeTrue();
});

it('akun admin tidak bisa direset melalui route reset customer', function () {
    $admin = User::factory()->create([
        'role' => 'admin',
        'email' => 'admin.customer-route@example.com',
        'password' => Hash::make('Password1'),
    ]);

    $token = Password::createToken($admin);

    $this->post(route('customer.password.update'), [
        'token' => $token,
        'email' => $admin->email,
        'password' => 'Password2',
        'password_confirmation' => 'Password2',
    ])->assertSessionHasErrors('email');

    expect(Hash::check('Password1', $admin->fresh()->password))->toBeTrue();
});
