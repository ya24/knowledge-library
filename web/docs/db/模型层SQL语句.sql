#1、搜分类——按名称
SELECT * FROM sys_category WHERE category_name LIKE "%java%"


#2、搜分类——按用户
#搜索的是指定用户的分类，需要搜索出分类的名称
#先搜索用户收藏的默认系统分类
SELECT DISTINCT category_name FROM sys_category sc,user_and_category uac WHERE sc.sys_category_id=uac.sys_category_id AND uac.sys_user_id = 2
#再搜索的是用户收藏的自定义分类
SELECT DISTINCT category_name FROM user_category uc,user_and_category uac WHERE uc.user_category_id=uac.user_category_id AND uac.sys_user_id = 2
#select category_name from sys_category sc,user_and_category uac
#where sc.sys_category_id=uac.category_id and uac.sys_user_id=1

#3、删除分类——删除的是某用户收藏的某分类，根据用户ID和分类ID，所以还需要判断是用户自定义的分类还是系统分类
DELETE FROM user_and_category WHERE sys_user_id = 1 AND sys_category_id =1
DELETE FROM user_and_category WHERE sys_user_id = 1 AND user_category_id =1


#4、搜文章——按分类
SELECT * FROM article WHERE sys_category_id = 3

#5、搜文章——按名称
SELECT * FROM article WHERE article_title LIKE "%java%"

#6、文章——按分类和用户
SELECT a.* FROM article a,user_and_article uaa WHERE a.article_id=uaa.article_id AND uaa.sys_user_id = 2 AND uaa.sys_category_id = 1
SELECT * FROM article a,user_and_article uaa WHERE a.article_id=uaa.article_id AND uaa.sys_user_id = 2 AND uaa.user_category_id = 3

#7、搜文章——按用户最近收藏（暂时先搜索出用户最近收藏的10条）
SELECT a.* FROM article a,user_and_article uaa WHERE a.article_id=uaa.article_id AND uaa.sys_user_id = 2 ORDER BY a.create_time DESC LIMIT 10

#8、删除文章——某一分类（是基于用户的删除，用户删除自己收藏的某一分类下的文章）
DELETE FROM user_and_article WHERE sys_user_id = 1 AND sys_category_id = 1
DELETE FROM user_and_article WHERE sys_user_id = 1 AND user_category_id = 3

#9、修改文章的分类ID为默认的(用户收藏的文章，默认分类，表现为系统分类和用户自定义分类都为null)
UPDATE user_and_article SET sys_category_id = NULL , user_category_id = NULL WHERE sys_user_id = 1 AND article_id IN (4)

SELECT * FROM user_and_article WHERE sys_category_id IS NULL AND user_category_id IS NULL

#10、修改文章的分类为另一分类
UPDATE user_and_article SET sys_category_id = 1 , user_category_id = NULL WHERE sys_user_id = 1 AND article_id = 4
UPDATE user_and_article SET sys_category_id = NULL , user_category_id = 2 WHERE sys_user_id = 1 AND article_id = 3


#11、搜分类——搜热门的某几个分类(热门的标识是分类收藏量在前几位)，需要分类的id和分类名
SELECT sys_category_id,category_name FROM sys_category ORDER BY category_use_count DESC LIMIT 8

#12、搜热门文章——搜索某一分类下，用户收藏量在前15的文章
SELECT * FROM article WHERE sys_category_id = 1 ORDER BY collect_number DESC LIMIT 3

#13、点击收藏，添加到用户知识库中，使用默认分类
#在数据库中的逻辑就是，在user_and_article用户文章关联表中将该文章和用户以及分类建立起联系
INSERT INTO user_and_article(sys_user_id,article_id,sys_category_id) VALUES(1,1,1);

#14、统计用户某一分类下的文章数
SELECT COUNT(article_id) FROM user_and_article WHERE sys_user_id = 1 AND sys_category_id = 1

SELECT * FROM sys_user;
SELECT * FROM sys_category;
SELECT * FROM user_category;
SELECT * FROM user_and_category;
SELECT * FROM article;
SELECT * FROM user_and_article;
