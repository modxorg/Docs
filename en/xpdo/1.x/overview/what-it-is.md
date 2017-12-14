---
title: "What It Is"
_old_id: "1571"
_old_uri: "1.x/overview/what-it-is"
---

xPDO is our name for open eXtensions to PDO. It's a light-weight ORB (object-relational bridge) library that works on PHP 5, and takes advantage of the newly adopted standard for database persistence in PHP 5.1+, PDO. It implements the very simple, but effective Active Record pattern for data access, as well as a flexible domain model that allows you to isolate domain logic from database-specific logic, or not, depending on your needs.

But xPDO is a little more than a simple pattern implementation. It's also a PDO implementation for PHP 4 and 5.0.x (where native PDO extensions are not available), a way to abstract business objects from the actual SQL queries and prepared statements used to access a relational database structure representing them, and a way to easily describe and provide optimized implementations of an object model for multiple target database platforms.

xPDO was inspired by the need to quickly provide scaffolding for a web application that is easy to extend into a full-blown object model that could be optimized as much as possible for the database platform it was being deployed on without creating platform-dependencies, or maintenance nightmares. And it needed to provide this with as small a code footprint as possible; implementing an effective object-relational persistence framework in PHP demands this.