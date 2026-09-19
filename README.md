# 🩸 Blood-DROP — Blood Donation & Management System

**Blood-DROP** is a Laravel-based web application designed to connect blood donors with hospitals and blood banks in Homs City

---

## 🚀 Key Features

### 👤 Dual User Roles & Authentication
* **Donors (Normal Users):**
  * Create and manage personal profiles with blood type (`A+`, `A-`, `B+`, `B-`, `AB+`, `AB-`, `O+`, `O-`).
  * Browse for available donors by blood group.

* **Hospitals:**
  * Dedicated registration and confirmation workflow.
  * Access to the donor database to contact eligible donors.

### 🔍 Donor Directory & Search
* Lists of donors showing contact information, city/address, and current availability status.

---

## 🛠️ Tech Stack

* **Backend Framework:** PHP / Laravel
* **Frontend:** Blade Templates
* **Database:** MySQL
* **Authentication:** Custom Laravel Auth Guard with hashed passwords (`Hash::make`)

---

## 📂 Database Architecture Overview

* **`users`**: Main authentication table for user credentials.
* **`userinfos`**: Donor profiles storing full name, age, mobile number, address, blood group, and linked hospital ID.
* **`hospitals`**: Hospital directory storing location (city/address), mobile, and confirmation status.
* **`announcements`**: Emergency requests broadcasted by hospitals for missing blood types.
* **`donations`**: Logs of completed blood donations, linking donors to hospitals with volume and date tracking.

---
