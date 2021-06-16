# Solo8Ball
Solo 8 Ball, the absolute best way to play pool, share scores, and topple your friends on the leaderboards.

## Authors

- **George** - Co-Founder/Developer/Technical Expertise/Avid 7am speed-coder
- **Jake** - Co-Founder/Developer/Technical Expertise/Avid 7am speed-coder

## Project Requirements
1. Separates all database/business logic using the MVC pattern.
* Logic and database under model folder (dataLayerBall.php, generatorValidation.php)
* All HTML files are in the views folder
* Routes to all the html files (index.php)
* index.php calls function in Controller to get data from model and return views. (ControllerBall.php)
* Classes under classes folder (EightBallPlayer.php, Player.php)
* JavaScripts under scripts

2. Routes all URLs and leverages a templating language using Fat-Free framework
* All routes are in the index.php and leverages a templating language using Fat-Free Framework. We also use templating like in the leaderboard table (leaderboard.html)

3. Has a clearly defined database layer using PDO and prepared statements. You should have at least two related tables.
* All database layer is under model in data-layer.php. kidUser and creations are the related table (one to many relationship).

4. Data can be viewed and added.
* Database layer uses PDO and prepared statements to add and retrieve data to the database (dataLayerBall.php)

5. Has a history of commits from both team members to a Git repository. Commits are clearly commented.
* Each teammate has over 25 commits, clearly commented.

6. Uses OOP, and defines multiple classes, including at least one inheritance relationship.
* EightBallPlayer (made of time, shots, and score) inherits from the Player class(which contains the userid total_games, and total_time). 

7. Contains full Docblocks for all PHP files and follows PEAR standards.
* All PHP files contains DocBlock and Follows Pear Standards.

8. Has full validation on the client side through JavaScript and server side through PHP.
* User login has full validation on the client side through JavaScript (validation.js) and server side through PHP (login() function in ControllerBall.PHP).

9. All code is clean, clear, and well-commented. DRY (Don't Repeat Yourself) is practiced.
* All functions and files are commented. Any code that was repeated was turned into a function and called upon instead of repeating code.

10. Your submission shows adequate effort for a final project in a full-stack web development course.
* Our experience is strong with troubleshooting errors and learning what happen and how to find the problem and fix it.
* An example is troubleshooting fat-free and console.log()-ing to know if the fat-free grabbed the latest changes or if an error is still occuring.

## UML/ER Class Diagram

![UML-ER-Diagram-Final](https://user-images.githubusercontent.com/20677527/122156614-2df05d00-ce1e-11eb-9723-eca28c6cd257.PNG)
