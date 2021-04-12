-- this file contains sample queries only for learning purposes

-- SELECT U.userID, U.userName FROM users U WHERE U.userID = '5e696f772035ed217c5326d13c05b9ac7a8f27ef';

-- SELECT * from USERS;

-- CREATE TABLE chismis (
-- 	chismisID varchar(60),
--     userID varchar(70),
--     chismisTitle varchar(70),
--     chismisBody text,
--     chismisTags varchar(40),
--     chismisBanner varchar(200)
-- );

SELECT U.userID, U.userName, U.userProfilePic, U.userDescription, J.jobTitle, J.jobBody, J.jobEmail, J.jobContactNum, J.jobRequirements, J.jobLanguage, J.jobLocation  FROM users U INNER JOIN jobs J ON U.userID = '6072be358070';