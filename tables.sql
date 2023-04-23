Create Table ItemPoints (
	id int PRIMARY KEY AUTO_INCREMENT, 
	item char(30), 
	points int
);


Create Table User (
	rewardsNumber int PRIMARY KEY, 
	fname char(30), 
	lname char(30), 
	password varchar(30),
	cell char(10)
);

	
Create Table UserRewards (
	id int PRIMARY KEY AUTO_INCREMENT, 
	rewardsNumber int REFERENCES User(rewardsNumber), 
	totalPoints int
);

Create Table MovieRewards (
	id int PRIMARY KEY AUTO_INCREMENT, 
	rewardsNumber int REFERENCES User(rewardsNumber), 
	item char(30), 
	quantity int, 
	myPoints int, 
	date DATETIME
);

Create Table DiningRewards (
	id int PRIMARY KEY AUTO_INCREMENT, 
	rewardsNumber int REFERENCES User(rewardsNumber), 
	item char(30), 
	quantity int, 
	myPoints int, 
	date DATETIME
);
