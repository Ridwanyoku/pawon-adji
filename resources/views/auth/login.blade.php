<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Traditional Food Ecommerce</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Login</h1>
        @if (session('status'))
            <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                @error('email')
                    <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                @error('password')
                    <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: flex; align-items: center;">
                    <input type="checkbox" name="remember" style="margin-right: 5px;"> Remember me
                </label>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: #007bff; text-decoration: none;">Forgot password?</a>
                @endif
                <button type="submit" style="background-color: #007bff; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">Login</button>
            </div>
        </form>
    </div>
</body>
</html>