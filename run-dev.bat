@echo off
title Laravel Project Runner [N0MAD]
color 0E

:: --- ส่วนเช็ค Windows Terminal (แก้ไข 2>&1 ป้องกันการสร้างไฟล์ 1) ---
where wt >nul 2>&1
if %errorlevel% neq 0 (
    echo [ERROR] Windows Terminal is not installed on this PC.
    echo Opening Microsoft Store for installation...
    timeout /t 3 >nul
    start ms-windows-store://pdp/?ProductId=9N0DX20HK701
    exit
)
:: -------------------------------

:menu
cls
echo ==================================================
echo       LARAVEL ^& VITE RUNNER (By N0MAD)
echo ==================================================
echo.
echo       [1] Start Servers (Laravel ^& Vite)
echo       [2] Open in Chrome (http://127.0.0.1:8000)
echo       [0] Stop All Processes
echo       [3] Exit Program
echo.
echo ==================================================

:: ล้างค่าตัวแปร choice ก่อนรับค่าใหม่ทุกครั้ง
set "choice="
set /p "choice=Select an option: "

:: ตรวจสอบกรณีไม่ป้อนค่า (Empty Input)
if "%choice%"=="" (
    echo.
    echo [!] Please select an option [0-3]
    timeout /t 1 >nul
    goto menu
)

if "%choice%"=="1" goto run_server
if "%choice%"=="2" goto open_chrome
if "%choice%"=="0" goto kill_by_port
if "%choice%"=="3" goto exit_programe

:: กรณีป้อนค่าอื่นๆ ที่ไม่ใช่ 0,1,2,3 ให้กลับไปหน้าเมนู
goto menu

:run_server
echo.
echo Checking for existing processes...
:: ปิดของเก่าก่อนรันใหม่เพื่อป้องกัน Port ชนกัน
taskkill /F /IM php.exe >nul 2>&1
taskkill /F /IM node.exe >nul 2>&1

echo Starting Laravel and Vite in Windows Terminal...
:: ใช้ Windows Terminal เปิด Tabs ใหม่แยกกัน
wt -w 0 nt -d . -p "Command Prompt" cmd /c "title LaravelServer && php artisan serve & exit" ; nt -d . -p "Command Prompt" cmd /c "title ViteServer && npm run dev & exit" ; focus-tab -t 0

echo.
echo [OK] Servers are booting up in background tabs.
timeout /t 2 >nul
goto menu

:open_chrome
echo.

echo Opening in Google Chrome...

:: ค้นหาและปิด Chrome Tab เดิมที่เชื่อมต่อกับ Port 8000 ก่อนเปิดใหม่

for /f "tokens=5" %%a in ('netstat -aon ^| findstr ":8000" ^| findstr "ESTABLISHED"') do (

    tasklist /FI "PID eq %%a" | findstr /I "chrome.exe" >nul && (

        taskkill /F /PID %%a >nul 2>&1

    )

)

timeout /t 1 >nul

:: เปลี่ยนจาก --app เป็นการเปิด start chrome ปกติ

start chrome "http://127.0.0.1:8000/"

goto menu

:kill_by_port
echo.
echo Stopping all processes and cleaning ports...

:: ปิด PHP และ Node
taskkill /F /T /IM php.exe >nul 2>&1
taskkill /F /T /IM node.exe >nul 2>&1

:: เคลียร์พอร์ตที่ค้างอยู่ (8000 และ 5173)
for /f "tokens=5" %%a in ('netstat -aon ^| find ":8000" ^| find "LISTENING"') do taskkill /F /T /PID %%a >nul 2>&1
for /f "tokens=5" %%a in ('netstat -aon ^| find ":5173" ^| find "LISTENING"') do taskkill /F /T /PID %%a >nul 2>&1

echo.
echo [OK] All systems stopped.
timeout /t 2 >nul
goto menu

:exit_programe
echo.
echo Exiting...
timeout /t 1 >nul
exit