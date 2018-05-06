# SkytjenesterOblig2og3
Obligatory task 2 and 3 in "nettverk og skytjenester". 
This app contains CRUD (Create, Retrieve, Update and Delete) operations.

Note: the studentid you have to use to delete or update needs to exist in the database. Please check retrieveInfo.php for all the available studentids.

http://128.39.121.95:8020/ is the index file, and will lead you to all the other sites.

http://128.39.121.95:8020/createStudent.php is the site where you can create a student. Fill in information and submit to store it in the 
database.

http://128.39.121.95:8020/retrieveInfo.php lists all the information in the database.

http://128.39.121.95:8020/deleteStudent.php is the site where you can delete all the information of specific students. Write in the studentid in the input-field and click "delete student". This will delete all entries for that student.

http://128.39.121.95:8020/NewUpdate.php is the site where you can update specific information about the student. Fill in the studentid and click the submit-button. This will take you to the site where you can edit information: 128.39.121.95:8020/Update2.php?sid=sXXXXXX&submit=Send+inn. After you have updated the information in the input-fields you can press the submit-button to get to the confirmation-site that will tell you that the information has been updated. http://128.39.121.95:8020/Update3.php?sid=sXXXXXX&name=Frydenlund&email=frydenlund%40gmail.com&studyprogram=Drikking+av+%C3%B8l&submit=Send+inn
