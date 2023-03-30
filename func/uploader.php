<?php
if (isset($_POST["submit"]))  { // перевіряємо чи натиснуто кнопку submit
    $fileName = $_FILES["file"]["name"]; // отримуємо ім'я файлу
    echo "Файл: ".$fileName."<br>"; // виводимо ім'я файлу
    $root = $_SERVER["DOCUMENT_ROOT"]; // отримуємо кореневу директорію
    echo "Коренева директорія: ".$root."<br>"; // виводимо кореневу директорію
    $upload_folder = $root."/uploads/"; // вказуємо директорію для завантаження файлів
    echo "Директорія для завантаження файлів: ".$upload_folder."<br>"; // виводимо директорію для завантаження файлів
    $newFile = $upload_folder.$_FILES["file"]["name"]; // вказуємо шлях до файлу
    echo "Шлях до файлу: ".$newFile."<br>"; // виводимо шлях до файлу
    while (file_exists($newFile)){ // перевіряємо чи існує файл з такою назвою
        $newFile = $upload_folder.$_FILES["file"]["name"]."_".time(); // якщо існує, то додаємо час до назви
        echo "Файл з такою назвою вже існує, нова назва: ".$newFile."<br>"; // виводимо нову назву
    }
    echo "Розмір файлу: ".$_FILES["file"]["size"]."<br>"; // виводимо розмір файлу
    echo "Тип файлу: ".$_FILES["file"]["type"]."<br>"; // виводимо тип файлу
    echo "Тимчасова директорія: ".$_FILES["file"]["tmp_name"]."<br>"; // виводимо тимчасову директорію
    move_uploaded_file($_FILES["file"]["tmp_name"], $newFile); // переміщаємо файл в директорію
    unset($_POST["submit"]); // видаляємо змінну submit
    unset($_FILES["file"]); // видаляємо змінну file
    //header("Location: /"); // redirect to index.php
}
echo "<a href='/'>На головну</a>";
?>

