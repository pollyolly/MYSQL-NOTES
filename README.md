### IMPROVE QUERY 300 TIMES

### Index all Column use in Where, Order by, and Group clauses
```sql
SELECT name, age FROM user_tbl WHERE name = 'test';

CREATE INDEX name ON user_tbl (name);
```
### Optimize Like statement using Union Clauses
Using wild card will reduce the performance of a query.
```sql
SELECT name, age FROM user_tbl WHERE name like '%Rol' or age like '%7'
```
Using union to optimize the query to have a result for both "name" and "age" where both column are indexed.
```sql
SELECT name, age FROM user_tbl WHERE name like '%Rol' union all select FROM user_tbl WHERE age like '%7';

```
### Avoid Like expression with leading Wildcard

MySQL will not able to utilize the indexed column when using Wildcard.
```sql
Select name FROM user_tbl WHERE name like '%Rol';
```
### Use Fulltext Search
```sql
ALTER TABLE user_tbl ADD FULLTEXT (name, age);

SELECT * FROM user_tbl WHERE MATCH (name) AGAINST ('Rolly');
```
### Increasing Query Cache 

Check if query cache is supported.
```sql
SHOW VARIABLES LIKE 'have_query_cache'; 
SHOW VARIABLES LIKE 'query_cache_%';
```
```
==============Recommended Values=================
query_cache_type = 1   
query_cache_size = 16M
query_cache_limit = 1M
================================================
The above values can be also edited in 'etc/mysql/my.cnf' or '/etc/mysql/mysql.conf.d/mysqld.cnf'
```
