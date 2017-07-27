#Meetutu Web Application

To meet an expert teacher, for a craving learner. Meetutu is a web application that connects people matching those who can teach with those who want to Learn. The app allows
anyone to signup for teaching or learning.

It uses sign in with google api.

Features:
● Google signin integration

● Smart map scan screen:
○ Map contains chat feature through which a user can ask his questions to another teacher or user.
and private chat room is available for a 1:1 chat between two users.
○ Create a private chat room by clicking on the private chat option.
○ Click on the icon of the user to send them request and the user on the other end recieves the request.
○ If the user accepts the request he will be available in your private chat room.
○ All the experts who can teach you (use icon like ‘T’).
○ All the seekers whom you can teach (use icon like ‘L).

● Request Meet Screen:
○ A user can request a 1:1 meeting to another user.
○ All request from the users are found in the request box where you will find the email address of the user who requested a private meet.


INSTRUCTIONS:

To Run on localmachine using xamp.

Download the files from the repository and keep them in your htdocs folder of your xamp.
start the xamp server and open your database phpmyadmin.
create a database with database name as meetutu.
Import database tables from the database files that are included in the repository dbfiles
After importing the database file. open smartmaps folder from the repository files and run app.js using node js which runs at localhost:4545

NOW YOU ARE READY TO GO.

Open http://localhost/meetutu/index.php 


