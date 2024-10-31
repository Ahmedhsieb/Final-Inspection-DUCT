# Project Name

A Laravel-based project that converts an inspection sheet to a web form, managing data across two tables for inspection
parameters and production orders.

## Table of Contents

1. [Installation](#installation)
2. [Approach and Thought Process](#approach-and-thought-process)
3. [Projects Routes](#projects-routes)
3. [Database Schema and ERD](#database-schema-and-erd)
4. [Features](#features)
5. [Project Pages](#project-pages)

---

### Installation

To set up the project locally, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/yourprojectname.git
   cd yourprojectname
   ```

2. **Install Dependencies**:
   Make sure to have Composer installed, then run:
   ```bash
   composer install
   ```

3. **Set up your database credentials in the `.env` file**:
   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=FinalInspectionDUCT
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```
   
5. **Run Migrations**:
   Create the database tables:
   ```bash
   php artisan migrate
   ```
   
6. **Generate Parameters For Test**:
   ```bash
    php artisan db:seed
   ```
   
7. **Serve the Application**:
   Start the development server:
   ```bash
   php artisan serve
   ```

   The application will be available at `http://127.0.0.1:8000`.

---

### Projects Routes
#### Order
1.  GET|HEAD        `order` .................................................... `order.index` › TaskController@index
2.  POST            `order` .................................................... `order.store` › TaskController@store
3.  GET|HEAD        `order/create` ........................................... `order.create` › TaskController@create
4.  DELETE          `order/forceDelete/{order}` .................... `order.forceDelete` › TaskController@forceDelete
5.  POST            `order/restore/{order}` ............................ `order.restore` › TaskController@restoreData
6.  GET|HEAD        `order/trash` .............................................. `order.trash` › TaskController@trash
7.  GET|HEAD        `order/{order}` .............................................. `order.show` › TaskController@show
8.  PUT|PATCH       `order/{order}` .......................................... `order.update` › TaskController@update
9.  DELETE          `order/{order}` ........................................ `order.destroy` › TaskController@destroy
10. GET|HEAD        `order/{order}/edit` ......................................... `order.edit` › TaskController@edit

#### Parameter
1.  GET|HEAD        `param` .................................................... `param.index` › InspectionParamController@index
2.  POST            `param` .................................................... `param.store` › InspectionParamController@store
3.  GET|HEAD        `param/create` ........................................... `param.create` › InspectionParamController@create
4.  DELETE          `param/forceDelete/{param}` .................... `param.forceDelete` › InspectionParamController@forceDelete
5.  POST            `param/restore/{param}` ............................ `param.restore` › InspectionParamController@restoreData
6.  GET|HEAD        `param/trash` .............................................. `param.trash` › InspectionParamController@trash
7.  GET|HEAD        `param/{param}` .............................................. `param.show` › InspectionParamController@show
8.  PUT|PATCH       `param/{param}` .......................................... `param.update` › InspectionParamController@update
9.  DELETE          `order/{order}` ........................................ `param.destroy` › InspectionParamController@destroy
10. GET|HEAD        `param/{param}/edit` ......................................... `param.edit` › InspectionParamController@edit

### Approach and Thought Process

1. **Design**: The goal was to replicate a manual inspection sheet in a digital format, capturing production orders and
   inspection parameters efficiently.

2. **Database Structure**:
    - **Normalization**: The database is designed with two tables: one for inspection parameters (`id`, `parameter`) and
      another for production orders, which stores all production data.
    - **Parameter Storage**: Parameters are serialized as arrays within the production orders table for efficient
      storage and retrieval.

3. **CRUD Operations**:
    - Two separate CRUD resources controllers were created, one for each table.
    - Implemented **soft deletes** for each model to handle deletion without permanently removing records, allowing for
      easy recovery from a trash page.

4. **Page Structure and Navigation**:
    - Developed pages for creating, editing, listing, and trashing records in each table.
    - Integrated a search feature for easy retrieval of both orders and parameters.

---

### Database Schema and ERD

The following is the schema of the database:

- **Tables**:
    1. **Inspection Parameters**:
        - `id`: Primary key
        - `parameter`: String value representing inspection criteria.
    2. **Production Orders**:
        - `id`: Primary key
        - `production_order`: Generated random number for production order.
        - `work_order`: Generated random number formatted by the date for work order.
        - `date`: The date of the order.
        - `project`: Project name.
        - `shape`: Shape name.
        - `customer`: Customer name.
        - `quality_inspector`: Quality Inspector name.
        - `approved_by`: The name of the person who approved the order.
        - `parameter`: Stores serialized parameters as an array along with production order data.

Both tables have `updated_at`, `deleted_at`, and `created_at` columns for tracking them.


### Features

- **CRUD Operations**: Complete create, read, update, and delete functionalities for inspection parameters and
  production orders.
- **Soft Deletes**: Models and migrations incorporate soft delete functionality, enabling record restoration from the
  trash.
- **Search Functionality**: Ability to search for specific production orders and parameters.
- **Serialized Data Storage**: Parameters are stored as serialized arrays within the production orders table, optimizing
  space.
- **User-friendly Pages**: Simple and intuitive forms and displays for each CRUD action.

---

### Project Pages

1. **Show Data**:
    - Overview of specific order data.

2. **Inspection Parameters List**:
    - View, search, and manage inspection parameters.

3. **Production Orders List**:
    - View, search, and manage production orders, including their serialized parameters.

4. **Create/Edit Pages**:
    - Dedicated forms to create or edit inspection parameters and production orders.

5. **Trash Pages**:
    - Lists soft-deleted records for inspection parameters and production orders, with options to restore or permanently
      delete.

---
