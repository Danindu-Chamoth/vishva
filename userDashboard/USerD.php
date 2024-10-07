<?php
include 'config.php';
include 'task.php';
 $conn->close();
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> ClassGuide </title>
    <link rel="stylesheet" href="forUser.css">
    <link rel="stylesheet" href="./NavBar.css">
    
  
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">ClassGuide</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Overview</span>
          </a>
        </li>
        <li>
        <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">User Accounts Update</span>
          </a>
        </li>
        <li>
          <a href="#" >
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Task</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav class="lol">
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name"> <?php echo $user['Fname']; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>


    <main>
        <div class="container">
            <div class="main-sections">
                <div class="mainC">
                    <div class="class-schedule">
                        <h2>Task Today</h2>
                        <div id="tasksList" class="task-container">
                            <?php foreach ($tasks as $task) { ?>
                                <div class="task">
                                    <label><?php echo htmlspecialchars($task['task_name']); ?></label>
                                    <button class="edit-btn" onclick="openEditModal('<?php echo $task['task_id']; ?>', '<?php echo htmlspecialchars($task['task_name']); ?>')">Edit</button>
                                    <button class="delete-btn" onclick="deleteTask('<?php echo $task['task_id']; ?>')">Delete</button>
                                </div>
                            <?php } ?>
                        </div>
                        <button id="addTaskBtn" class="add-task-btn">Add New Task</button>
                    </div>

                    <!-- Modal Box for Adding Tasks -->
                    <div id="taskModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>Add a New Task</h2>
                            <input type="text" id="taskInput" placeholder="Enter new task">
                            <button id="saveTaskBtn">Save Task</button>
                        </div>
                    </div>

                    <!-- Modal Box for Editing Tasks -->
                    <div id="taskModalEdit" class="modal">
                        <div class="modal-content">
                            <span class="close-edit">&times;</span>
                            <h2>Edit Task</h2>
                            <input type="text" id="editTaskInput" placeholder="Edit task">
                            <button id="saveEditTaskBtn">Save Changes</button>
                        </div>
                    </div>

                    <!-- Calendar Section -->
                    <div class="tabs">
                        <div class="tab-content">
                            <div id="tab1" class="tab active">
                                <h2>Calendar</h2>
                                <section class="calendar-section">
                                    <div class="calendar">
                                        <header>
                                            <h3></h3>
                                            <nav>
                                                <button id="prev"></button>
                                                <button id="next"></button>
                                            </nav>
                                        </header>
                                        <section>
                                            <ul class="dates"></ul>
                                        </section>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your Subjects Section -->
                <section class="your-subject">
                    <h2>Your Subject</h2>
                    <div class="subjects">
                        <div class="subject">
                            <div class="subject-image1"></div>
                            <p class="p2">Advanced Instructional Design for Digital Learning</p2>
                            <p class="p1">Learn how to create better online lessons and courses.</p>
                        </div>
                        <div class="subject">
                            <div class="subject-image2"></div>
                            <p class="p2">AI and Machine Learning in Education</p2>
                            <p class="p1">Discover how AI and smart technology can improve learning.</p>
                        </div>
                        <div class="subject">
                            <div class="subject-image3"></div>
                            <p class="p2">Mastering Virtual Pedagogy and Andragogy</p2>
                            <p class="p1">Understand how to teach effectively online for both kids and adults</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

  <script src="NavBar.js"></script>
   <script src="Calendar.js"></script>
    <script src="adTask.js"></script>
</body>
</html>