<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter clone</title>
</head>

<body>
    @include('components.header')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Register</h2>
            </div>
            <div class="card-body">
                <form action="/validate-register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username*</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password*</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="passwordRepeat" class="form-label">Password Repeat*</label>
                        <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat">
                    </div>
                    <div>
                        <p>* - required fields.</p>
                    </div>
                    <div class="mt-4 text-center">
                        <p>Already a MiniTwitter user? <a href="/login" class="link-primary">Login here</a></p>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>