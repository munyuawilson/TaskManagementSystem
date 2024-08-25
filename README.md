**Laravel and Vue.js Interview Exercise**
Project Title: Simple Task Management System
Overview:
Create a simple Task Management System that allows users to create, view, update, delete,
and mark tasks as completed. The backend will be an API built with Laravel, and the
frontend will be a Vue.js application that interacts with the API.
Requirements:
1. Laravel Backend:
o Task Entity:
 A task should have the following attributes:
 id (auto-incremented)
 title (string, required)
 description (text, optional)
 is_completed (boolean, default: false)
 created_at (timestamp)
 updated_at (timestamp)

o API Endpoints:
 GET /api/v1/tasks: Retrieve a list of all tasks.
 GET /api/v1/tasks/{id}: Retrieve a specific task by ID.
 POST /api/v1/tasks: Create a new task.
 PUT /api/v1/tasks/{id}: Update an existing task by ID.
 PATCH /api/v1/tasks/{id}/complete: Mark a task as completed.
 DELETE /api/v1/tasks/{id}: Delete a task by ID.
o API Resources:
 Use Laravel's API Resources to format the JSON response for tasks.
o API Versioning:
 Implement API versioning, prefixing all routes with /v1/.
o Testing:
 Write PHP Unit or Pest tests to test the API endpoints, including
marking a task as completed (TDD approach).

2. Vue.js Frontend:
o Task Management Interface:
 Task List: Display a list of tasks fetched from the API.
 Task Details: View detailed information of a task.
 Create Task Form: A form to create a new task.
 Edit Task Form: A form to update an existing task.
 Mark Task as Completed: Provide a way to mark a task as
completed.
 Delete Task: Ability to delete a task.
o HTTP Requests:
 Use Axios (or Fetch API) to send HTTP requests to the Laravel API.
 Display loading indicators and handle errors gracefully.
o UI/UX:
 Keep the UI simple, with a clear separation of the list, create, edit,
view, and complete sections.
 Use Bootstrap or any TailwindCSS framework for basic styling.

Deliverables:
1. Laravel:
o A fully functional API with all the specified endpoints.
o Tests written in PHP Unit or Pest, ensuring coverage for all endpoints,
including task completion.
o A Postman collection (optional) to demonstrate the working API.
2. Vue.js:
o A simple yet functional interface that interacts with the Laravel API.
o The application should be easily testable by running npm run serve.

Evaluation Criteria:
 Laravel:
o Correct implementation of API routes and versioning.
o Proper use of API Resources for JSON responses.
o Coverage and correctness of unit tests.
o Code organization and adherence to best practices (MVC).
 Vue.js:
o Proper use of Vue.js components and lifecycle methods.
o Correct and efficient handling of HTTP requests.
o Clean and intuitive UI design.

Bonus (Optional):
 Implement a search functionality on the task list.
 Add pagination to the task list.