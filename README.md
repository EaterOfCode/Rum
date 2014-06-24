# Rum

Removing foo from forum and adding the bar

## Idea

Create a simple forum with minimal settings and setup

Posts will be in markdown and only markdown. (if those people can learn bbcodes they can learn a standarized markdown too)


## Db structure

### rum_users

Name | Default | Comment |
---|---|---|
id | AUTO_INCREMENT |
username | NONE |
hash | NONE | 
mail | NONE |
externalId | NONE | for intergrating with existing user models or OpenID (???)
role | user | (user, mod, admin)
  
### rum_posts

Name | Default | Comment |
---|---|---|
id | AUTO_INCREMENT |
userId | NONE |
post | NONE | this is ALWAYS markdown
title | "" | 
parentId | NULL | parentId can be null or pointing to an post with flag C (category) or if reply to an post the id of that post
flags | "" | each character in flag represents a flag, C is category, S is sticky. (???)
  
