-- Query for creating our database
CREATE DATABASE job_listing;

-- Creating our users Table
CREATE TABLE users(
    userID varchar(555) PRIMARY KEY,
    userName varchar(255),
    userEmail varchar(255),
    userPassword varchar(855),
    userDescription varchar(955),
    userContactNum varchar(20),
    userProfilePic varchar(155) DEFAULT 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png'
);

-- Creating our jobs Table
CREATE TABLE jobs(
    jobID varchar(255) PRIMARY KEY,
    userID varchar(255),
    jobTitle varchar(655),
    jobBody text,
    jobLanguage varchar(355),
    jobRequirements text,
    jobContactNum varchar(20),
    jobEmail varchar(355),
    jobLocation varchar(355),
    jobDatePosted varchar(355),
    jobSalaryFrom varchar(355),
    jobSalaryTo varchar(355)
);

-- retrieves user information alon with their posts
-- used when checking a user's profile
SELECT * FROM users U INNER JOIN jobs J ON U.userID = '6072be358070';

-- updates user data
UPDATE users SET userName = :userName, userProfilePic = :userProfilePic, userEmail = :userEmail, userContactNum = :userContactNum WHERE userID = :userID;

-- adds data to the jobs table
-- used when posting a job
INSERT INTO jobs (jobID, userID, jobTitle,jobBody, jobRequirements, jobContactNum, jobLanguage, jobEmail, jobLocation, jobSalaryFrom, jobSalaryTo, jobDatePosted) 
VALUES (:jobID, :userID, :jobTitle, :jobBody, :jobRequirements, :jobContactNum, :jobLanguage, :jobEmail, :jobLocation, :jobSalaryFrom, :jobSalaryTo, :jobDatePosted);

-- gets the email of a particular user 
-- used when checking if an email already exists 
SELECT `userEmail` FROM `users` WHERE `userEmail` = :email;

-- gets a set of data from a user table 
-- used when a user logs in
SELECT `userID`, `userName`, `userEmail`, `userContactNum`, `userPassword`, `userProfilePic` FROM `users` WHERE `userEmail` = :email;

-- gets list of jobs along with who posted it
-- used when getting list of jobs
SELECT * FROM users U INNER JOIN jobs J ON U.userID = J.userID;

-- gets a single user
SELECT * FROM users WHERE userID = :uid;

-- stores user data to the users table
-- used when a user registers an account
INSERT INTO `users`( `userID` , `userName`, `userContactNum`, `userEmail`, `userPassword` ) values ( :userID, :userName, :userContactNum, :userEmail, :userPassword );

-- Searching jobs
SELECT * FROM users U INNER JOIN jobs J ON U.userID = J.userID WHERE J.jobTitle LIKE %searchText%