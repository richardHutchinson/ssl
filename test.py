#!/usr/bin/env python

import mysql.connector

class MySQLCursorDict(mysql.connector.cursor.MySQLCursor):
    def _row_to_python(self, rowdata, desc=None):
        row = super(MySQLCursorDict, self)._row_to_python(rowdata, desc)
        if row:
            return dict(zip(self.column_names, row))
        return None

cnx = mysql.connector.connect(user='root', database='ssl_todd')
cursor = cnx.cursor(cursor_class=MySQLCursorDict)
# cursor_class=MySQLCursorDict
 
query = ("SELECT * FROM users")
cursor.execute(query)
row = cursor.fetchone()
#results = cursor.fetchall()

testHeader = "Test Header"

print "Content-Type: text/html"
print
print """
<html>
<body>
<h1>""" + testHeader + """</h1>
"""
# for row in cursor:
print (row['userName'])

print ("<br />")

#print(cursor.userName)

cursor.close()
cnx.close()

print """
</body>
</html>
"""