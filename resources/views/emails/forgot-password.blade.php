<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Hello</h1>
        
        <p>
            Please click the following link to Reset your password
            <a href="{{ env('APP_URL') }}/auth/reset/{{ $user->email }}/{{ $code }}" class="btn btn-lg btn-primary">
                Reset My Account
            </a>
        </p>
    </body>
</html>