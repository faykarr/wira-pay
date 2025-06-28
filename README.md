# Wira Pay - Sistem Pembayaran Siswa SMK Wira Bahari

Wira Pay is a comprehensive payment system designed for SMK Wira Bahari, facilitating efficient management of student payments and financial transactions. The system includes features for viewing payment summaries, exporting data, and managing student information. Associated with [SMK Wira Bahari](https://www.smkwirabahari.sch.id), this application is built using the Laravel framework and provides a user-friendly interface for both administrators.

## Features

- **Payment Summary**: View detailed summaries of student payments.
- **Data Export**: Export payment data in various formats for reporting and analysis.
- **Student Management**: Manage student information and payment records.
- **Responsive Design**: Optimized for both desktop and mobile devices.
- **User-Friendly Interface**: Intuitive navigation and user experience.

## Tech Stack

- **Backend**: PHP with Laravel framework
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL with Laragon
- **Version Control**: Git

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/wira-pay.git
   ```

2. Navigate to the project directory:

   ```bash
   cd wira-pay
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. Set up the environment file:

   ```bash
   cp .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Run migrations:

   ```bash
   php artisan migrate
   ```

7. Start the development server:

   ```bash
   php artisan serve
   ```

8. Access the application at `http://localhost:8000`.

## Usage

- Navigate to the `/siswa` route to manage student payments.
- Use the export functionality to download payment summaries in the desired format.
- Preview payment data before exporting to ensure accuracy.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug reports.

## Screenshots

![Dashboard](https://example.com/screenshot0.png)
![Payment Summary](https://example.com/screenshot1.png)
![Data Export](https://example.com/screenshot2.png)
![Student Management](https://example.com/screenshot3.png)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
