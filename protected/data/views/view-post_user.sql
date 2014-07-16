CREATE VIEW `post_user` AS
select 
user_id, 
fname, 
lname, 
count(*) as total_post

from user 
	left join input on input.user_id = user.ID
group by user_id
;

