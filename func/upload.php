<!-- Тут форма завантаження файлу -->
<p>Сторінка завантаження файлу (доступна для авторизованих користувачів</p>

<form action = "../func/uploader.php"
      method="POST"
      enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">Upload</button>
</form>
<hr>
<p>Список файлів в директорії <b>/uploads</b></p>

<?php
$path = $_SERVER["DOCUMENT_ROOT"]."/uploads/";
$filesList = scandir($path); // просканували папку
$filesList = array_filter($filesList, fn ($file) =>  $file != "." && $file != ".."); // видалили зайві елементи
if(!empty($filesList)) { // якщо директорія не порожня, то виводимо список файлів
    foreach ($filesList as $file) {
        echo "<p><a href='/uploads/$file'>$file</a><br></p>";
    }
}else { // якщо порожня, то виводимо повідомлення>
    echo "Папка порожня";
}
?>

<hr>

<p><a href="../func/logout.php">Exit - разлогінитись</a></p>

