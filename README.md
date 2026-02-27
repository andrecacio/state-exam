# School-Work Alternation Management System (PCTO)

A web application built with PHP and MySQL for managing, tracking, and reporting school-work alternation activities (now known as PCTO in Italy). 
This project was developed as a comprehensive thesis for the Italian State Exam, covering the entire software development lifecycle: from database and network infrastructure design to UI implementation and back-end logic.

## 🚀 Key Features

* **Role-Based Access Control (RBAC):** Distinct restricted areas for Students, Teachers (School Tutors), and Company Tutors.
* **Data Dashboard:** Visualization of training progress and logged hours using interactive charts (powered by the *RGraph* library).
* **Privacy Management (GDPR):** Implementation of custom encryption/decryption routines (`cript.php`, `decrypt.php`) to secure sensitive user data within the database.
* **Network Infrastructure:** Design of the corporate and school hardware/network topology (simulation included via Cisco Packet Tracer).
* **Export & Reporting:** Dedicated modules for data import and generation of summary printable reports.

## 🛠️ Tech Stack

* **Back-end:** PHP (Procedural)
* **Database:** MySQL / MariaDB
* **Front-end:** HTML, CSS, JavaScript
* **External Libraries:** RGraph (Data Visualization)
* **Design Software:** Cisco Packet Tracer (Network Topology)

## 📁 Project Structure

The repository is structured as follows:

* `*.php`: Main scripts containing the application's business logic (e.g., `login.php`, `andamento.php`, `corsi.php`, `alunni.php`).
* `css.css`, `css1.css`, `css2.css`: Stylesheets for UI formatting.
* `databaseconn.php`: Configuration script for MySQL database connection.
* `alternanza1.sql`: Database dump containing the table schema and initial data seeding.
* `RGraph/`: Directory containing the JavaScript library used to render statistical charts.
* `Architettura Hardware.pkt`: Cisco Packet Tracer simulation file modeling the network infrastructure between the school, the company, and remote users.

## ⚙️ Local Installation and Setup

To run this project locally, it is recommended to use a pre-configured server environment such as XAMPP, MAMP, or EasyPHP.

1. **Clone the repository** into your web server's root directory (e.g., `htdocs` for XAMPP or `www` for MAMP):
   ```bash
   git clone [https://github.com/your-username/state-exam.git](https://github.com/your-username/state-exam.git)
