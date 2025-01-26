# Project Setup Guide

This README provides step-by-step instructions to set up Laravel, Vue.js, and Python for your project.
This chatbot was implemented in PyTorch and built using concepts from Natural Language Processing (NLP), combined with deep learning techniques

## Prerequisites

Before you begin, ensure the following are installed on your system:

- PHP (>=8.0) with Composer installed
- Node.js (>=16) with npm or yarn
- Python (>=3.8)
- MySQL, PostgreSQL, or any database of choice

## Laravel Setup

### Clone the Repository:
```bash
git clone <repository_url>
cd <repository_folder>
```

### Install Laravel Dependencies:
```bash
composer install
```

### Environment Configuration:

Copy .env.example to .env:
```bash
cp .env.example .env
```

Update database credentials in the .env file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Generate Application Key:
```bash
php artisan key:generate
```

### Run Migrations:
```bash
php artisan migrate
```

### Start Laravel Development Server:
```bash
php artisan serve
```

The Laravel application will be accessible at http://127.0.0.1:8000.

## Vue.js Setup

### Navigate to the Frontend Folder:
If Vue.js is set up within a Laravel project, navigate to the resources/js directory. Otherwise, navigate to your standalone Vue.js project folder.

### Install Dependencies:
```bash
npm install
```

### Run the Development Server:
```bash
npm run dev
```

### For production, build the assets:
```bash
npm run build
```

### Link Laravel and Vue.js (if in separate folders):
- Use Laravel's API routes to connect the backend to Vue.js
- In Vue, use axios or fetch to call Laravel's API endpoints

## Python Setup

### Create a Virtual Environment (recommended):
```bash
python -m venv venv
source venv/bin/activate  # For Linux/Mac
venv\Scripts\activate     # For Windows
```

### Install Dependencies:

If a requirements.txt file exists:
```bash
pip install -r requirements.txt
```

To install specific libraries:
```bash
pip install flask django numpy pandas  # Replace with required libraries
```

### Run the Python Application:

If using Flask:
```bash
python train.py
python app.py
flask run
```



## Additional Notes
link of the  presentation : https://www.canva.com/design/DAGdRjd4duI/NF2mwMe44u4kaKq9jiwneg/edit?utm_content=DAGdRjd4duI&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton
### Integration:
- Laravel serves as the backend API
- Vue.js acts as the frontend UI framework
- Python can be used for auxiliary tasks such as machine learning, data analysis, or additional APIs

### Ports:
Ensure Laravel, Vue.js, and Python applications run on different ports to avoid conflicts. Update API calls in Vue.js to match Laravel's backend URL.
