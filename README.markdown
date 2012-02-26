MSSQL Server Connector
====================

This project provides the ability to connect to a SQL Server instance and also provides a Data abstraction class that determines if the php_mssql or sqlsrv extensions are to be used. 

How To Use
====================

Edit the \application\configs\application.php to match your SQL Server's credentials, if using SQL Server Authentication. However if using Windows Authentication, simply change the server name and database name. To view any database's tables you can navigate to the index.php file with a query string that matches a valid database name on your SQL Server instance. E.g. index.php?database=MyDatabaseName

The Data class has functions for insert, select, update, and query (used for manually doing any of the CRUD operations).

Known Issues
====================

This code does not escape characters when running queries against the SQL Server. Therefore any query passed to the Data class should be escaped before processing any statements.

Contact
====================

Contact directly at [info@calgarywebdev.com](info@calgarywebdev.com).