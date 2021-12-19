## Doctrine ORM

Doctrine ORM project, CRUD.

#### Required:
```
Composer version 2.1.6
```

#### Composer

``` 
run: composer install
```

#### Mysql

Create user

```
CREATE USER 'root'@'localhost' IDENTIFIED BY 'root';
GRANT ALL ON *.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
```

Create database

```
CREATE DATABASE doctrine
```

### Commands

Create schema
```
run: vendor/bin/doctrine orm:schema-tool:create
```

#### Step commands

run
```
# Create Student
php src/commands/CreateStudentCmd.php --{name} --{phone1}, --{phone2}...


# Create Course
php src/commands/CreateCourseCmd.php --{name}


# Sync course_student
php src/commands/SyncCourseStudentCmd.php --{studentId} --{courseId}


# Update
php src/commands/UpdateStudentCmd.php --{studentId} --{name}


# Delete
php src/commands/RemoveStudentsCmd.php --{studentId}


# Queries

php src/commands/FindStudentCmd.php
php src/commands/CourseStudentReportCmd.php
```
