<!DOCTYPE html>
<html>
  <head>
    <title>To-Do List</title>
    <style>
      /* Style for the to-do list items */
      .task {
        margin-bottom: 10px;
        font-size: 20px;
        cursor: pointer;
      }

      /* Style for completed to-do list items */
      .completed {
        text-decoration: line-through;
        color: grey;
      }
    </style>
  </head>
  <body>
    <h1>To-Do List</h1>
    <input id="new-task" type="text" placeholder="Add new task">
    <button id="add-task">Add</button>
    <ul id="task-list"></ul>

    <script>
      // Select the HTML elements we'll need
      const newTaskInput = document.querySelector('#new-task');
      const addTaskButton = document.querySelector('#add-task');
      const taskList = document.querySelector('#task-list');

      // Create a function to add a new task to the list
      function addNewTask() {
        // Get the value of the new task input
        const taskText = newTaskInput.value;

        // Create a new list item element and add it to the list
        const newTaskItem = document.createElement('li');
        newTaskItem.classList.add('task');
        newTaskItem.textContent = taskText;
        taskList.appendChild(newTaskItem);

        // Add a click event listener to the new list item
        newTaskItem.addEventListener('click', () => {
          newTaskItem.classList.toggle('completed');
        });

        // Clear the input field
        newTaskInput.value = '';
      }

      // Add a click event listener to the add task button
      addTaskButton.addEventListener('click', addNewTask);

      // Add a keydown event listener to the new task input
      newTaskInput.addEventListener('keydown', (event) => {
        // If the user presses Enter, add the new task
        if (event.key === 'Enter') {
          addNewTask();
        }
      });
    </script>
  </body>
</html>
