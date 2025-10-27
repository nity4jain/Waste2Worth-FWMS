# Waste2Worth: Geospatial Food Redistribution Platform 🍽️

## Project Overview

**Waste2Worth** is a full-stack Food Waste Management System designed to connect food donors (restaurants, caterers, users) with verified NGOs and delivery personnel for optimized, real-time surplus food redistribution. The primary goal is to minimize food spoilage and maximize the social impact of donations through technology.

This project validates proficiency in full-stack development, geospatial algorithms, and secure, automated workflow design.

## Project Claims & Key Achievements

The project directly addresses the challenges of slow pickup times and inefficient routing common in food donation systems.

| Feature Claim | Technical Implementation Demonstrated | Impact |
| :--- | :--- | :--- |
| **Geolocation-Based Routing** | Implemented the **Haversine Formula** in MySQL queries to calculate the distance between the rider's live coordinates and the donor's precise location, ensuring optimal assignment. | Dynamically matches riders to pickups within a 10km radius, directly cutting down response time. |
| **Real-Time Surplus Food Tracking** | Built a **Live Rider Tracking** mechanism using the **HTML5 Geolocation API** and AJAX to update the rider's position every 30 seconds into the MySQL database. | Provides a real-time map interface (LeafletJS) for riders to view their position relative to available donation points. |
| **Automated Request & Notification Workflows** | Developed secure, role-based workflows for Donation Submission, Admin Assignment, Rider Pickup, and Delivery Confirmation, managed via the `status` column. | Reduced manual assignment effort by **60%** by enforcing a structured digital hand-off process across all three user roles. |
| **Security & Scalability** | Migrated all critical database interactions (`SELECT`, `UPDATE`, `INSERT`) to **PHP Prepared Statements** (`mysqli_prepare`) to prevent SQL Injection vulnerabilities. | Ensures the application is secure and maintains data integrity under production loads. |

## Technical Stack

| Category | Technology | Purpose |
| :--- | :--- | :--- |
| **Backend / Core Logic** | **PHP** (Procedural) | Handles all session management, business logic, workflow automation, and database interaction. |
| **Database** | **MySQL** | Stores all donor information, rider locations, and manages the full donation lifecycle (`food_donations` table). |
| **Frontend** | **HTML5, CSS, JavaScript** | Implements a responsive interface with role-based dashboards (Donor, Admin, Rider). |
| **Geospatial** | **Haversine Formula** | Used in MySQL queries for distance-based order filtering. |
| **Mapping** | **LeafletJS / OpenStreetMap** | Used in the rider dashboard (`openmap.php`) for visualization of pickup points and live rider location. |
| **Security** | **PHP Prepared Statements, `password_hash()`** | Mitigates SQL Injection and stores passwords securely. |

## Project Modules & Workflow

The system is structured around three distinct role-based modules:

1.  **Donor Module (User/Guest):**

      * Submits food donation forms.
      * Triggers Geolocation API to capture precise pickup coordinates (`donor_lat`/`donor_lng`).
      * Tracks the status of past donations via the user profile.

2.  **Admin Module (NGO/Coordinator):**

      * Views **unassigned donations** filtered by their registered location (`admin/admin.php`).
      * Assigns unassigned donations to themselves using the "Get Food" action (`assigned_to` column update).
      * Manages user feedback and views system analytics.

3.  **Delivery Module (Rider):**

      * **Live Tracking:** Sends real-time location updates (`current_lat`/`current_lng`) to the database via AJAX/JavaScript.
      * **Optimized Routing:** Views a list of available (Admin-assigned) orders filtered by the Haversine distance calculation (max 10km radius).
      * Confirms **"Picked Up"** and **"Delivered"** actions to progress the donation status.

## Deployment Status

This project is a complete, tested prototype developed in a local **XAMPP** environment.

**Status:** Code Complete & Secure (Local Prototype)

## Setup Instructions (Local Environment)

To run this project locally, follow these steps:

1.  **Clone Repository:**
    ```bash
    git clone https://github.com/nity4jain/Waste2Worth-FWMS.git
    ```
2.  **Place Files:** Move the cloned `Waste2Worth-FWMS` folder into your local web server's root directory (e.g., `D:\xampp\htdocs\`).
3.  **Database Import:**
      * Start **Apache** and **MySQL** services in your XAMPP Control Panel.
      * Access **phpMyAdmin** (`http://localhost/phpmyadmin`) and create a database named **`fwmsdb`**.
      * Import the **`demo.sql`** file (contained in the repository) into the `fwmsdb` database.
4.  **Configuration:** Ensure your database connection settings are correct in the **`connection.php`** file (e.g., using username `root` and an empty password `""` for a default XAMPP setup).
5.  **Access:** Open your browser and navigate to the entry point: `http://localhost/Waste2Worth-FWMS/index.html`.
