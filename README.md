# PatientHelp

PatientHelp is a booking or scheduling website for healthcare facilities where patients can easily look into doctors' schedules to place available appointments.

## Prerequisites

- **Git**
  - Click [here](https://git-scm.com/downloads) to visit [git](https://git-scm.com) download page.
- **XAMPP**
  - Click [here](https://www.apachefriends.org/download.html) to visit [XAMPP](https://www.apachefriends.org/index.html) download page.

## Installation

### Running XAMPP and cloning files

Open **XAMPP** and start **Apache** and **MySQL**

![xampp](https://user-images.githubusercontent.com/69461056/107883892-af95b400-6f2c-11eb-8991-cd434cfb4442.png)

Open **cmd** or **Windows Terminal** and navigate to `ROOT DIRECTORY:\xampp\htdocs`

```c
cd C:\xampp\htdocs
```

Run the given code to clone the required files into the local device.

```c
git clone https://github.com/kielhuplo/hospital.git
```

### Initializing the database

Type `http://localhost/phpmyadmin/` on a browser's address bar to view **phpMyAdmin**, an administration tool for MySQL and MariaDB.

![phpmyadmin](https://user-images.githubusercontent.com/69461056/107884701-6f850000-6f31-11eb-85d2-abdab9455537.PNG)

Click **New** on the left-hand side of **phpMyAdmin** and type `patient_care` on the *Database Name* input form. Click **Create** afterwards.

![patient_care](https://user-images.githubusercontent.com/69461056/107884708-7ad82b80-6f31-11eb-8788-83ea5d874f24.PNG)

Select the **Import** tab and click **Choose File**.

Navigate to `ROOT DIRECTORY:\xampp\htdocs\hospital\database` and select `patient_care.sql`. Click **Go** afterwards.

![database](https://user-images.githubusercontent.com/69461056/107884892-3dc06900-6f32-11eb-8a49-9632f9092483.PNG)

Select the **Structure** tab to view the different entities in the `patient_care` database.

![output](https://user-images.githubusercontent.com/69461056/107885006-c17a5580-6f32-11eb-9c4b-279b38439719.PNG)

### Visiting the Patient Help website

Type `http://localhost/hospital/index.html` on a browser's address bar to visit the **Patient Help** website.

![website](https://user-images.githubusercontent.com/69461056/107885109-5d0bc600-6f33-11eb-910f-d5d5e8309d60.PNG)

## Contributors
<a href="https://github.com/kielhuplo">
  <img src="https://github.com/kielhuplo.png?" width="50px" height="50px">
</a>
<a href="https://github.com/ahdurian">
  <img src="https://github.com/ahdurian.png?" width="50px" height="50px">
</a>
<a href="https://github.com/stephanygzamora">
  <img src="https://github.com/stephanygzamora.png?" width="50px" height="50px">
</a>