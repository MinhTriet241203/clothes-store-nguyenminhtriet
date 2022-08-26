# Assignment
 Assignment

Assignment WebG301 made by the Group Triet&Friends.
Class teacher is Mr.Phan Minh Tam.
University of Greenwich.

How to use this project:

1. Clone repo

2. Copy database.sql then execute in personal mysql manager to create the correct database for the project.

3. Add own custom .env file, the bottom of that file must include own google client id and google client secrets.
![image](https://user-images.githubusercontent.com/111043449/186804354-52ea8d1e-13c0-48a4-ab36-b38737f7265b.png)

4. Make sure to have the GD library enabled in personal hosting devices, for XAMPP as i used we do as follows:
- go in to the php.ini in apache from XAMPP control panel.
![image](https://user-images.githubusercontent.com/111043449/186804926-50a9cf84-b995-4f2c-8a4d-51f9527d9e6c.png)
- search for 'gd' and remove the ';' infront of the line.                                               
![image](https://user-images.githubusercontent.com/111043449/186804993-216b1759-8732-4d92-b87b-be274ff9b9dd.png)

5. Run 'php artisan serve' on file location in localhost.

6. Run default "localhost:#port" for homepage or "localhost://{port}/loginAdmin to login into the admin page.

Default admin is 'admin' with pw is 'admin'. The password can be changed in the admin list page but cannot be deleted.

If there are any error due to missing file please try to update composer and look inside the gitignore files to know which files are not available, 
