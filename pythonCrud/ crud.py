#!/usr/bin/python
import MySQLdb as mdb
import sys

# try:
#     con = mdb.connect(
#         host = 'localhost',
#         user = 'root',
#         passwd = '',
#         db = 'maddy'
#         )

# except Exception as e:
#     sys.exit('we cant get into the database')



def createTable(con):
    with con:

        cur = con.cursor()
        cur.execute("DROP TABLE IF EXISTS TableTest")
        cur.execute("CREATE TABLE TableTest(Id INT PRIMARY KEY AUTO_INCREMENT, Name VARCHAR(25))")
        cur.execute("INSERT INTO TableTest(Name) VALUES('Mayur')")
        cur.execute("INSERT INTO TableTest(Name) VALUES('Patil')")
        cur.execute("INSERT INTO TableTest(Name) VALUES('maddy')")
        



# RETRIEVE TABLE ROWS
def retrieveTable(con):
    with con:

        cur = con.cursor(mdb.cursors.DictCursor)
        cur.execute("SELECT * FROM TableTest")

        rows = cur.fetchall()

        for row in rows:
            print row["Id"], row["Name"]



# UPDATE ROW
def updateRow(con):
    with con:

        cur = con.cursor()
        # str = input("Enter new name: ");
        # up_id = input("Enter id number to update the row: ");

        cur.execute("UPDATE TableTest SET Name = %s WHERE Id = %s", ("rahul", "1"))

        print "Number of rows updated:",  cur.rowcount


def afterUpdate(con):
    with con:

        cur = con.cursor(mdb.cursors.DictCursor)
        cur.execute("SELECT * FROM TableTest")

        rows = cur.fetchall()

        for row in rows:
            print row["Id"], row["Name"]




# DELETE ROW
def deleteRow(con):
    with con:

        cur = con.cursor()
        id = input("Enter the id to delete the row: ");

        cur.execute("DELETE FROM TableTest WHERE Id = %s", id)

        print "Number of rows deleted:", cur.rowcount



def afterDelete(con):
    with con:

        cur = con.cursor(mdb.cursors.DictCursor)
        cur.execute("SELECT * FROM TableTest")

        rows = cur.fetchall()

        for row in rows:
            print row["Id"], row["Name"]




# SET UP THE CONNECTION
try:
    con = mdb.connect('localhost', 'root', '', 'maddy');

    cur = con.cursor()
    cur.execute("SELECT VERSION()")

    ver = cur.fetchone()

  


    # CRUD OPERATIONS
    createTable(con)
    retrieveTable(con)
    updateRow(con)
    afterUpdate(con)
    deleteRow(con)
    afterDelete(con)



except mdb.Error, e:

    print "Error %d: %s" % (e.args[0],e.args[1])
    sys.exit(1)


finally:

    if con:
        con.close()