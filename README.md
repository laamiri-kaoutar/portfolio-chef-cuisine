# **Gastronomic Experience Platform**

## **Project Overview**

The project involves developing a website for a world-renowned chef, offering a unique gastronomic experience. Users can explore exclusive menus, book home culinary experiences, and interact with the chef. The platform provides an immersive and sophisticated environment for food lovers to engage with the chef and enjoy personalized culinary experiences.

---

## **Project Objectives**

The primary goal of this project is to create a website with multiple roles for users and chefs, allowing both to engage in the platform in different ways.

### **Website with Multi-Roles:**

- **Users (Clients)**:
    - Explore exclusive menus provided by the chef.
    - Sign up, log in, and book a culinary experience.
  
- **Chefs (Admins)**:
    - Log in to the admin dashboard to manage reservations.
    - Accept, reject, or review reservation requests.
    - View detailed reservation statistics.
    - Manage their profile and settings.

---

## **Main Features**

### **Authentication:**

- **User and Chef Sign-up & Login**:
    - Both users and chefs can sign up and log in to the website.
    - After successful authentication, they are redirected to role-specific pages (User page or Chef Dashboard).

---

### **User Page (Client):**

- **Menu Viewing and Booking**:
    - Users can view the chef’s menus and reserve a culinary experience (choosing date, time, and number of people).
  
- **Reservation Management**:
    - Users can view their reservation history, modify or cancel reservations as needed.

---

### **Chef Page (Dashboard):**

- **Reservation Management**:
    - Chefs can accept or reject reservations based on their availability.
  
- **Reservation Statistics**:
    - **Pending Requests**: View the number of pending reservations.
    - **Approved Requests for the Day**: View the number of reservations approved for the current day.
    - **Approved Requests for Tomorrow**: View the number of reservations approved for the following day.
    - **Next Client Details**: Display details of the next reservation and client.
    - **Registered Clients Count**: See how many clients are registered on the platform.

---

## **Design**

### **Responsive Design**:
- The site is fully responsive, ensuring compatibility with all screen sizes (mobile, tablet, desktop).

### **Aesthetics**:
- A modern and elegant design, with refined colors, to represent the luxury and exclusivity of the chef’s brand.

### **UX/UI**:
- Intuitive and user-friendly interface, providing a smooth navigation experience.

---

## **JavaScript Functionality**

### **Form Validation with Regex**:
- Regular expressions are used to validate user input for fields such as email, phone number, and password.

### **Dynamic Menu Form**:
- Chefs can dynamically add multiple dishes to a menu. Input fields for dishes can be added or removed without reloading the page, making the process more flexible and user-friendly.

### **Dynamic Modals**:
- Use of modals to display information (reservation details, action confirmation, error messages) without reloading the page.

### **SweetAlert Integration**:
- SweetAlert is integrated for elegant and visually appealing alerts for important actions (reservation confirmation, cancellation, etc.).

---

## **Data Security**

### **Password Hashing**:
- Secure password hashing techniques are implemented to ensure password safety and integrity.

### **Protection Against XSS (Cross-Site Scripting)**:
- User inputs are sanitized and escaped to prevent XSS attacks using tools like HTMLPurifier and server-side validation.

### **Prevention of SQL Injections**:
- Prepared statements are used for interacting with the database to prevent SQL injection vulnerabilities.

### **CSRF Protection (Bonus)**:
- A CSRF token is implemented to secure sensitive actions such as reservations, sign-ups, and profile changes.

---

## **Technologies Used**

- **Frontend**: HTML5, CSS3, JavaScript (ES6+), Bootstrap, SweetAlert
- **Backend**: PHP, MySQL
- **Security**: Password Hashing (bcrypt), Prepared Statements, CSRF Tokens

---

## **Installation**

1. Clone the repository to your local machine:
    ```bash
    git clone https://github.com/yourusername/chef-gastronomy-platform.git
    ```

2. Navigate to the project directory:
    ```bash
    cd chef-gastronomy-platform
    ```

3. Set up the database:
    - Create a database in MySQL and import the provided SQL file to create the necessary tables.

4. Configure your database connection:
    - Edit the `config.php` file with your database credentials.

5. Run the application on your local server.

---

## **Usage**

1. **For Users**: 
    - Sign up and log in to explore menus, book culinary experiences, and manage your reservations.
  
2. **For Chefs**: 
    - Log in to your dashboard to manage reservations, accept/reject bookings, and view detailed reservation statistics.

---

## **Contributions**

Contributions are welcome! If you'd like to contribute to the project, please fork the repository and submit a pull request. 

---

## **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## **Acknowledgments**

- SweetAlert for enhancing user experience with visual alerts.
- Bootstrap for a responsive, modern frontend design.
- PHP and MySQL for backend development and database management.
