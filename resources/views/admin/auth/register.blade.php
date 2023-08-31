<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #f4f4f4;
    }

    h2 {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"], input[type="email"], input[type="password"], input[type="submit"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>

<form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter your name" name="name" id="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_confirmation" id="psw-repeat" required>

    <input type="submit" value="Register">
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="{{ route('login.create') }}">Sign in</a>.</p>
  </div>
</form>

</div>
</body>
</html>
