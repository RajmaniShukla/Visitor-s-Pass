# Visitor Pass Management System 🎫

A PHP-based visitor pass generation and management system for security gates. Designed for tracking visitor entries with photo ID and printable passes.

![PHP](https://img.shields.io/badge/PHP-7.0+-777BB4?logo=php&logoColor=white)
![Informix](https://img.shields.io/badge/Informix-DB-005B9A)

## ⚠️ Security Notice

**This application contains hardcoded database credentials in the PHP files.**

Before deploying:
1. Move credentials to a separate config file
2. Never commit credentials to version control
3. Use environment variables in production
4. Implement prepared statements for SQL queries

## ✨ Features

- 🔐 User authentication (login/logout)
- 📝 Visitor registration form
- 📷 Photo ID capture/upload
- 🎫 Printable visitor pass generation
- 📊 Visitor report generation
- 🔢 Auto-generated pass numbers (date-based)

## 📁 Project Structure

```
Visitor-s-Pass/
├── index.php       # Main visitor registration form
├── login.php       # User login page
├── logout.php      # Session logout
├── insert.php      # Database insert handler
├── pass.php        # Pass display/print page
├── report.php      # Visitor reports
├── style/
│   └── mysheet.css # Stylesheet
├── script/
│   └── myscript.js # JavaScript utilities
└── img/            # Uploaded visitor photos
```

## 🚀 Installation

### Requirements
- PHP 7.0+ with PDO extension
- Informix database driver
- Web server (Apache/Nginx)

### Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/RajmaniShukla/Visitor-s-Pass.git
   ```

2. **Create database table:**
   ```sql
   CREATE TABLE visitor (
       pass_no VARCHAR(20) PRIMARY KEY,
       datetime DATETIME,
       p_name VARCHAR(100),
       address VARCHAR(200),
       fm_name VARCHAR(100),
       p_mobile VARCHAR(15),
       id_typ VARCHAR(20),
       id_number VARCHAR(50),
       cr_thn VARCHAR(200),
       sec_vis VARCHAR(100),
       purps VARCHAR(200),
       atdn_ofr VARCHAR(100),
       rmk VARCHAR(200),
       photo_path VARCHAR(255)
   );
   ```

3. **Configure database:**
   Update connection strings in `index.php` and `pass.php`:
   ```php
   $dbh = new PDO("informix:host=YOUR_HOST; ...", "user", "pass");
   ```

4. **Set permissions:**
   ```bash
   chmod 755 img
   chmod 644 *.php
   ```

## 📋 Visitor Pass Fields

| Field | Description | Required |
|-------|-------------|----------|
| Name of Person | Visitor's full name | ✅ |
| Address | Residential address | ✅ |
| Name of Firm | Company/Organization | ❌ |
| Mobile Number | Contact number | ✅ |
| ID Type | AADHAR, PAN, DL, etc. | ✅ |
| ID Number | ID document number | ✅ |
| Items Carrying | Comma-separated list | ❌ |
| Purpose of Visit | Reason for visit | ✅ |
| Visiting Section | Department/Section | ❌ |
| Attending Officer | Host employee name | ❌ |
| Photo | Visitor photograph | ✅ |

## 🖨️ Pass Format

The generated pass includes:
- Auto-generated pass number (YYMMDD + sequence)
- Date and time stamp
- Visitor details
- Photo ID
- In/Out time fields
- Signature spaces
- Return notice

## 🔄 Future Improvements

- [ ] Externalize database credentials
- [ ] Add prepared statements for SQL injection prevention
- [ ] Implement pass expiry system
- [ ] Add barcode/QR code generation
- [ ] Digital signature support
- [ ] SMS notification to host

## 📄 License

Proprietary - Internal Use Only

---

Maintained by [Rajmani Shukla](https://github.com/RajmaniShukla)
