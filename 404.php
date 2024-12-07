<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Not Found</title>
  <style>
    /* Full Page Styling */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb, #a18cd1, #fad0c4);
      background-size: 400% 400%;
      animation: gradient-bg 10s ease infinite;
      color: #fff;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .container {
      position: relative;
      text-align: center;
      width: 100%;
      height: 100%;
    }

    .stars {
      position: absolute;
      width: 100%;
      height: 100%;
      background: transparent url("https://i.ibb.co/fxNwhDT/stars.png") repeat;
      animation: star-movement 60s linear infinite;
      z-index: 1;
    }

    .planet {
      position: absolute;
      width: 150px;
      height: 150px;
      background: radial-gradient(circle at top, #ffcc33, #ff9900);
      border-radius: 50%;
      bottom: 20%;
      left: 10%;
      box-shadow: 0 0 30px rgba(255, 153, 0, 0.7);
      animation: planet-bounce 8s ease-in-out infinite;
      z-index: 2;
    }

    .central-content {
      position: relative;
      z-index: 3;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 20px;
    }

    .error-text h1 {
      font-size: 120px;
      margin: 0;
      text-shadow: 0 0 10px #fff, 0 0 20px #ffcc33, 0 0 30px #ff9900;
      animation: glow 1.5s ease-in-out infinite;
    }

    .error-text p {
      font-size: 20px;
      margin: 10px 0 20px;
      text-shadow: 0 0 5px #fff;
    }

    .home-button {
      background-color: #ff6f61;
      color: white;
      padding: 12px 30px;
      font-size: 18px;
      text-decoration: none;
      border-radius: 25px;
      transition: background 0.3s ease-in-out, transform 0.2s ease;
    }

    .home-button:hover {
      background-color: #ff3b28;
      transform: scale(1.1);
    }

    .astronaut img {
      width: 120px;
      height: auto;
      animation: float 4s ease-in-out infinite;
      z-index: 3;
    }

    /* Keyframes */
    @keyframes gradient-bg {
      0%, 100% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
    }

    @keyframes star-movement {
      from {
        background-position: 0 0;
      }
      to {
        background-position: -10000px -10000px;
      }
    }

    @keyframes glow {
      0%, 100% {
        text-shadow: 0 0 10px #fff, 0 0 20px #ffcc33, 0 0 30px #ff9900;
      }
      50% {
        text-shadow: 0 0 20px #fff, 0 0 30px #ffcc33, 0 0 40px #ff9900;
      }
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-15px);
      }
    }

    @keyframes planet-bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-30px);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="stars"></div>
    <div class="planet"></div>
    <div class="central-content">
      <div class="error-text">
        <h1>404</h1>
        <p>Oops! You’re lost in a colorful universe.</p>
        <a href="/" class="home-button">Return to Home</a>
      </div>
      <div class="astronaut">
        <img src="https://cdn-icons-png.flaticon.com/512/4832/4832610.png" alt="Astronaut">
      </div>
    </div>
  </div>
</body>
</html>
