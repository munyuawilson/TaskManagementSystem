# Laravel and Vue.js Interview Exercise

## Project Title: Simple Task Management System

### Overview
Create a simple Task Management System that allows users to create, view, update, delete, and mark tasks as completed. The backend will be an API built with Laravel, and the frontend will be a Vue.js application that interacts with the API.

### Requirements

<details>
<summary><strong>1. Laravel Backend</strong></summary>

#### Task Entity
A task should have the following attributes:

- **id**: (auto-incremented)
- **title**: (string, required)
- **description**: (text, optional)
- **is_completed**: (boolean, default: false)
- **created_at**: (timestamp)
- **updated_at**: (timestamp)

#### API Endpoints
- **GET** `/api/v1/tasks`: Retrieve a list of all tasks.
- **GET** `/api/v1/tasks/{id}`: Retrieve a specific task by ID.
- **POST** `/api/v1/tasks`: Create a new task.
- **PUT** `/api/v1/tasks/{id}`: Update an existing task by ID.
- **PATCH** `/api/v1/tasks/{id}/complete`: Mark a task as completed.
- **DELETE** `/api/v1/tasks/{id}`: Delete a task by ID.

#### API Resources
- Use Laravel's API Resources to format the JSON response for tasks.

#### API Versioning
- Implement API versioning, prefixing all routes with `/v1/`.

#### Testing
- Write PHP Unit or Pest tests to test the API endpoints, including marking a task as completed (TDD approach).

</details>

<details>
<summary><strong>2. Vue.js Frontend</strong></summary>

#### Task Management Interface
- **Task List**: Display a list of tasks fetched from the API.
- **Task Details**: View detailed information of a task.
- **Create Task Form**: A form to create a new task.
- **Edit Task Form**: A form to update an existing task.
- **Mark Task as Completed**: Provide a way to mark a task as completed.
- **Delete Task**: Ability to delete a task.

#### HTTP Requests
- Use Axios (or Fetch API) to send HTTP requests to the Laravel API.
- Display loading indicators and handle errors gracefully.

#### UI/UX
- Keep the UI simple, with a clear separation of the list, create, edit, view, and complete sections.
- Use Bootstrap or any TailwindCSS framework for basic styling.

</details>

### Deliverables

1. **Laravel**:
   - A fully functional API with all the specified endpoints.
   - Tests written in PHP Unit or Pest, ensuring coverage for all endpoints, including task completion.
   - A Postman collection (optional) to demonstrate the working API.

2. **Vue.js**:
   - A simple yet functional interface that interacts with the Laravel API.
   - The application should be easily testable by running `npm run serve`.

### Evaluation Criteria

- **Laravel**:
  - Correct implementation of API routes and versioning.
  - Proper use of API Resources for JSON responses.
  - Coverage and correctness of unit tests.
  - Code organization and adherence to best practices (MVC).

- **Vue.js**:
  - Proper use of Vue.js components and lifecycle methods.
  - Correct and efficient handling of HTTP requests.
  - Clean and intuitive UI design.

### Bonus (Optional)

- Implement a search functionality on the task list.
- Add pagination to the task list.
