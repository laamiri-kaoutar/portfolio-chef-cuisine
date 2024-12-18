<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        :root {
            --background-color: #f9f9f9;
            --default-color: #212529;
            --heading-color: #37373f;
            --accent-color: #ce1212;
            --surface-color: #ffffff;
            --contrast-color: #ffffff;
            --nav-color: #7f7f90;
            --nav-hover-color: #ce1212;
            --button-hover-color: #c10000;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            color: var(--default-color);
            margin: 0;
            padding: 0;
        }

        header {
            background-color: var(--surface-color);
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 1rem;
        }

        nav ul li a {
            color: var(--nav-color);
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: var(--nav-hover-color);
        }

        .user-reservation {
            padding: 2rem;
            background-color: var(--surface-color);
            margin-top: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .user-reservation h2 {
            color: var(--heading-color);
            text-align: center;
            margin-bottom: 2rem;
        }

        .reservation-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .reservation-card {
            background-color: var(--surface-color);
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            width: 250px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.2s ease-in-out;
        }

        .reservation-card:hover {
            transform: scale(1.05);
        }

        .reservation-card h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .reservation-card p {
            font-size: 0.9rem;
            margin-bottom: 1rem;
            color: #555;
        }

        .reservation-card button {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 0.5rem;
            width: 48%;
            margin-right: 2%;
            transition: background-color 0.3s ease;
        }

        .reservation-card button:hover {
            background-color: var(--button-hover-color);
        }

        .reservation-card button:last-child {
            margin-right: 0;
        }

        .menu-section {
            padding: 2rem;
            background-color: var(--surface-color);
            margin-top: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .menu-section h2 {
            color: var(--heading-color);
            text-align: center;
            margin-bottom: 2rem;
        }

        .menu-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
        }

        .menu-card {
            background-color: var(--surface-color);
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 1rem;
            transition: transform 0.2s ease-in-out;
        }

        .menu-card:hover {
            transform: scale(1.05);
        }

        .menu-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .menu-card h3 {
            font-size: 1.2rem;
            margin-top: 1rem;
        }

        .menu-card ul {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }

        .menu-card ul li {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .menu-card button {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 1rem;
            transition: background-color 0.3s ease;
        }

        .menu-card button:hover {
            background-color: var(--button-hover-color);
        }

        footer {
            background-color: var(--surface-color);
            padding: 1rem;
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Reservations</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- User Reservation Section -->
    <section class="user-reservation">
        <h2>Your Reservations</h2>
        <div class="reservation-cards">
            <!-- Example of multiple reservation cards -->
            <div class="reservation-card">
                <h3>Menu 1</h3>
                <p>Reservation Date: 2024-12-18</p>
                <p>Reservation Time: 19:00</p>
                <div>
                    <button class="modify-btn">Modify</button>
                    <button class="cancel-btn">Cancel</button>
                </div>
            </div>
            <div class="reservation-card">
                <h3>Menu 2</h3>
                <p>Reservation Date: 2024-12-19</p>
                <p>Reservation Time: 20:00</p>
                <div>
                    <button class="modify-btn">Modify</button>
                    <button class="cancel-btn">Cancel</button>
                </div>
            </div>
            <div class="reservation-card">
                <h3>Menu 3</h3>
                <p>Reservation Date: 2024-12-20</p>
                <p>Reservation Time: 18:00</p>
                <div>
                    <button class="modify-btn">Modify</button>
                    <button class="cancel-btn">Cancel</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu-section">
        <h2>Available Menus</h2>
        <div class="menu-cards">
            <!-- Example of multiple menu cards with items -->
            <div class="menu-card">
                <img src="your-image.jpg" alt="Menu 1">
                <h3>Menu 1</h3>
                <ul>
                    <li>Dish 1</li>
                    <li>Dish 2</li>
                    <li>Dish 3</li>
                </ul>
                <button class="reserve-btn">Reserve</button>
            </div>
            <div class="menu-card">
                <img src="your-image.jpg" alt="Menu 2">
                <h3>Menu 2</h3>
                <ul>
                    <li>Dish A</li>
                    <li>Dish B</li>
                    <li>Dish C</li>
                </ul>
                <button class="reserve-btn">Reserve</button>
            </div>
            <div class="menu-card">
                <img src="your-image.jpg" alt="Menu 3">
                <h3>Menu 3</h3>
                <ul>
                    <li>Dish X</li>
                    <li>Dish Y</li>
                    <li>Dish Z</li>
                </ul>
                <button class="reserve-btn">Reserve</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Restaurant</p>
    </footer>

</body>
</html>
