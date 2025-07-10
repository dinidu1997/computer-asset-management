# Computer Asset Management System

## Overview
The Computer Asset Management System is a comprehensive web application designed to manage and track computer assets within an organization. It provides detailed tracking of hardware specifications, invoice data, warranty details, and automated reporting features for various departments. The application features a user-friendly dashboard built with Bootstrap for visual appeal, dynamic updates for computer status and locations, and a centralized search function for easy access to computer details.

## Features
- **Dashboard**: A central hub displaying key metrics and summaries of computer assets, including counts and status summaries.
- **Asset Management**: Create, read, update, and delete (CRUD) operations for managing computer assets, including detailed specifications.
- **Invoice Management**: Generate and manage invoices related to computer assets, with detailed views for each invoice.
- **Warranty Tracking**: Keep track of warranty information for each asset, including warranty periods and details.
- **Automated Reporting**: Generate reports based on asset data, including department-wise and summary reports.
- **Centralized Seadfsdfsrch**: A search functionality to find computer details based on various criteria.

## Project Structure
```
computer-asset-management
├── config
│   ├── constants.php
│   ├── database.php
│   └── functions.php
├── controllers
│   ├── DashboardController.php
│   ├── AssetController.php
│   ├── InvoiceController.php
│   ├── WarrantyController.php
│   ├── ReportController.php
│   └── SearchController.php
├── models
│   ├── Asset.php
│   ├── Invoice.php
│   ├── Warranty.php
│   ├── Department.php
│   └── User.php
├── views
│   ├── dashboard
│   │   └── index.php
│   ├── asset
│   │   ├── list.php
│   │   ├── detail.php
│   │   ├── edit.php
│   │   └── create.php
│   ├── invoice
│   │   ├── list.php
│   │   └── detail.php
│   ├── warranty
│   │   ├── list.php
│   │   └── detail.php
│   ├── report
│   │   ├── department.php
│   │   └── summary.php
│   ├── search
│   │   └── index.php
│   └── errors
│       ├── 403.php
│       ├── 404.php
│       └── 500.php
├── public
│   ├── assets
│   │   ├── css
│   │   │   └── style.css
│   │   ├── js
│   │   │   └── main.js
│   │   └── vendor
│   │       └── bootstrap
│   │           └── (Bootstrap files)
│   └── index.php
├── routes
│   └── web.php
├── sql
│   └── schema.sql
├── .gitignore
├── composer.json
└── README.md
```

## Installation
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Set up the database using the provided `sql/schema.sql` file.
4. Configure the database connection settings in `config/database.php`.
5. Install dependencies using Composer:
   ```
   composer install
   ```
6. Start a local server and access the application through your web browser.

## Usage
- Access the dashboard to view an overview of computer assets.
- Use the asset management features to add, edit, or delete assets.
- Generate and view invoices related to assets.
- Track warranty information for each asset.
- Generate reports for departmental asset management.
- Utilize the search function to quickly find asset details.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for more details.