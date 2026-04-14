<h1>Employee Info Service : ระบบบริการข้อมูลพนักงาน</h1>

<h2>SAHAKOL EQUIPMENT PCL. (Hongsa)</h2>

การใช้งาน(พัฒนา)
 1. composer install เพื่อทำการติดตั้ง dependency
 2. npm install เพื่อทำการติดตั้ง front-end depenency
 3. สร้างไฟล์ .env โดยอิงจาก .env.example
 4. จากนั้นใส่โค๊ดดังนี้เพิ่มเติมใน env

> DB_SQHS_HOST=
> 
> DB_SQHS_PORT=
> 
> DB_SQHS_USERNAME=
> 
> DB_SQHS_PASSWORD=
> 
>   
> DB_EMP_CONNECTION=empinfo
> 
> DB_HOLI_CONNECTION=empholiday
> 
> DB_EMP_DATABASE=
> 
> DB_HOLI_DATABASE=
> 
>   
> EMP_PIC_HOST  = 
> 
> EMP_PIC_PORT  = 
> 
> EMP_PIC_USER  = a
> 
> EMP_PIC_PASSWORD  =

 5. php artisan key:generate เพื่อทำการสร้าง Application key
 6. php artisan migrate เพื่อทำการ migrate database
 7. php artisan google-fonts:fetch เพื่อทำการดึง fonts
 8. ทำการ run ไฟล์ run-dev.bat เพื่อทำการพัฒนา


