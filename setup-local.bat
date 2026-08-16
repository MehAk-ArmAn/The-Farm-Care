@echo off
setlocal EnableExtensions
cd /d "%~dp0"

echo ==============================================
echo THE FARM CARE - LARAGON MYSQL LOCAL SETUP
echo ==============================================

echo.
where php >nul 2>nul || (
  echo ERROR: PHP is not available in PATH.
  echo Open Laragon, click Terminal, then run setup-local.bat again.
  pause
  exit /b 1
)
where composer >nul 2>nul || (
  echo ERROR: Composer is not available in PATH.
  echo Install Composer or run this from Laragon Terminal.
  pause
  exit /b 1
)
where mysql >nul 2>nul || (
  echo ERROR: MySQL command is not available in PATH.
  echo Start MySQL in Laragon and run this from Laragon Terminal.
  pause
  exit /b 1
)

echo Checking PHP extensions...
php -m | findstr /I /X "zip" >nul || (
  echo ERROR: PHP ZIP extension is not enabled.
  echo Run: php --ini
  echo Then enable extension=zip in the php.ini reported by PHP.
  echo In Laragon you can also use Menu ^> PHP ^> Extensions ^> zip.
  pause
  exit /b 1
)
php -m | findstr /I /X "mysqli" >nul || (
  echo ERROR: PHP mysqli extension is not enabled.
  pause
  exit /b 1
)
php -m | findstr /I /X "pdo_mysql" >nul || (
  echo ERROR: PHP pdo_mysql extension is not enabled.
  pause
  exit /b 1
)

mysqladmin -u root ping >nul 2>nul || (
  echo ERROR: Laragon MySQL is not running or root login differs from the default.
  echo Start MySQL in Laragon. If root has a password, update .env.example/.env first.
  pause
  exit /b 1
)

if not exist .env copy .env.example .env >nul

rem Laravel requires these writable directories even before Composer package discovery.
if not exist bootstrap\cache mkdir bootstrap\cache
if not exist storage\framework\cache mkdir storage\framework\cache
if not exist storage\framework\cache\data mkdir storage\framework\cache\data
if not exist storage\framework\sessions mkdir storage\framework\sessions
if not exist storage\framework\views mkdir storage\framework\views
if not exist storage\logs mkdir storage\logs

echo Creating MySQL databases if missing...
mysql -u root -e "CREATE DATABASE IF NOT EXISTS thefarmcare CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; CREATE DATABASE IF NOT EXISTS thefarmcare_test CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
if errorlevel 1 (
  echo ERROR: Could not create MySQL database using root with blank password.
  echo Create database 'thefarmcare' manually in Laragon/HeidiSQL and update .env credentials.
  pause
  exit /b 1
)

echo Installing PHP dependencies...
call composer install
if errorlevel 1 (
  echo ERROR: composer install failed.
  pause
  exit /b 1
)

php artisan key:generate --force
if errorlevel 1 pause & exit /b 1

php artisan migrate:fresh --seed --force
if errorlevel 1 (
  echo ERROR: Migration/seed failed. Check MySQL credentials in .env.
  pause
  exit /b 1
)

php artisan storage:link >nul 2>nul
php artisan optimize:clear

echo.
echo ==============================================
echo SETUP COMPLETE
echo Website:  http://127.0.0.1:8000
echo Admin:    http://127.0.0.1:8000/admin
echo Email:    admin@thefarmcare.com
echo Password: FarmCare@2026
echo Database: thefarmcare ^(MySQL / Laragon^)
echo ==============================================
echo IMPORTANT: Change the admin password after first login.
echo Run RUN-THEFARMCARE.bat to start the site.
pause
