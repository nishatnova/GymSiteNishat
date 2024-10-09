# GymSiteNishat

# Gym Class Scheduling and Membership Management System

## Project Overview
The Gym Class Scheduling and Membership Management System is a web application developed using Laravel 10, Jetstram Livewire, and Spatie's Laravel Permission package to streamline the management of gym classes and trainers. The system manages trainers and class schedules, while trainers can view their assigned classes, and trainees can manage their profiles and book available classes. The application incorporates role-based access control and uses API endpoints for seamless interaction between the frontend and backend.

## Database Schema
The system utilizes Eloquent ORM to define the following models and their relationships:

- **User**
  - Role: Admin, Trainer, Trainee
  - Relationships:
    - Has One Trainee
   
- **Trainee**
  - Fields: `user_id`, `mobile`, `gender`, 'date_of_birth'
  - Relationships:
    - Belongs to User
    - Has Many GymClasses
    - Has Many Bookings

- **Trainer**
  - Fields: `user_id`, 'mobile', 'image', 'experience', 'description', 'active_status', `expertise`, `availability`
  - Relationships:
    - Belongs to User
    - Has Many GymClasses

- **GymClass**
  - Fields: `name`, `trainer_id`, `class_time`, `duration`, `capacity`
  - Relationships:
    - Belongs to Trainer
    - Has Many Bookings

- **Booking**
  - Fields: `trainee_id`, `gym_class_id`, `booking_time`
  - Relationships:
    - Belongs to Trainee
    - Belongs to GymClasses

## API Documentation
The following API endpoints are available for interaction:

### Trainer Endpoints
- **GET /api/trainers**
  - **Description:** List all trainers.
  - **Response:** JSON array of trainers.

- **POST /api/trainers**
  - **Description:** Create a new trainer.
  - **Parameters:** 
    - `user_id`: ID of the user (trainer).
    - `expertise`: Trainer's expertise.
  - **Response:** JSON object of the created trainer.
 
  - **PUT /api/trainers/{trainer}**
  - **Description:** UpDate a trainer.
  - **Parameters:** 
    - `user_id`: ID of the user (trainer).
    - `expertise`: Trainer's expertise.
  - **Response:** JSON object of the created trainer.
 
  - **DELETE /api/trainer/{trainer}s**
  - **Description:** Delete a trainer.
  - **Parameters:** 
    - `user_id`: ID of the user (trainer).
    - `expertise`: Trainer's expertise.
  - **Response:** JSON object of the created trainer.

### Gym Class Endpoints
- **GET /api/gym-classes**
  - **Description:** List all gym classes.
  - **Response:** JSON array of gym classes.

- **POST /api/gym-classes**
  - **Description:** Create a new gym class.
  - **Parameters:** 
    - `trainer_id`: ID of the assigned trainer.
    - `class_time`: Scheduled time for the class.
    - `capacity`: Maximum number of participants.
  - **Response:** JSON object of the created gym class.

### Booking Endpoints
- **GET /api/bookings**
  - **Description:** List all bookings for the authenticated trainee.
  - **Response:** JSON array of bookings.

- **POST /api/bookings**
  - **Description:** Create a new booking for a gym class.
  - **Parameters:** 
    - `gym_class_id`: ID of the gym class to book.
  - **Response:** JSON object of the created booking.

- **DELETE /api/bookings/{id}**
  - **Description:** Delete a specific booking.
  - **Response:** HTTP 204 No Content.

## APIs in Fronted:
- **/login.html:** User Login.
- **/trainers.html:** CREATE, UPDATE, DELETE, show list.
- **/gym-classes.html:** Gym Class Create and show list.
- **/bookins.html:** See Trainees booking list and book class.


## Admin Credentials
- **Email:** admin@gmail.com
- **Password:** admin@gmail.com

## Trainer Credentials
- **Email:** abcd@gmail.com
- **Password:** abcd@gmail.com

## Trainee Credentials
- **Email:** nishat@gmail.com
- **Password:** nishat@gmail.com

## Live Deployment Link
As you mentioned Heroku or Laravel Forge-like platforms for deployment, none of these are free now, not even Heroku. So, I am sorry.

