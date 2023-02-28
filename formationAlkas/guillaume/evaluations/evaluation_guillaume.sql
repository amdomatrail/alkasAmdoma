# question 1
select * from message m where m.user_id=8 order by m.date_creation desc limit 5;

# question 2
select u.nom,u.prenom,u.date_naissance from user u order by u.date_naissance;

# question 3
select * from user order by date_inscription desc limit 5;
# question 4
select u.login,r.nom from user u join roles r on u.roles_id=r.id;











# question 9
select u.id,u.login from user u order by login asc;
# question 10
select m.user_id,m.conversation_id from message m order by m.user_id,m.conversation_id asc;
