<!DOCTYPE html>
<html>
    <head lang="en" dir="ltr">
        <meta charset="UTF-8">
        <title> ClassGuide </title>
        <link rel="stylesheet" href="forUser.css">
        <link rel="stylesheet" href="admindash.css">
    
  
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
                                            <button class="edit-btn" >Edit</button>
                                            <button class="delete-btn">Delete</button>
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
                         </div>   
                       </div>  
                     </div>  
                 </main>    

        
        
        

    </body>
</html>