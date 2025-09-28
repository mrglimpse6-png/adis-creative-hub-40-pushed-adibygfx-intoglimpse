# Adil GFX Portfolio Website - PHP/MySQL Version

A complete portfolio website with dynamic backend integration for managing portfolio projects, services, and client communications.

## 🚀 Quick Start

### 1. Database Setup
1. Create a MySQL database named `portfolio_db`
2. Import the database schema from `supabase/migrations/20250927175835_crimson_spark.sql`
3. Update database credentials in `config/database.php`

### 2. File Structure
```
public_html/
├── index.php                 # Homepage (dynamic)
├── portfolio.php            # Portfolio page (dynamic)
├── services.php             # Services page
├── contact.php              # Contact page with form
├── test_connection.php      # Database test script
├── .htaccess               # Apache configuration
├── config/
│   └── database.php        # Database connection
├── classes/
│   └── PortfolioManager.php # Portfolio data management
├── includes/
│   ├── header.php          # Common header
│   └── footer.php          # Common footer
├── backend/
│   └── api/
│       ├── index.php       # API router
│       ├── get_projects.php # Portfolio API endpoint
│       └── forms.php       # Form submission handler
└── assets/
    ├── css/
    │   └── style.css       # Main stylesheet
    └── js/
        └── main.js         # JavaScript functionality
```

### 3. Configuration

#### Database Configuration (`config/database.php`)
Update these values for your hosting environment:
```php
$this->host = 'localhost';        // Your database host
$this->db_name = 'portfolio_db';  // Your database name
$this->username = 'your_user';    // Your database username
$this->password = 'your_pass';    // Your database password
```

#### File Permissions
Ensure these directories have proper permissions:
- `backend/` - 755
- `classes/` - 755
- `config/` - 755
- `assets/` - 755

### 4. Testing

#### Test Database Connection
1. Navigate to `yourdomain.com/test_connection.php`
2. Verify all tests pass
3. Delete `test_connection.php` after testing

#### Test API Endpoints
- Portfolio API: `yourdomain.com/backend/api/get_projects.php`
- Forms API: `yourdomain.com/backend/api/forms.php`

## 🔧 Features

### Dynamic Portfolio System
- **Database Integration**: All portfolio projects loaded from MySQL database
- **Category Filtering**: Dynamic category filtering with URL parameters
- **Image Management**: Proper image handling with fallbacks
- **SEO Optimization**: Dynamic meta tags and structured data

### API Endpoints
- **GET /backend/api/get_projects.php**: Returns portfolio projects with filtering
- **POST /backend/api/forms.php**: Handles form submissions and lead capture

### Frontend Features
- **Responsive Design**: Mobile-first responsive layout
- **Dynamic Content**: Real-time data loading from database
- **Form Handling**: Contact forms with validation and submission
- **Error Handling**: Graceful error handling and user feedback

### Backend Features
- **PortfolioManager Class**: Complete CRUD operations for portfolio
- **Database Abstraction**: PDO-based database operations with error handling
- **Security**: Prepared statements, input validation, XSS protection
- **API Architecture**: RESTful API design with proper HTTP status codes

## 🛠 Troubleshooting

### Common Issues

**Database Connection Errors**
- Verify database credentials in `config/database.php`
- Ensure MySQL service is running
- Check database user permissions

**File Not Found Errors**
- Verify file paths are correct
- Check file permissions (644 for files, 755 for directories)
- Ensure all required files are uploaded

**API Errors**
- Check `.htaccess` rewrite rules are working
- Verify API endpoints are accessible
- Check error logs for detailed error messages

**Portfolio Not Loading**
- Run `test_connection.php` to verify database connection
- Check that portfolio_projects table has data
- Verify PortfolioManager class is loading correctly

### Debug Mode
To enable debug mode, add this to the top of any PHP file:
```php
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

## 📊 Database Schema

### Key Tables
- **portfolio_projects**: Main portfolio data
- **media**: File and image management
- **portfolio_images**: Project image galleries
- **form_submissions**: Contact form data
- **newsletter_subscribers**: Email subscribers

### Sample Data
The database includes sample portfolio projects to demonstrate functionality.

## 🔒 Security Features

- **Input Validation**: All user inputs are validated and sanitized
- **SQL Injection Protection**: Prepared statements used throughout
- **XSS Prevention**: Output escaping with htmlspecialchars()
- **File Security**: .htaccess protection for sensitive files
- **Error Handling**: No sensitive information disclosed in errors

## 📈 Performance

- **Optimized Queries**: Efficient database queries with proper indexing
- **Caching**: Browser caching headers for static assets
- **Compression**: Gzip compression enabled
- **Image Optimization**: Lazy loading and proper image sizing

## 🚀 Deployment

### Production Checklist
1. ✅ Update database credentials
2. ✅ Set proper file permissions
3. ✅ Test all functionality
4. ✅ Remove test files
5. ✅ Enable error logging
6. ✅ Configure SSL certificate

### Hosting Requirements
- **PHP**: 7.4 or higher
- **MySQL**: 5.7 or higher
- **Apache**: mod_rewrite enabled
- **Storage**: 1GB+ recommended

## 📞 Support

For technical support:
1. Check the troubleshooting section above
2. Review error logs for specific issues
3. Verify all requirements are met
4. Test with the provided test scripts

## 📝 License

This portfolio website is proprietary software created for Adil GFX.

---

**Version**: 2.0.0  
**Last Updated**: January 2025  
**Compatibility**: PHP 7.4+, MySQL 5.7+