<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Spectral:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Spectral', serif;

        }
        .input-underline {
        
            border: none;
            border-bottom: 1px solid #98681C; /* Adjust line color */
            background-color: transparent;
            color: rgb(129, 209, 0); /* Adjust text color */
            padding: 10px 50px; /* Keep the padding */
            margin-top: 0.5rem;
            font-family: 'Spectral', serif;
            width: 100%; /* Make sure it spans the container for proper centering */
            box-sizing: border-box;
            outline: none; /* Remove focus outline */
            text-align: center; /* Center the text within the input */
        }
        .input-underline::placeholder {
            color: #98681C; /* Adjust placeholder color */
            font-family: 'Spectral', serif;
            display: flex; /* Treat the placeholder as a flex container */
            justify-content: center; /* Center the content horizontally */
            align-items: center; /* Center the content vertically (though less relevant here) */
            padding-left: auto; /* Keep left padding */
            padding-right: auto; /* Keep right padding */
        }
        .signup-container {
            background-color: rgba(0, 0, 0, 0.75); /* Your existing background color with some transparency */
            border-radius: 0.5rem; /* Your existing rounded corners */
            padding: 6rem; /* Your existing padding */
            max-width: 28rem; /* Your existing max-width */
            width: 100%; /* Your existing width */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* Your existing shadow */
            border: 2px solid rgba(255, 193, 7, 0.5); /* Your existing border */
            display: flex;
            border-radius: 120px;
            flex-direction: column;  /* Stack items vertically */
            align-items: center;      /* Center horizontally */
            padding-bottom: 6rem;  /* Add padding at the bottom */
            min-height: 400px;  /* Make it taller, adjust as needed */
            box-sizing: border-box;

            /* Add the frame as a background */
            background-image: url('./images/signup-frame.png'); /* Make sure this path is correct */
            background-repeat: no-repeat;
            background-size: 400px auto; /* Or 'cover' depending on how you want it to scale */
            background-position: center;
        }
    </style>
</head>
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('./images/registerbg.jpg');">

    <div class="flex justify-center items-center min-h-screen">
        <div class="signup-container">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-amber-300 font-serif">Sign Up</h2>
                <div class="w-20 h-1 mx-auto bg-amber-300 mt-2 rounded"></div>
            </div>

            @if ($errors->any())
                <div class="bg-red-900/20 text-red-300 p-4 rounded-md mb-4">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <input type="text" id="name" name="name" class="input-underline" placeholder="Full Name" required>
                </div>

                <div>
                    <input type="email" id="email" name="email" class="input-underline" placeholder="Email" required>
                </div>

                <div>
                    <input type="password" id="password" name="password" class="input-underline" placeholder="Password" required>
                </div>

                <div>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input-underline" placeholder="Confirm Password" required>
                </div>

                <button type="submit" class="w-full py-2.5 mt-4 font-bold text-gray-800 bg-amber-300 rounded-md hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 focus:ring-offset-gray-900 font-serif">
                    Register
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-gray-300 font-serif">Already have an account?</p>
                <a href="{{ route('login') }}" class="text-amber-400 hover:underline font-serif">Login</a>
            </div>
        </div>
    </div>

</body>
</html>