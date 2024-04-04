<?php declare(strict_types=1);

// Contacts
// require_once "../Contacts/Contacts.php";
// require_once "../Contacts/ContactsDAO.php";
// $contactDAO = new ContactsDAO;
// $contact_id = $contactDAO->create(new Contacts(0, 'test7', 'test3', 'test1', 'test1'));
// $contact = $contactDAO->read($contact_id);
// $contact->setName("Newname");
// $contactDAO->update($contact);
// // $contactDAO->delete($contact);
// var_dump($contact);
// echo "<br><br>";

// Orders_system
// require_once "../Orders_system/Orders.php";
// require_once "../Orders_system/OrdersDAO.php";
// require_once "../Orders_system/Products.php";
// require_once "../Orders_system/ProductsDAO.php";
// $productDAO = new ProductsDAO();
// $product_id = $productDAO->create(new Products(0, "test2", 120));
// $product = $productDAO->read($product_id);
// $product->setPrice(1000);
// $productDAO->update($product);
// $productDAO->delete(($product));
// var_dump($product);
// echo "<br><br>";

// $orderDAO = new OrdersDAO();
// $order_id = $orderDAO->create(new Orders(0, 10, "02.04.2024"));
// $order = $orderDAO->read($order_id);
// $order->setProduct_num(30);
// $orderDAO->update($order);
// $orderDAO->delete($order);
// var_dump($order);
// echo "<br><br>";

// Blog
// require_once "../Blog/Posts.php";
// require_once "../Blog/PostsDAO.php";
// require_once "../Blog/Comments.php";
// require_once "../Blog/CommentsDao.php";
// $postDAO = new PostsDAO();
// $post_id =$postDAO->create(new Posts(0, "test3", "abcd", "01.04.2024"));
// $post = $postDAO->read($post_id);
// $post->setHeadline("new Headline");
// $postDAO->update($post);
// $postDAO->delete($post);
// var_dump($post);
// echo "<br><br>";

// $commentDAO = new CommentsDAO();
// $comment_id = $commentDAO->create(new Comments(0, "test3", "29.03.2024", "test1"));
// $comment = $commentDAO->read($comment_id);
// $comment->setDate("25.04.2024");
// $commentDAO->update($comment);
// $commentDAO->delete($comment);
// var_dump($comment);
// echo "<br><br>";

// Library
// require_once "../Library/Books.php";
// require_once "../Library/BooksDAO.php";
// require_once "../Library/Authors.php";
// require_once "../Library/AuthorsDAO.php";
// $bookDAO = new BooksDAO();
// $book_id =$bookDAO->create(new Books(0, "test4", 2006, "test4"));
// $book = $bookDAO->read($book_id);
// $bookDAO->update($book);
// var_dump($book);
// echo "<br><br>";

// $authorDAO = new AuthorsDAO();
// $author_id =$authorDAO->create(new Authors(0, "test5", "test5"));
// $author = $authorDAO->read($author_id);
// $authorDAO->update($author);
// var_dump($author);
// echo "<br><br>";

// $book_id1 = $bookDAO->create(new Books(0, "test", 2010," test"));
// $book_id2 = $bookDAO->create(new Books(0, "test", 2005," test"));
// $book_id3 = $bookDAO->create(new Books(0, "test", 1990," test"));

// $book1 = $bookDAO->read($book_id1);
// $book2 = $bookDAO->read($book_id2);
// $book3 = $bookDAO->read($book_id3);

// $authorDAO->linkAuthorToBook($author, $book1);
// $authorDAO->linkAuthorToBook($author, $book2);
// $authorDAO->linkAuthorToBook($author, $book3);

// $author = $authorDAO->read($author_id);
// var_dump($author);

// $authorDAO->unlinkAuthorToBook($author, $book1);
// $authorDAO->unlinkAuthorToBook($author, $book2);
// $authorDAO->unlinkAuthorToBook($author, $book3);

// $author_id1 = $authorDAO->create(new Authors(0, "test", "test"));
// $author_id2 = $authorDAO->create(new Authors(0, "test", "test"));
// $author_id3 = $authorDAO->create(new Authors(0, "test", "test"));

// $author1 = $authorDAO->read($author_id1);
// $author2 = $authorDAO->read($author_id2);
// $author3 = $authorDAO->read($author_id3);

// $bookDAO->linkBookToAuthor($book, $author1);
// $bookDAO->linkBookToAuthor($book, $author2);
// $bookDAO->linkBookToAuthor($book, $author3);

// $bookDAO->unlinkBookToAuthor($book, $author1);
// $bookDAO->unlinkBookToAuthor($book, $author2);
// $bookDAO->unlinkBookToAuthor($book, $author3);
// var_dump($book);

// Students
require_once "../Students/Grades.php";
require_once "../Students/GradesDAO.php";
require_once "../Students/Students.php";
require_once "../Students/StudentsDAO.php";
require_once "../Students/Subjects.php";
require_once "../Students/SubjectsDAO.php";
$studentDAO = new StudentsDAO();
$student_id = $studentDAO->create(new Students(0, "test5", "test5", "test5"));
$student = $studentDAO->read($student_id);
$studentDAO->update($student);
$studentDAO->delete($student);
var_dump($student);

$subjectDAO = new SubjectsDAO();
$subject_id = $subjectDAO->create(new Subjects(0, "test6", "test6"));
$subject = $subjectDAO->read($subject_id);
$subjectDAO->update($subject);
$subjectDAO->delete($subject);
var_dump($subject);

$gradeDAO = new GradesDAO();
$grade_id = $gradeDAO->create(new Grades(0, $student->getStudents_id(), $subject->getSubjects_id(), 100));
// $gradeDAO->create(new Grades(0, $student->getStudents_id(), $subject->getSubjects_id(), 50));
// $gradeDAO->create(new Grades(0, $student->getStudents_id(), $subject->getSubjects_id(), 75));
$grade = $gradeDAO->read($grade_id);
$gradeDAO->update($grade);
// $gradeDAO->delete($grade);

$student = $studentDAO->read($student_id);
var_dump($student);